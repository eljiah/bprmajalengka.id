<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Branch;
use App\Models\Product;
use App\Models\PublicationReport;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeLandingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_home_page_renders_successfully_with_seeded_dynamic_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Perumda BPR Majalengka');
        $response->assertSee('KAPESTA');
        $response->assertSee('TAHARA');
        $response->assertSee('Kantor Cabang Kadipaten');
        $response->assertSee('Kantor Cabang Jatitujuh');
        $response->assertSee('Kantor Cabang Cikijing');
        $response->assertSee('Kantor Cabang Rajagaluh');
        $response->assertSee('Kantor Cabang Bantarujeg');
        $response->assertSee('Kantor Cabang Sukahaji');
        $response->assertSee('Kantor Cabang Kertajati');
        $response->assertSee('Kantor Cabang Ligung');
        $response->assertSee('8 Kantor Cabang');
        $this->assertSame(8, Branch::active()->where('is_main', false)->count());
        $response->assertSee('Dana Darurat');
        $response->assertSee('Laporan Publikasi 30 September 2024');
        $response->assertSee('Laporan Penerapan GCG 2023');
        $response->assertSee(route('home'));
        $response->assertSee(route('admin.login'));
        $response->assertSee(route('pengaduan.page'));
        $response->assertSee(route('pengajuan.form'));
        $response->assertDontSee('Formulir Pengaduan Nasabah Bank Majalengka');
        $response->assertDontSee('form-pengaduan-nasabah');
    }

    public function test_home_page_reflects_updated_settings_dynamically(): void
    {
        Setting::set('company_name', 'Bank BPR Majalengka Juara');
        Setting::set('phone_central', '(0233) 999888');

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Bank BPR Majalengka Juara');
        $response->assertSee('(0233) 999888');
    }

    public function test_branch_map_links_use_saved_google_maps_urls(): void
    {
        Branch::where('is_main', true)->firstOrFail()->update([
            'maps_url' => 'https://maps.app.goo.gl/main-office-pin',
        ]);
        Branch::where('name', 'Kantor Cabang Kadipaten')->firstOrFail()->update([
            'maps_url' => 'https://maps.app.goo.gl/kadipaten-pin',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('https://maps.app.goo.gl/main-office-pin');
        $response->assertSee('https://maps.app.goo.gl/kadipaten-pin');
    }

    public function test_seeded_branch_map_links_are_saved_google_maps_urls(): void
    {
        $mapsUrls = [
            'Kantor Pusat Operasional' => 'https://maps.app.goo.gl/ETZSG6nud1KCrDDd9',
            'Kantor Cabang Kadipaten' => 'https://maps.app.goo.gl/m1WY5x3bvt2rf74Z7',
            'Kantor Cabang Jatitujuh' => 'https://www.google.com/maps?q=-6.6439472368882635,108.2294895625247',
            'Kantor Cabang Cikijing' => 'https://maps.app.goo.gl/65yBz4rkPUPPYpBc9',
            'Kantor Cabang Rajagaluh' => 'https://maps.app.goo.gl/dzKqbWBpxUZiqkR37',
            'Kantor Cabang Bantarujeg' => 'https://maps.app.goo.gl/cRU3vjddyqW6uQx38',
            'Kantor Cabang Sukahaji' => 'https://maps.app.goo.gl/FUDyUFCGK9qBppsJ7',
            'Kantor Cabang Kertajati' => 'https://maps.app.goo.gl/oDvA7PDcnVTPNZWi7',
            'Kantor Cabang Ligung' => 'https://maps.app.goo.gl/vezobnU4cMSMgH7L6',
        ];

        $response = $this->get('/');

        foreach ($mapsUrls as $name => $mapsUrl) {
            $branch = Branch::where('name', $name)->firstOrFail();

            $this->assertSame($mapsUrl, $branch->maps_url, "{$name} map URL changed.");
            $response->assertSee($mapsUrl);
        }
    }

    public function test_home_page_reflects_new_article_dynamically(): void
    {
        Article::create([
            'title' => 'Tips Mengelola Keuangan Desa Bersama Bank Majalengka',
            'slug' => 'tips-mengelola-keuangan-desa',
            'category' => 'Edukasi Keuangan',
            'excerpt' => 'Panduan pengelolaan alokasi dana desa secara akuntabel.',
            'content' => '<p>Konten artikel lengkap tentang keuangan desa.</p>',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Tips Mengelola Keuangan Desa Bersama Bank Majalengka');
    }

    public function test_landing_page_renders_dynamic_bpr_profile_and_counts(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Profil BPR modal content
        $response->assertSee('Profil Perumda BPR Majalengka');
        $response->assertSee('Menjadi Bank Perekonomian Rakyat yang terpercaya');
        $response->assertSee('Tonggak Sejarah Merger 8 BPR');
        $response->assertSee('Visi Perusahaan');
        $response->assertSee('Misi Perusahaan');

        // Dynamic category count buttons
        $tabunganCount = Product::where('category', 'tabungan')->active()->count();
        $depositoCount = Product::where('category', 'deposito')->active()->count();
        $kreditCount = Product::where('category', 'kredit')->active()->count();

        $response->assertSee("Kenali Tabungan ({$tabunganCount} Produk)");
        $response->assertSee("Kenali Deposito ({$depositoCount} Pilihan)");
        $response->assertSee("Kenali Kredit ({$kreditCount} Kategori)");

        // Anti-fraud warning popup & modal reader
        $response->assertSee('id="modal-news-reader"', false);
        $response->assertSee('AWAS PENIPUAN MENGATASNAMAKAN PERUMDA BPR MAJALENGKA');
        $response->assertSee('Petugas bank tidak pernah meminta kode OTP');

        // Download link for publication reports
        $response->assertSee('Unduh PDF');
        $response->assertSee('download');
    }
}
