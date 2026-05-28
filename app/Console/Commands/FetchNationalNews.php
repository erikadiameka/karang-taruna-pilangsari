<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ExternalNews;

class FetchNationalNews extends Command
{
    protected $signature = 'fetch:national-news {--limit=10}';
    protected $description = 'Fetch national news from configured RSS feed and cache into DB';

    public function handle()
    {
        $rssUrl = (string) config('services.national_news.rss', 'https://rss.kompas.com/rss/topic/nasional');
        $limit = (int) $this->option('limit');

        $this->info('Fetching RSS: ' . $rssUrl);
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
                    $this->warn('SSL verification failed; retrying with verify=false (insecure).');
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
                $this->error('No contents from RSS. HTTP code: ' . $response->status());
                if (ini_get('allow_url_fopen')) {
                    $this->warn('Falling back to file_get_contents().');
                    $sslContext = stream_context_create([
                        'ssl' => [
                            'verify_peer' => (bool) $verify,
                            'verify_peer_name' => (bool) $verify,
                            'cafile' => is_string($caBundle) && $caBundle !== '' ? $caBundle : null,
                        ],
                    ]);
                    $contents = @file_get_contents($rssUrl, false, $sslContext);
                } else {
                    $this->warn('allow_url_fopen is disabled in PHP configuration.');
                    $contents = null;
                }
            } else {
                $contents = $response->body();
            }

            if (! $contents) {
                $this->error('No contents from RSS after fallback.');
                return 1;
            }

            $xml = @simplexml_load_string($contents, 'SimpleXMLElement', LIBXML_NOCDATA);
            if (! $xml || ! isset($xml->channel->item)) {
                $this->error('Invalid RSS structure');
                return 1;
            }

            $count = 0;
            foreach ($xml->channel->item as $item) {
                if ($count >= $limit) break;
                $link = (string) $item->link;
                $title = (string) $item->title;
                $desc = strip_tags((string) $item->description);
                $pub = (string) $item->pubDate;

                ExternalNews::updateOrCreate([
                    'url' => $link,
                ], [
                    'title' => $title,
                    'summary' => $desc,
                    'source' => 'Kompas',
                    'published_at' => $pub ? date('Y-m-d H:i:s', strtotime($pub)) : null,
                ]);

                $count++;
            }

            $this->info('Fetched: ' . $count);
            return 0;
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }
    }
}
