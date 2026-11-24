<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'slug' => 'mulai-dana-darurat-dari-kebiasaan-sederhana-sehari-hari',
                'title' => 'Mulai Dana Darurat dari Kebiasaan Sederhana Sehari-hari',
                'tag' => 'Perencanaan Finansial',
                'tag_color' => 'blue',
                'image' => 'assets/img/perencanaan-keluarga.jpg',
                'excerpt' => 'Langkah awal yang realistis untuk memisahkan dana kebutuhan pokok dan cadangan darurat keluarga demi ketenangan hidup masa depan.',
                'content' => '<p class="mb-4">Banyak keluarga di Kabupaten Majalengka merasa bahwa membentuk dana darurat membutuhkan penghasilan dalam jumlah besar. Padahal, kunci utama pembentukan dana darurat bukanlah besarnya nominal sekaligus, melainkan konsistensi memisahkan porsi kecil di awal setiap kali menerima pemasukan.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">1. Pisahkan Rekening Kebutuhan dan Rekening Cadangan</h4>
<p class="mb-4">Mencampurkan dana belanja pasar harian dengan simpanan adalah pemicu utama dana darurat sering terpakai tanpa sadar. Dengan membuka rekening tabungan khusus seperti <strong>SIDASI (Simpanan Dana Siaga)</strong> di Bank Majalengka yang bebas potongan administrasi bulanan memberatkan, uang cadangan Anda tetap utuh dan bertumbuh dengan bunga harian.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">2. Mulai dari Aturan 10%</h4>
<p class="mb-4">Cukup sisihkan 10% dari penghasilan tetap atau keuntungan dagang Anda setiap minggu. Jika penghasilan mingguan Anda Rp 1.000.000,-, sisihkan Rp 100.000,- langsung ke rekening simpanan. Petugas Bank Majalengka bahkan menyediakan fasilitas <em>Pickup Service</em> jemput setoran langsung ke lokasi Anda sehingga menabung tidak merepotkan waktu bekerja.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">3. Dana Terjamin Aman di BPR</h4>
<p class="mb-4">Simpanan Anda di Perumda BPR Majalengka dijamin 100% oleh <strong>Lembaga Penjamin Simpanan (LPS)</strong> hingga Rp 2.000.000.000,- per nasabah. Ketenangan pikiran keluarga Anda adalah prioritas kami.</p>',
                'author' => 'Tim Literasi Finansial Bank Majalengka',
                'read_time' => '4 menit baca',
                'published_at' => '2026-11-24',
                'is_published' => true,
            ],
            [
                'slug' => 'pisahkan-uang-usaha-warung-dan-uang-dapur-pribadi',
                'title' => 'Pisahkan Uang Usaha Warung dan Uang Dapur Pribadi',
                'tag' => 'Panduan UMKM',
                'tag_color' => 'amber',
                'image' => 'assets/img/warung-sembako.jpg',
                'excerpt' => 'Pencatatan kas harian yang tertib menghindarkan pedagang kecil dari modal yang tergerus kebutuhan konsumtif.',
                'content' => '<p class="mb-4">Bagi para pemilik toko kelontong, pedagang pasar Kadipaten, dan warung makan di pelosok Majalengka, salah satu tantangan terbesar adalah menjaga modal usaha tidak tergerus kebutuhan dapur rumah tangga sendiri.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">1. Gaji Diri Sendiri Secara Tetap</h4>
<p class="mb-4">Tentukan nominal "gaji" mingguan atau bulanan yang wajar untuk kebutuhan rumah tangga Anda. Ambil hanya sejumlah tersebut dari keuntungan bersih toko, dan jangan mengambil uang kembalian di laci kasir secara acak untuk keperluan pribadi.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">2. Miliki Buku Kas Catatan Harian Sederhana</h4>
<p class="mb-4">Cukup sediakan buku tulis bertanggal dengan tiga kolom: Uang Masuk, Uang Keluar (Kulakan), dan Sisa Saldo Kas. Setiap malam sebelum menutup toko, luangkan 5 menit untuk mencocokkan uang fisik dengan catatan buku.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">3. Dukungan Modal Usaha BPR Majalengka</h4>
<p class="mb-4">Bila usaha warung Anda membutuhkan suntikan permodalan untuk memperbanyak stok dagangan grosir menjelang masa panen raya atau hari raya, Bank Majalengka menyediakan fasilitas <strong>Kredit Modal Kerja (KMK)</strong> dan program <strong>Kredit PERAK</strong> dengan angsuran ringan dan persyaratan yang sangat bersahabat.</p>',
                'author' => 'Divisi Kredit UMKM',
                'read_time' => '5 menit baca',
                'published_at' => '2026-11-20',
                'is_published' => true,
            ],
            [
                'slug' => 'kenali-pesan-mencurigakan-jaga-kerahasiaan-data-perbankan',
                'title' => 'Kenali Pesan Mencurigakan, Jaga Kerahasiaan Data Perbankan',
                'tag' => '#AwasModus',
                'tag_color' => 'red',
                'image' => 'assets/img/pensiunan-hp.jpg',
                'excerpt' => 'Petugas Bank Majalengka tidak pernah meminta kode OTP, PIN, password, atau biaya transfer ke rekening pribadi pegawai.',
                'content' => '<p class="mb-4">Seiring berkembangnya transaksi digital, modus penipuan berkedok undian berhadiah, undangan pernikahan digital (file APK), dan pesan WhatsApp palsu yang mengatasnamakan bank kian marak mengincar masyarakat.</p>
<h4 class="font-bold text-slate-800 text-lg mb-2">Prinsip Aman Transaksi Bank Majalengka:</h4>
<ul class="list-disc pl-5 mb-4 space-y-2">
  <li><strong>JANGAN PERNAH</strong> memberitahukan nomor PIN, password, atau kode OTP kepada siapa pun, termasuk oknum yang mengaku sebagai pegawai bank.</li>
  <li><strong>JANGAN TRANSFER</strong> dana biaya administrasi pinjaman atau undian ke rekening bank atas nama perorangan atau nomor rekening pribadi petugas. Seluruh transaksi resmi disetorkan langsung di loket kantor kas atau rekening resmi Perumda BPR Majalengka.</li>
  <li><strong>JANGAN KLIK</strong> tautan file unduhan dengan ekstensi <code>.APK</code> yang dikirimkan melalui nomor WhatsApp asing.</li>
</ul>
<p class="mb-4">Bila Anda mendapati aktivitas mencurigakan atau dihubungi nomor tidak dikenal, segera konfirmasi ke Call Center resmi Bank Majalengka di <strong>(0233) 281144</strong> atau WhatsApp resmi <strong>0811-1111-6526</strong>.</p>',
                'author' => 'Satuan Kerja Manajemen Risiko & Kepatuhan',
                'read_time' => '3 menit baca',
                'published_at' => '2026-11-18',
                'is_published' => true,
            ],
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
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
