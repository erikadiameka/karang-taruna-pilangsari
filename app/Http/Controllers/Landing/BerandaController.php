<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Anggota;
use App\Models\ExternalNews;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $stats = [
            'anggota' => Anggota::where('status', 'aktif')->count() ?: 120,
            'kegiatan' => Kegiatan::where('status', 'selesai')->count() ?: 48,
            'berita' => Berita::where('status', 'published')->count() ?: 36,
            'tahun' => date('Y') - 2010,
        ];

        $beritaTerbaru = Berita::with('kategori')
            ->where('status', 'published')
            ->latest('published_at')->take(3)->get();

        // Kalau berita internal kosong, ambil dari RSS Kompas
        if ($beritaTerbaru->count() === 0) {
            $beritaTerbaru = $this->getBeritaRSS();
        }

        $kegiatanTerbaru = Kegiatan::latest('tanggal_mulai')->take(3)->get();
        $galeriTerbaru = Galeri::where('tipe', 'foto')->latest()->take(6)->get();
        $pengumuman = Pengumuman::where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
            })->latest()->get();

        $programUnggulan = [
            ['nama' => 'Pengembangan Pemuda', 'deskripsi' => 'Meningkatkan kapasitas pemuda melalui pelatihan dan workshop.'],
            ['nama' => 'Bakti Sosial', 'deskripsi' => 'Kegiatan sosial untuk membantu masyarakat yang membutuhkan.'],
            ['nama' => 'Kewirausahaan', 'deskripsi' => 'Mendorong pemuda untuk mandiri melalui bidang kewirausahaan.'],
            ['nama' => 'Seni & Budaya', 'deskripsi' => 'Melestarikan seni dan budaya lokal Desa Pilangsari.'],
        ];

        $externalNews = ExternalNews::orderBy('published_at', 'desc')->take(3)->get();
        $rssBerita = $externalNews->count() ? [] : $this->getNationalNewsRSS();

        return view('landing.beranda', compact(
            'stats',
            'beritaTerbaru',
            'kegiatanTerbaru',
            'galeriTerbaru',
            'pengumuman',
            'programUnggulan',
            'externalNews',
            'rssBerita'
        ));
    }

    private function getBeritaRSS(): array
    {
        try {
            $rss = @simplexml_load_file('https://rss.kompas.com/rss/topic/desa', 'SimpleXMLElement', LIBXML_NOCDATA);
            if (!$rss) {
                // Fallback ke berita nasional
                $rss = @simplexml_load_file('https://rss.kompas.com/rss/topic/nasional', 'SimpleXMLElement', LIBXML_NOCDATA);
            }
            $berita = [];
            if ($rss && isset($rss->channel->item)) {
                $items = array_slice((array)$rss->channel->item, 0, 3);
                foreach ($items as $item) {
                    $berita[] = (object)[
                        'judul' => (string)($item['title'] ?? ''),
                        'slug' => '#',
                        'ringkasan' => strip_tags((string)($item['description'] ?? '')),
                        'thumbnail' => null,
                        'published_at' => now(),
                        'kategori' => (object)['nama' => 'Nasional'],
                        'is_rss' => true,
                        'link' => (string)($item['link'] ?? '#'),
                    ];
                }
            }
            return $berita;
        } catch (\Exception $e) {
            return [];
        }
    }

    private function getNationalNewsRSS(int $limit = 3): array
    {
        $rssUrl = (string) config('services.national_news.rss', 'https://rss.kompas.com/rss/topic/nasional');

        try {
            $http = Http::timeout(15)->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',
                    'Accept' => 'application/rss+xml, application/xml, text/xml, */*',
                ]);

            $verify = config('services.national_news.verify', true);
            $caBundle = config('services.national_news.ca_bundle');
            $insecureFallback = (bool) config('services.national_news.insecure_fallback', false);

            if (! $verify) {
                $http = $http->withOptions(['verify' => false]);
            } elseif (is_string($caBundle) && $caBundle !== '') {
                $http = $http->withOptions(['verify' => $caBundle]);
            }

            try {
                $response = $http->get($rssUrl);
            } catch (\Throwable $e) {
                if ($insecureFallback) {
                    $response = Http::timeout(15)
                        ->withOptions(['verify' => false])
                        ->withHeaders([
                            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',
                            'Accept' => 'application/rss+xml, application/xml, text/xml, */*',
                        ])
                        ->get($rssUrl);
                } else {
                    throw $e;
                }
            }

            if ($response->failed() || ! $response->body()) {
                return [];
            }

            $xml = @simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
            if (! $xml || ! isset($xml->channel->item)) {
                return [];
            }

            $items = [];
            $count = 0;
            foreach ($xml->channel->item as $item) {
                if ($count >= $limit) break;
                $pubDate = (string) $item->pubDate;
                $publishedAt = $pubDate ? strtotime($pubDate) : false;
                $items[] = [
                    'judul' => (string) $item->title,
                    'link' => (string) $item->link,
                    'desc' => strip_tags((string) $item->description),
                    'published_at' => $publishedAt ? date('Y-m-d H:i:s', $publishedAt) : null,
                ];
                $count++;
            }

            return $items;
        } catch (\Throwable $e) {
            return [];
        }
    }
}
