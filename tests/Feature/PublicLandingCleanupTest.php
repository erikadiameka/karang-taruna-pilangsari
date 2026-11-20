<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicLandingCleanupTest extends TestCase
{
    public function test_potensi_desa_page_is_available_from_a_public_route(): void
    {
        $response = $this->get(route('potensi-desa'))
            ->assertOk()
            ->assertSee('Pertanian padi');

        $response->assertSee('bg-white/70', false);
        $response->assertDontSee('images.unsplash.com');
        foreach (['sawah1.jpg', 'sawah2.jpg', 'sawah3.jpg', 'sawah4.webp', 'sawah5.webp', 'sawah6.jpg'] as $image) {
            $response->assertSee($image);
        }
        $this->assertSame(6, substr_count($response->getContent(), 'images/sawah'));
        $response->assertDontSee('Pertanian Pilangsari dalam enam potret');
        $response->assertDontSee('Dokumentasi 01');
    }

    public function test_homepage_promotes_instagram_and_keeps_whatsapp_accessible(): void
    {
        $this->get(route('beranda'))
            ->assertOk()
            ->assertSee('Ikuti kegiatan IKAPPI')
            ->assertSee('https://www.instagram.com/ikappi_pilangsari')
            ->assertSee('aria-label="Buka chat WhatsApp"', false);
    }

    public function test_admin_login_uses_the_updated_identity_without_emoji(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Selamat datang kembali')
            ->assertSee('images/ikkapii-logo.png')
            ->assertDontSee('👋')
            ->assertSee('Akun admin hanya dibuat oleh pengelola.');
    }

    public function test_removed_landing_pages_are_no_longer_available(): void
    {
        foreach (['/sejarah', '/dasar-hukum', '/umkm', '/klub', '/dokumentasi'] as $path) {
            $this->get($path)->assertNotFound();
        }
    }

    public function test_legacy_news_and_announcement_urls_redirect_to_instagram(): void
    {
        $instagramUrl = 'https://www.instagram.com/ikappi_pilangsari';

        $this->get('/berita')->assertRedirect($instagramUrl);
        $this->get('/berita/contoh-artikel')->assertRedirect($instagramUrl);
        $this->get('/pengumuman')->assertRedirect($instagramUrl);
        $this->get('/pengumuman/1')->assertRedirect($instagramUrl);
    }
}
