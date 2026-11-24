<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('articles')) {
            return;
        }

        // Pastikan tanggal artikel awal tetap menjadi 3 teratas
        DB::table('articles')->where('slug', 'mulai-dana-darurat-dari-kebiasaan-sederhana-sehari-hari')->update(['published_at' => '2026-11-24']);
        DB::table('articles')->where('slug', 'pisahkan-uang-usaha-warung-dan-uang-dapur-pribadi')->update(['published_at' => '2026-11-20']);
        DB::table('articles')->where('slug', 'kenali-pesan-mencurigakan-jaga-kerahasiaan-data-perbankan')->update(['published_at' => '2026-11-18']);

        $newArticles = [
            [
                'slug' => 'sinergi-bpr-majalengka-dorong-ketahanan-pangan-melalui-kredit-pertanian',
                'title' => 'Sinergi BPR Majalengka Dorong Ketahanan Pangan Melalui Kredit Pertanian',
                'tag' => 'Ekonomi Daerah',
                'tag_color' => 'emerald',
                'image' => 'assets/img/umkm-anyaman.jpg',
                'excerpt' => 'Memperkuat produktivitas petani bawang merah dan padi di Majalengka dengan skema pembayaran fleksibel Yarnen (Bayar Setelah Panen).',
                'content' => '<p class="mb-4">Sebagai Badan Usaha Milik Daerah (BUMD), Perumda BPR Majalengka terus membuktikan komitmennya dalam memperkuat sektor pertanian yang menjadi tulang punggung perekonomian masyarakat Majalengka.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">1. Skema Yarnen: Solusi Petani Tanpa Beban Bulanan</h4>
<p class="mb-4">Melalui fasilitas <strong>Kredit Pertanian & Musiman</strong>, petani komoditas unggulan seperti bawang merah, padi sawah, dan cabai mendapatkan permodalan sarana produksi pertanian (pupuk, benih, sewa alsintan) dengan sistem pembayaran <em>Yarnen (Bayar Setelah Panen)</em>. Petani tidak terbebani cicilan di tengah masa tanam.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">2. Pendampingan Petugas Lapangan di 8 Kantor Cabang</h4>
<p class="mb-4">Jaringan 8 kantor cabang aktif Perumda BPR Majalengka yang tersebar di sentra pertanian (seperti Jatitujuh, Sukahaji, Kertajati, dan Cikijing) siap memberikan pendampingan langsung ke kelompok tani demi kelancaran penyaluran pembiayaan yang tepat sasaran.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">3. Aman dan Terjamin LPS</h4>
<p class="mb-4">Perumda BPR Majalengka menjamin keamanan transaksi perbankan dengan tata kelola profesional berizin OJK serta perlindungan simpanan 100% oleh LPS hingga Rp 2 Miliar.</p>',
                'author' => 'Divisi Pembiayaan Pertanian & Komersial',
                'read_time' => '4 menit baca',
                'published_at' => '2026-11-14',
                'is_published' => true,
                'views_count' => 84,
            ],
            [
                'slug' => 'transformasi-layanan-bpr-sentuhan-personal-hadapi-era-digitalisasi',
                'title' => 'Transformasi Layanan BPR: Sentuhan Personal Hadapi Era Digitalisasi',
                'tag' => 'Transformasi BPR',
                'tag_color' => 'blue',
                'image' => 'assets/img/hero-batik.jpg',
                'excerpt' => 'Mengapa perbankan daerah tetap menjadi pilihan utama masyarakat berkat layanan jemput bola (Pickup Service) yang dipadukan transparansi sistem.',
                'content' => '<p class="mb-4">Di tengah percepatan teknologi finansial, Perumda BPR Majalengka membuktikan bahwa kedekatan emosional dan kepercayaan tatap muka dengan nasabah adalah pondasi utama perbankan kerakyatan.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">1. Layanan Pickup Service ke Pasar dan Pelosok Desa</h4>
<p class="mb-4">Bagi pedagang pasar dan pelaku UMKM yang tidak sempat meninggalkan toko, petugas resmi BPR Majalengka hadir menjemput setoran tabungan dan angsuran langsung di lokasi dengan validasi sistem yang aman dan akuntabel.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">2. Analisis Kredit yang Manusiawi dan Cepat</h4>
<p class="mb-4">Kami tidak hanya melihat angka di atas kertas, tetapi juga memahami prospek nyata usaha masyarakat. Keputusan kredit diproses secara terukur, cepat, dan transparan oleh tim analis lokal yang memahami karakteristik daerah.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">3. Modern Namun Tetap Merakyat</h4>
<p class="mb-4">Modernisasi infrastruktur internal tetap diimbangi dengan pelayanan yang ramah, santun, dan mudah dipahami oleh seluruh lapisan masyarakat Majalengka.</p>',
                'author' => 'Tim Transformasi Layanan BPR',
                'read_time' => '5 menit baca',
                'published_at' => '2026-11-12',
                'is_published' => true,
                'views_count' => 112,
            ],
            [
                'slug' => 'memilih-investasi-simpanan-yang-cerdas-keunggulan-deposito-bpr-bergaransi-lps',
                'title' => 'Memilih Investasi Simpanan yang Cerdas: Keunggulan Deposito BPR Bergaransi LPS',
                'tag' => 'Literasi Investasi',
                'tag_color' => 'purple',
                'image' => 'assets/img/pensiunan-hp.jpg',
                'excerpt' => 'Strategi mengamankan dana masa depan dengan imbal hasil suku bunga optimal dan proteksi penjaminan 100% dari Lembaga Penjamin Simpanan (LPS).',
                'content' => '<p class="mb-4">Menyiapkan dana pensiun, tabungan pendidikan anak, atau dana cadangan keluarga memerlukan instrumen investasi yang aman, menguntungkan, dan bebas dari fluktuasi pasar modal.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">1. Bunga Kompetitif Sesuai Ketentuan Penjaminan LPS</h4>
<p class="mb-4">Deposito Berjangka di BPR Majalengka menawarkan tingkat suku bunga penjaminan LPS yang lebih tinggi dibandingkan bank umum, memberikan pertumbuhan saldo yang lebih optimal bagi para deposan.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">2. Jangka Waktu Fleksibel (1, 3, 6, 12 Bulan)</h4>
<p class="mb-4">Nasabah dapat leluasa menentukan periode penempatan dana sesuai rencana finansial, dengan kemudahan fasilitas <em>Automatic Roll Over (ARO)</em> perpanjangan otomatis saat jatuh tempo.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">3. Jaminan Pokok dan Bunga Aman Terlindungi</h4>
<p class="mb-4">Seluruh simpanan deposito di BPR Majalengka dijamin sepenuhnya oleh Lembaga Penjamin Simpanan (LPS) hingga batas maksimal Rp 2.000.000.000,- per nasabah.</p>',
                'author' => 'Satuan Kerja Edukasi & Simpanan',
                'read_time' => '4 menit baca',
                'published_at' => '2026-11-10',
                'is_published' => true,
                'views_count' => 96,
            ],
        ];

        foreach ($newArticles as $article) {
            $existing = DB::table('articles')->where('slug', $article['slug'])->first();
            if ($existing) {
                DB::table('articles')->where('id', $existing->id)->update($article);
            } else {
                $article['created_at'] = now();
                $article['updated_at'] = now();
                DB::table('articles')->insert($article);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe no-op to protect data integrity
    }
};
