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

    public function test_branch_map_links_use_cms_coordinates_when_available(): void
    {
        Branch::where('is_main', true)->firstOrFail()->update([
            'latitude' => '-6.8281000',
            'longitude' => '108.2276000',
        ]);
        Branch::where('name', 'Kantor Cabang Kadipaten')->firstOrFail()->update([
            'latitude' => '-6.8290000',
            'longitude' => '108.2280000',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('https://www.google.com/maps/search/?api=1&query=-6.8281000%2C108.2276000');
        $response->assertSee('https://www.google.com/maps/search/?api=1&query=-6.8290000%2C108.2280000');
        $response->assertDontSee('https://www.google.com/maps?q=');
    }

    public function test_seeded_branch_map_links_keep_the_supplied_coordinate_precision(): void
    {
        $coordinates = [
            'Kantor Cabang Kadipaten' => ['-6.7632246516128065', '108.1682402947551'],
            'Kantor Cabang Jatitujuh' => ['-6.6439472368882635', '108.2294895625247'],
            'Kantor Cabang Cikijing' => ['-7.016916098244055', '108.36454874491558'],
            'Kantor Cabang Rajagaluh' => ['-6.779398593568954', '108.3447027455341'],
            'Kantor Cabang Bantarujeg' => ['-6.968736619525069', '108.23936331773582'],
            'Kantor Cabang Sukahaji' => ['-6.8190775141653255', '108.2807762434407'],
            'Kantor Cabang Kertajati' => ['-6.677302143150963', '108.18905769385799'],
            'Kantor Cabang Ligung' => ['-6.652526614832701', '108.28211492563509'],
        ];

        $response = $this->get('/');

        foreach ($coordinates as $name => [$latitude, $longitude]) {
            $branch = Branch::where('name', $name)->firstOrFail();
            $storedLatitude = rtrim(rtrim((string) $branch->latitude, '0'), '.');
            $storedLongitude = rtrim(rtrim((string) $branch->longitude, '0'), '.');
            $mapQuery = rawurlencode($storedLatitude . ',' . $storedLongitude);

            $this->assertSame($latitude, $storedLatitude, "{$name} latitude precision changed.");
            $this->assertSame($longitude, $storedLongitude, "{$name} longitude precision changed.");
            $response->assertSee('https://www.google.com/maps/search/?api=1&query=' . $mapQuery);
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

        // Download link for publication reports
        $response->assertSee('Unduh PDF');
        $response->assertSee('download');
    }
}
