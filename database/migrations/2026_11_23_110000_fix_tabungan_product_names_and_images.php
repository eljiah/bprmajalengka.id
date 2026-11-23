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
        if (!Schema::hasTable('products')) {
            return;
        }

        $tabunganProducts = [
            [
                'slug' => 'tahara',
                'code' => 'TAB-01',
                'name' => 'Tabungan Hari Raya (TAHARA)',
                'badge' => 'Hari Raya & Idul Fitri',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/tahara.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Persiapan matang menyambut hari kemenangan dengan sukacita dan ketenangan finansial.',
                'short_desc' => 'Tabungan berencana dengan setoran bulanan tetap untuk persiapan kebutuhan hari raya Idul Fitri keluarga, mudik, dan hari besar keagamaan.',
                'ketentuan' => json_encode([
                    'Jangka waktu penempatan 10 s/d 12 bulan (pencairan menjelang H-14 Idul Fitri).',
                    'Setoran bulanan terjangkau mulai dari Rp 50.000,- kelipatan Rp 10.000,-.',
                    'Bebas biaya administrasi bulanan.',
                    'Bonus bingkisan lebaran spesial untuk penabung disiplin dengan tiering tertentu.',
                    'Dijamin sepenuhnya oleh Lembaga Penjamin Simpanan (LPS).'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP / Identitas diri pemohon yang masih berlaku (Majalengka/Jawa Barat).',
                    'Mengisi dan menandatangani formulir pembukaan rekening TAHARA.',
                    'Menyetorkan setoran awal paket pertama sesuai nominal rencana yang dipilih.',
                    'Menyertakan nomor WhatsApp aktif untuk konfirmasi mutasi bulanan.'
                ]),
                'cta_text' => 'Buka Rekening TAHARA',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'tiara',
                'code' => 'TAB-02',
                'name' => 'Tabungan Insan Sejahtera (TIARA)',
                'badge' => 'Rencana Sejahtera',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2909.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Wujudkan masa depan sejahtera, aman, dan penuh kepastian bersama Bank Majalengka.',
                'short_desc' => 'Fasilitas tabungan berencana bagi nasabah individu dan keluarga untuk mewujudkan rencana masa depan yang sejahtera, mandiri, dan terjamin.',
                'ketentuan' => json_encode([
                    'Jangka waktu simpanan fleksibel sesuai target rencana keluarga.',
                    'Suku bunga kompetitif di atas tabungan biasa dan bebas biaya administrasi bulanan.',
                    'Setoran bulanan terjangkau dapat disesuaikan dengan kemampuan keuangan.',
                    'Dapat dijadikan jaminan kredit dengan proses persetujuan cepat.',
                    'Aman dan dijamin 100% oleh LPS hingga Rp 2 Miliar.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP/e-KTP pemohon yang masih berlaku.',
                    'Mengisi formulir permohonan pembukaan rekening TIARA.',
                    'Setoran awal ringan mulai Rp 100.000,-.',
                    'Kartu Keluarga (jika atas nama perwakilan keluarga).'
                ]),
                'cta_text' => 'Buka Tabungan TIARA',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'kotak-mas',
                'code' => 'TAB-03',
                'name' => 'Tabungan Kotak Masyarakat (KOTAK MAS)',
                'badge' => 'Mitra Usaha & Pasar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2911.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Kotak masa depan sejahtera dengan kemudahan menabung harian bagi masyarakat.',
                'short_desc' => 'Program tabungan praktis dengan celengan kotak khusus untuk pedagang pasar, pelaku usaha mikro, dan masyarakat umum dengan layanan jemput setoran rutin.',
                'ketentuan' => json_encode([
                    'Diberikan celengan kotak tabungan khusus yang terkunci aman.',
                    'Petugas BPR Majalengka siap menjemput setoran langsung ke lokasi usaha.',
                    'Bebas biaya administrasi bulanan dan bebas biaya penjemputan.',
                    'Saldo dapat ditarik sewaktu-waktu saat dibutuhkan untuk perputaran modal.',
                    'Simpanan dijamin LPS sesuai ketentuan yang berlaku.'
                ]),
                'syarat' => json_encode([
                    'e-KTP asli & fotokopi pemohon.',
                    'Memiliki tempat usaha atau domisili di wilayah Majalengka.',
                    'Mengisi formulir pembukaan rekening KOTAK MAS.',
                    'Setoran awal ringan mulai dari Rp 20.000,-.'
                ]),
                'cta_text' => 'Buka Rekening KOTAK MAS',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'sidasi',
                'code' => 'TAB-04',
                'name' => 'Simpanan Dana Siswa (SIDASI)',
                'badge' => 'Khusus Pelajar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/WhatsApp_Image_2026-06-08_at_13.43.08-removebg-preview.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Simpanan aman bagi para siswa untuk menyiapkan biaya pendidikan dan masa depan cerah.',
                'short_desc' => 'Tabungan khusus pelajar dan siswa sekolah dari jenjang PAUD hingga SMA/SMK dengan persyaratan mudah, setoran terjangkau, dan bebas biaya administrasi bulanan.',
                'ketentuan' => json_encode([
                    'Buku tabungan resmi diterbitkan atas nama siswa sendiri.',
                    'Bebas biaya administrasi bulanan seumur masa sekolah.',
                    'Tersedia layanan jemput tabungan langsung ke sekolah mitra BPR.',
                    'Setoran harian atau mingguan sangat fleksibel dan terjangkau.',
                    'Dijamin LPS hingga Rp 2 Miliar.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi Kartu Pelajar / Kartu Identitas Anak (KIA) / Akta Kelahiran.',
                    'Fotokopi KTP orang tua atau wali murid.',
                    'Mengisi formulir pembukaan rekening perorangan siswa.',
                    'Setoran awal sangat ringan, mulai Rp 10.000,-.'
                ]),
                'cta_text' => 'Buka Simpanan SIDASI',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'tapa-qur',
                'code' => 'TAB-05',
                'name' => 'Tabungan Paket Qurban (TAPA QUR)',
                'badge' => 'Kolektif & Masjid',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/design_tabungan_tapaqur-removebg-preview.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Kolektif qurban masjid, komunitas, dan rukun warga yang tertib dan transparan.',
                'short_desc' => 'Fasilitas tabungan qurban kolektif untuk DKM masjid, majelis taklim, instansi kantor, dan kelompok masyarakat dengan pelaporan berkala transparan.',
                'ketentuan' => json_encode([
                    'Dapat dibuka atas nama bendahara panitia qurban masjid atau kelompok per 7 orang.',
                    'Laporan rekapitulasi mutasi dapat dicetak sewaktu-waktu untuk pengurus.',
                    'Kerjasama resmi dengan peternak lokal Majalengka bersertifikasi kesehatan dinas.',
                    'Bebas biaya administrasi dan bebas biaya transfer antar kantor kas BPR.',
                    'Dijamin penuh oleh LPS.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP pengurus (Ketua & Bendahara DKM/Komunitas).',
                    'Surat penunjukan kepengurusan DKM atau berita acara kelompok.',
                    'Setoran awal kelompok mulai Rp 100.000,-.'
                ]),
                'cta_text' => 'Daftar Paket TAPA QUR',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'tada-bur',
                'code' => 'TAB-06',
                'name' => 'Tabungan Dana Berangkat Umroh (TADABUR)',
                'badge' => 'Ibadah Baitullah',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/tadabur.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Wujudkan niat suci beribadah ke Baitullah dengan tabungan umroh terencana dan terpercaya.',
                'short_desc' => 'Tabungan khusus persiapan keberangkatan ibadah umroh reguler bagi perorangan maupun keluarga dengan kepastian jadwal keberangkatan dan travel mitra berizin resmi Kemenag.',
                'ketentuan' => json_encode([
                    'Jangka waktu penempatan fleksibel 1 s/d 3 tahun sesuai paket umroh yang dipilih.',
                    'Bebas biaya administrasi bulanan dan suku bunga kompetitif.',
                    'Pilihan paket setoran bulanan tetap yang terjangkau dan terencana.',
                    'Kerjasama dengan biro perjalanan umroh resmi dan terakreditasi.',
                    'Dijamin aman oleh LPS.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP/e-KTP dan Kartu Keluarga calon jamaah.',
                    'Fotokopi Paspor (apabila sudah memiliki).',
                    'Mengisi formulir pembukaan rekening TADABUR.',
                    'Setoran awal paket mulai Rp 500.000,-.'
                ]),
                'cta_text' => 'Buka Tabungan TADABUR',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'slug' => 't-asmara',
                'code' => 'TAB-07',
                'name' => 'Tabungan Arisan Masyarakat (T-ASMARA)',
                'badge' => 'Arisan Warga',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2914.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Tabungan arisan masyarakat dengan kesempatan memperoleh tarikan dan doorprize menarik.',
                'short_desc' => 'Fasilitas tabungan arisan masyarakat Majalengka Raharja yang memadukan budaya arisan gotong royong dengan kepastian keamanan perbankan resmi BPR.',
                'ketentuan' => json_encode([
                    'Periode arisan terjadwal dengan penarikan berkala yang transparan.',
                    'Hadiah tarikan dan doorprize menarik pada setiap periode penarikan.',
                    'Bebas biaya administrasi pengelolaan rekening arisan.',
                    'Dana pokok tabungan tetap aman dan kembali utuh.',
                    'Dijamin sepenuhnya oleh LPS.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP / e-KTP warga pemohon yang masih berlaku.',
                    'Mengisi formulir kepesertaan arisan T-ASMARA.',
                    'Setoran iuran arisan bulanan tetap sesuai kelompok paket yang dipilih.',
                    'Nomor kontak / WhatsApp aktif.'
                ]),
                'cta_text' => 'Daftar Arisan T-ASMARA',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'slug' => 'ciremaiku',
                'code' => 'TAB-08',
                'name' => 'Tabungan Bersama CIREMAIKU',
                'badge' => 'Undian Akbar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2922.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Tabungan bersama jaringan BPR Se-Ciayumajakuning dengan undian hadiah spektakuler.',
                'short_desc' => 'Tabungan bersama seluruh BPR di wilayah Cirebon, Indramayu, Majalengka, dan Kuningan dengan program undian berhadiah mobil, sepeda motor, dan aneka hadiah menarik setiap tahun.',
                'ketentuan' => json_encode([
                    'Setiap kelipatan saldo tertentu otomatis mendapatkan poin kupon undian resmi.',
                    'Penarikan undian diselenggarakan secara terbuka di hadapan notaris dan dinas sosial.',
                    'Suku bunga tabungan bersaing dan dihitung harian.',
                    'Dapat disetor dan ditarik di seluruh jaringan BPR anggota se-Ciayumajakuning.',
                    'Simpanan aman dan dijamin LPS.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP pemohon yang masih berlaku.',
                    'Mengisi form pembukaan rekening CIREMAIKU.',
                    'Setoran awal mulai Rp 50.000,-.'
                ]),
                'cta_text' => 'Buka Tabungan CIREMAIKU',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'slug' => 'simpel',
                'code' => 'TAB-09',
                'name' => 'Simpanan Pelajar (SimPel) OJK',
                'badge' => 'Program Nasional',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2926.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Gerakan Indonesia Menabung resmi berstandar Otoritas Jasa Keuangan (OJK).',
                'short_desc' => 'Produk tabungan nasional inisiasi OJK khusus siswa PAUD s/d SMA dengan fitur serba sederhana, syarat mudah, dan bebas biaya admin bulanan.',
                'ketentuan' => json_encode([
                    'Bebas biaya administrasi bulanan.',
                    'Setoran awal hanya Rp 5.000,- dan setoran berikutnya mulai Rp 1.000,-.',
                    'Buku tabungan diterbitkan langsung atas nama siswa.',
                    'Dilindungi penuh oleh Lembaga Penjamin Simpanan (LPS).'
                ]),
                'syarat' => json_encode([
                    'Fotokopi Kartu Pelajar / Surat Keterangan Sekolah.',
                    'Fotokopi Akta Kelahiran dan Kartu Keluarga.',
                    'Fotokopi KTP orang tua / wali.',
                    'Mengisi formulir pembukaan SimPel di loket atau saat mobil kas keliling ke sekolah.'
                ]),
                'cta_text' => 'Buka Rekening SimPel',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'slug' => 'simarmas-go',
                'code' => 'TAB-10',
                'name' => 'Tabungan SIMARMAS GO (PERBAMIDA)',
                'badge' => 'Nasional PERBAMIDA',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2928.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Simpanan Simpan Mas gerakan BPR Se-Indonesia bersama PERBAMIDA.',
                'short_desc' => 'Tabungan unggulan asosiasi BPR PERBAMIDA nasional dengan berbagai kemudahan transaksi, suku bunga menarik, dan peluang mengikuti program undian nasional.',
                'ketentuan' => json_encode([
                    'Kemudahan transaksi setoran dan penarikan di jaringan mitra BPR.',
                    'Bunga dihitung berdasarkan saldo harian dengan tiering kompetitif.',
                    'Peluang mengikuti undian berkala skala nasional BPR sahabat anak negeri.',
                    'Bebas biaya pemeliharaan rekening bulanan.',
                    'Dijamin sepenuhnya oleh LPS hingga Rp 2 Miliar.'
                ]),
                'syarat' => json_encode([
                    'Fotokopi KTP / e-KTP pemohon yang masih berlaku.',
                    'Mengisi formulir permohonan rekening SIMARMAS GO.',
                    'Setoran awal ringan mulai Rp 50.000,-.'
                ]),
                'cta_text' => 'Buka SIMARMAS GO',
                'cta_type' => 'whatsapp',
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($tabunganProducts as $data) {
            $existing = DB::table('products')->where('code', $data['code'])->first();
            if ($existing) {
                DB::table('products')->where('id', $existing->id)->update($data);
            } else {
                $data['created_at'] = now();
                $data['updated_at'] = now();
                DB::table('products')->insert($data);
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
