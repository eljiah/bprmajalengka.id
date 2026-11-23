<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // ==================== TABUNGAN (10 ITEMS) ====================
            [
                'slug' => 'tahara',
                'code' => 'TAB-01',
                'name' => 'TAHARA',
                'badge' => 'Favorit Keluarga',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/tahara.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Persiapan menyambut hari raya Idul Fitri yang tenang, khidmat, dan penuh berkah.',
                'short_desc' => 'Tabungan berencana dengan setoran bulanan tetap untuk persiapan kebutuhan hari raya Idul Fitri keluarga, mudik, dan parcel lebaran tanpa membebani arus kas bulanan.',
                'ketentuan' => [
                    'Jangka waktu penempatan 10 s/d 12 bulan (pencairan menjelang Idul Fitri).',
                    'Setoran bulanan terjangkau mulai dari Rp 50.000,- hingga Rp 5.000.000,- per bulan.',
                    'Suku bunga kompetitif di atas tabungan reguler dan bebas biaya administrasi bulanan.',
                    'Dana tidak dapat ditarik sebelum jatuh tempo demi kedisiplinan rencana ibadah.',
                    'Dijamin sepenuhnya oleh Lembaga Penjamin Simpanan (LPS) hingga Rp 2 Miliar.'
                ],
                'syarat' => [
                    'Fotokopi KTP / Identitas diri pemohon yang masih berlaku (Majalengka/Jawa Barat).',
                    'Mengisi dan menandatangani formulir pembukaan rekening TAHARA.',
                    'Menyetorkan setoran awal paket pertama sesuai nominal rencana yang dipilih.',
                    'Menyertakan nomor WhatsApp aktif untuk konfirmasi mutasi bulanan.'
                ],
                'cta_text' => 'Buka Rekening TAHARA',
                'cta_type' => 'whatsapp',
                'sort_order' => 1,
            ],
            [
                'slug' => 'tiara',
                'code' => 'TAB-02',
                'name' => 'TIARA',
                'badge' => 'Rencana Sejahtera',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2909.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Wujudkan masa depan sejahtera, aman, dan penuh kepastian bersama Bank Majalengka.',
                'short_desc' => 'Fasilitas tabungan berencana bagi nasabah individu dan keluarga untuk mewujudkan rencana masa depan yang sejahtera, mandiri, dan terjamin.',
                'ketentuan' => [
                    'Jangka waktu simpanan fleksibel sesuai target rencana keluarga.',
                    'Suku bunga kompetitif di atas tabungan biasa dan bebas biaya administrasi bulanan.',
                    'Setoran bulanan terjangkau dapat disesuaikan dengan kemampuan keuangan.',
                    'Dapat dijadikan jaminan kredit dengan proses persetujuan cepat.',
                    'Aman dan dijamin 100% oleh LPS hingga Rp 2 Miliar.'
                ],
                'syarat' => [
                    'Fotokopi KTP/e-KTP pemohon yang masih berlaku.',
                    'Mengisi formulir permohonan pembukaan rekening TIARA.',
                    'Setoran awal ringan mulai Rp 100.000,-.',
                    'Kartu Keluarga (jika atas nama perwakilan keluarga).'
                ],
                'cta_text' => 'Buka Tabungan TIARA',
                'cta_type' => 'whatsapp',
                'sort_order' => 2,
            ],
            [
                'slug' => 'kotak-mas',
                'code' => 'TAB-03',
                'name' => 'KOTAK MAS',
                'badge' => 'Mitra Usaha & Pasar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2911.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Kotak masa depan sejahtera dengan kemudahan menabung harian bagi masyarakat.',
                'short_desc' => 'Program tabungan praktis dengan celengan kotak khusus untuk pedagang pasar, pelaku usaha mikro, dan masyarakat umum dengan layanan jemput setoran rutin.',
                'ketentuan' => [
                    'Diberikan celengan kotak tabungan khusus yang terkunci aman.',
                    'Petugas BPR Majalengka siap menjemput setoran langsung ke lokasi usaha.',
                    'Bebas biaya administrasi bulanan dan bebas biaya penjemputan.',
                    'Saldo dapat ditarik sewaktu-waktu saat dibutuhkan untuk perputaran modal.',
                    'Simpanan dijamin LPS sesuai ketentuan yang berlaku.'
                ],
                'syarat' => [
                    'e-KTP asli & fotokopi pemohon.',
                    'Memiliki tempat usaha atau domisili di wilayah Majalengka.',
                    'Mengisi formulir pembukaan rekening KOTAK MAS.',
                    'Setoran awal ringan mulai dari Rp 20.000,-.'
                ],
                'cta_text' => 'Buka Rekening KOTAK MAS',
                'cta_type' => 'whatsapp',
                'sort_order' => 3,
            ],
            [
                'slug' => 'sidasi',
                'code' => 'TAB-04',
                'name' => 'SIDASI',
                'badge' => 'Khusus Pelajar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/WhatsApp_Image_2026-06-08_at_13.43.08-removebg-preview.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Simpanan aman bagi para siswa untuk menyiapkan biaya pendidikan dan masa depan cerah.',
                'short_desc' => 'Tabungan khusus pelajar dan siswa sekolah dari jenjang PAUD hingga SMA/SMK dengan persyaratan mudah, setoran terjangkau, dan bebas biaya administrasi bulanan.',
                'ketentuan' => [
                    'Buku tabungan resmi diterbitkan atas nama siswa sendiri.',
                    'Bebas biaya administrasi bulanan seumur masa sekolah.',
                    'Tersedia layanan jemput tabungan langsung ke sekolah mitra BPR.',
                    'Setoran harian atau mingguan sangat fleksibel dan terjangkau.',
                    'Dijamin LPS hingga Rp 2 Miliar.'
                ],
                'syarat' => [
                    'Fotokopi Kartu Pelajar / Kartu Identitas Anak (KIA) / Akta Kelahiran.',
                    'Fotokopi KTP orang tua atau wali murid.',
                    'Mengisi formulir pembukaan rekening perorangan siswa.',
                    'Setoran awal sangat ringan, mulai Rp 10.000,-.'
                ],
                'cta_text' => 'Buka Simpanan SIDASI',
                'cta_type' => 'whatsapp',
                'sort_order' => 4,
            ],
            [
                'slug' => 'tapa-qur',
                'code' => 'TAB-05',
                'name' => 'TAPAQUR',
                'badge' => 'Kolektif & Masjid',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/design_tabungan_tapaqur-removebg-preview.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Kolektif qurban masjid, komunitas, dan rukun warga yang tertib dan transparan.',
                'short_desc' => 'Fasilitas tabungan qurban kolektif untuk DKM masjid, majelis taklim, instansi kantor, dan kelompok masyarakat dengan pelaporan berkala transparan.',
                'ketentuan' => [
                    'Dapat dibuka atas nama bendahara panitia qurban masjid atau kelompok per 7 orang.',
                    'Laporan rekapitulasi mutasi dapat dicetak sewaktu-waktu untuk pengurus.',
                    'Kerjasama resmi dengan peternak lokal Majalengka bersertifikasi kesehatan dinas.',
                    'Bebas biaya administrasi dan bebas biaya transfer antar kantor kas BPR.',
                    'Dijamin penuh oleh LPS.'
                ],
                'syarat' => [
                    'Fotokopi KTP pengurus (Ketua & Bendahara DKM/Komunitas).',
                    'Surat penunjukan kepengurusan DKM atau berita acara kelompok.',
                    'Setoran awal kelompok mulai Rp 100.000,-.'
                ],
                'cta_text' => 'Daftar Paket TAPA QUR',
                'cta_type' => 'whatsapp',
                'sort_order' => 5,
            ],
            [
                'slug' => 'tada-bur',
                'code' => 'TAB-06',
                'name' => 'TADABUR',
                'badge' => 'Ibadah Baitullah',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/tadabur.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Wujudkan niat suci beribadah ke Baitullah dengan tabungan umroh terencana dan terpercaya.',
                'short_desc' => 'Tabungan khusus persiapan keberangkatan ibadah umroh reguler bagi perorangan maupun keluarga dengan kepastian jadwal keberangkatan dan travel mitra berizin resmi Kemenag.',
                'ketentuan' => [
                    'Jangka waktu penempatan fleksibel 1 s/d 3 tahun sesuai paket umroh yang dipilih.',
                    'Bebas biaya administrasi bulanan dan suku bunga kompetitif.',
                    'Pilihan paket setoran bulanan tetap yang terjangkau dan terencana.',
                    'Kerjasama dengan biro perjalanan umroh resmi dan terakreditasi.',
                    'Dijamin aman oleh LPS.'
                ],
                'syarat' => [
                    'Fotokopi KTP/e-KTP dan Kartu Keluarga calon jamaah.',
                    'Fotokopi Paspor (apabila sudah memiliki).',
                    'Mengisi formulir pembukaan rekening TADABUR.',
                    'Setoran awal paket mulai Rp 500.000,-.'
                ],
                'cta_text' => 'Buka Tabungan TADABUR',
                'cta_type' => 'whatsapp',
                'sort_order' => 6,
            ],
            [
                'slug' => 't-asmara',
                'code' => 'TAB-07',
                'name' => 'T-ASMARA',
                'badge' => 'Arisan Warga',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2914.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Tabungan arisan masyarakat dengan kesempatan memperoleh tarikan dan doorprize menarik.',
                'short_desc' => 'Fasilitas tabungan arisan masyarakat Majalengka Raharja yang memadukan budaya arisan gotong royong dengan kepastian keamanan perbankan resmi BPR.',
                'ketentuan' => [
                    'Periode arisan terjadwal dengan penarikan berkala yang transparan.',
                    'Hadiah tarikan dan doorprize menarik pada setiap periode penarikan.',
                    'Bebas biaya administrasi pengelolaan rekening arisan.',
                    'Dana pokok tabungan tetap aman dan kembali utuh.',
                    'Dijamin sepenuhnya oleh LPS.'
                ],
                'syarat' => [
                    'Fotokopi KTP / e-KTP warga pemohon yang masih berlaku.',
                    'Mengisi formulir kepesertaan arisan T-ASMARA.',
                    'Setoran iuran arisan bulanan tetap sesuai kelompok paket yang dipilih.',
                    'Nomor kontak / WhatsApp aktif.'
                ],
                'cta_text' => 'Daftar Arisan T-ASMARA',
                'cta_type' => 'whatsapp',
                'sort_order' => 7,
            ],
            [
                'slug' => 'ciremaiku',
                'code' => 'TAB-08',
                'name' => 'CIREMAIKU',
                'badge' => 'Undian Akbar',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2922.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Tabungan bersama jaringan BPR Se-Ciayumajakuning dengan undian hadiah spektakuler.',
                'short_desc' => 'Tabungan bersama seluruh BPR di wilayah Cirebon, Indramayu, Majalengka, dan Kuningan dengan program undian berhadiah mobil, sepeda motor, dan aneka hadiah menarik setiap tahun.',
                'ketentuan' => [
                    'Setiap kelipatan saldo tertentu otomatis mendapatkan poin kupon undian resmi.',
                    'Penarikan undian diselenggarakan secara terbuka di hadapan notaris dan dinas sosial.',
                    'Suku bunga tabungan bersaing dan dihitung harian.',
                    'Dapat disetor dan ditarik di seluruh jaringan BPR anggota se-Ciayumajakuning.',
                    'Simpanan aman dan dijamin LPS.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon yang masih berlaku.',
                    'Mengisi form pembukaan rekening CIREMAIKU.',
                    'Setoran awal mulai Rp 50.000,-.'
                ],
                'cta_text' => 'Buka Tabungan CIREMAIKU',
                'cta_type' => 'whatsapp',
                'sort_order' => 8,
            ],
            [
                'slug' => 'simpel',
                'code' => 'TAB-09',
                'name' => 'SIMPEL',
                'badge' => 'Program Nasional',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2926.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Gerakan Indonesia Menabung resmi berstandar Otoritas Jasa Keuangan (OJK).',
                'short_desc' => 'Produk tabungan nasional inisiasi OJK khusus siswa PAUD s/d SMA dengan fitur serba sederhana, syarat mudah, dan bebas biaya admin bulanan.',
                'ketentuan' => [
                    'Bebas biaya administrasi bulanan.',
                    'Setoran awal hanya Rp 5.000,- dan setoran berikutnya mulai Rp 1.000,-.',
                    'Buku tabungan diterbitkan langsung atas nama siswa.',
                    'Dilindungi penuh oleh Lembaga Penjamin Simpanan (LPS).'
                ],
                'syarat' => [
                    'Fotokopi Kartu Pelajar / Surat Keterangan Sekolah.',
                    'Fotokopi Akta Kelahiran dan Kartu Keluarga.',
                    'Fotokopi KTP orang tua / wali.',
                    'Mengisi formulir pembukaan SimPel di loket atau saat mobil kas keliling ke sekolah.'
                ],
                'cta_text' => 'Buka Rekening SimPel',
                'cta_type' => 'whatsapp',
                'sort_order' => 9,
            ],
            [
                'slug' => 'simarmas-go',
                'code' => 'TAB-10',
                'name' => 'SIMARMAS GO',
                'badge' => 'Nasional PERBAMIDA',
                'category' => 'tabungan',
                'image' => 'assets/img/produk/IMG_2928.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Simpanan Simpan Mas gerakan BPR Se-Indonesia bersama PERBAMIDA.',
                'short_desc' => 'Tabungan unggulan asosiasi BPR PERBAMIDA nasional dengan berbagai kemudahan transaksi, suku bunga menarik, dan peluang mengikuti program undian nasional.',
                'ketentuan' => [
                    'Kemudahan transaksi setoran dan penarikan di jaringan mitra BPR.',
                    'Bunga dihitung berdasarkan saldo harian dengan tiering kompetitif.',
                    'Peluang mengikuti undian berkala skala nasional BPR sahabat anak negeri.',
                    'Bebas biaya pemeliharaan rekening bulanan.',
                    'Dijamin sepenuhnya oleh LPS hingga Rp 2 Miliar.'
                ],
                'syarat' => [
                    'Fotokopi KTP / e-KTP pemohon yang masih berlaku.',
                    'Mengisi formulir permohonan rekening SIMARMAS GO.',
                    'Setoran awal ringan mulai Rp 50.000,-.'
                ],
                'cta_text' => 'Buka SIMARMAS GO',
                'cta_type' => 'whatsapp',
                'sort_order' => 10,
            ],

            // ==================== DEPOSITO (2 ITEMS) ====================
            [
                'slug' => 'deposito-reguler',
                'code' => 'DEP-01',
                'name' => 'Deposito Berjangka Bank Majalengka',
                'badge' => 'Bunga Maksimal LPS',
                'category' => 'deposito',
                'image' => 'assets/img/produk/IMG_2928.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Investasi berjangka terpercaya dengan suku bunga kompetitif dijamin penuh LPS.',
                'short_desc' => 'Pilihan investasi berjangka yang aman dan memberikan imbal hasil maksimal bagi perorangan maupun korporasi, dengan fleksibilitas jangka waktu penempatan 1, 3, 6, dan 12 bulan.',
                'ketentuan' => [
                    'Pilihan jangka waktu penempatan: 1 Bulan, 3 Bulan, 6 Bulan, dan 12 Bulan.',
                    'Suku bunga penjaminan LPS sangat bersaing di atas rata-rata bunga deposito bank umum.',
                    'Fasilitas Automatic Roll Over (ARO) untuk perpanjangan pokok otomatis atau pokok + bunga.',
                    'Bunga dapat ditransfer otomatis setiap bulan ke rekening tabungan nasabah di bank mana pun.',
                    'Dapat dijadikan agunan pinjaman kredit dengan proses cepat jika mendadak butuh likuiditas.',
                    'Dijamin 100% oleh Lembaga Penjamin Simpanan (LPS) hingga Rp 2.000.000.000,-.'
                ],
                'syarat' => [
                    'Fotokopi KTP / SIM / Paspor yang masih berlaku (perorangan).',
                    'Legalitas pendirian, NIB, dan KTP Pengurus (khusus badan usaha/yayasan).',
                    'Memiliki rekening tabungan aktif di BPR Majalengka untuk penampungan bunga.',
                    'Penempatan nominal deposito awal minimal Rp 1.000.000,-.'
                ],
                'cta_text' => 'Simulasi Bunga Deposito',
                'cta_type' => 'whatsapp',
                'sort_order' => 11,
            ],
            [
                'slug' => 'deposito-suka-suka',
                'code' => 'DEP-02',
                'name' => 'Deposito Suka-Suka (Hadiah Langsung)',
                'badge' => 'Hadiah Tanpa Diundi',
                'category' => 'deposito',
                'image' => 'assets/img/produk/IMG_2928.jpeg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Simpan dana deposito hari ini, langsung bawa pulang hadiah impian tanpa diundi!',
                'short_desc' => 'Program deposito istimewa di mana nasabah langsung menentukan hadiah favoritnya di muka (Sepeda Motor, Smart TV, Lemari Es, Smartphone, hingga Emas Batangan Logam Mulia Antam) begitu dana ditempatkan.',
                'ketentuan' => [
                    'Hadiah langsung diserahkan di muka tanpa proses undian apa pun.',
                    'Pilihan tenor penempatan 6, 12, 18, atau 24 bulan sesuai tier hadiah yang dipilih.',
                    'Pokok deposito tetap utuh 100% dan dikembalikan penuh saat jatuh tempo.',
                    'Pilihan hadiah bergaransi resmi dari distributor terpercaya.',
                    'Dana tersimpan aman dan terdaftar pada program penjaminan simpanan LPS.'
                ],
                'syarat' => [
                    'Fotokopi KTP / e-KTP yang masih berlaku.',
                    'Menandatangani formulir keikutsertaan program Deposito Hadiah Langsung.',
                    'Menempatkan dana baru (fresh fund) sesuai ketentuan paket hadiah.',
                    'Komitmen dana mengendap hingga masa jatuh tempo berakhir.'
                ],
                'cta_text' => 'Katalog Hadiah Deposito',
                'cta_type' => 'whatsapp',
                'sort_order' => 12,
            ],

            // ==================== KREDIT (12 ITEMS) ====================
            [
                'slug' => 'kapesta',
                'code' => 'KRD-01',
                'name' => 'KAPESTA (Kredit Pegawai Swasta)',
                'badge' => 'Bunga Ringan',
                'category' => 'kredit',
                'image' => 'assets/img/produk/KAPESTA.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Fasilitas pinjaman multiguna cepat untuk karyawan swasta dan pekerja pabrik.',
                'short_desc' => 'Pinjaman kebutuhan keluarga atau modal sampingan bagi karyawan tetap maupun kontrak rekanan perusahaan swasta di Kabupaten Majalengka dan wilayah Ciayumajakuning.',
                'ketentuan' => [
                    'Plafon pinjaman mulai Rp 3.000.000,- hingga Rp 50.000.000,-.',
                    'Jangka waktu pinjaman (tenor) fleksibel mulai 12 hingga 36 bulan.',
                    'Skema angsuran tetap (flat) setiap bulan atau mekanisme potong gaji.',
                    'Proses verifikasi dan persetujuan cepat (1 - 3 hari kerja).',
                    'Dilindungi oleh asuransi jiwa kredit.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon dan suami/istri.',
                    'Fotokopi Kartu Keluarga dan Surat Nikah.',
                    'Slip gaji asli 3 bulan terakhir atau surat keterangan penghasilan dari bendahara/HRD.',
                    'Surat rekomendasi / surat keterangan bekerja dari pimpinan perusahaan.',
                    'Agunan fleksibel (BPKB motor/mobil atau SHM/AJB).'
                ],
                'cta_text' => 'Ajukan KAPESTA Sekarang',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 13,
            ],
            [
                'slug' => 'kan',
                'code' => 'KRD-02',
                'name' => 'KAN (Kredit Aparatur Negara)',
                'badge' => 'Plafon Tinggi',
                'category' => 'kredit',
                'image' => 'assets/img/produk/KAN.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Pembiayaan khusus PNS dan Pegawai Pemerintah di Kabupaten Majalengka.',
                'short_desc' => 'Solusi pembiayaan konsumtif serbaguna bagi ASN, pejabat fungsional daerah, dan PPPK dengan plafon tinggi dan suku bunga preferensial paling ringan.',
                'ketentuan' => [
                    'Plafon pinjaman hingga Rp 250.000.000,- sesuai kemampuan angsuran gaji.',
                    'Tenor sangat panjang hingga 10 s/d 15 tahun (menyesuaikan batas usia pensiun).',
                    'Suku bunga khusus ASN dengan proses persetujuan express 1 hari kerja cair.',
                    'Pembayaran angsuran terintegrasi potong gaji langsung dari bendahara dinas.',
                    'Perlindungan asuransi jiwa kredit penuh.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon dan pasangan.',
                    'Fotokopi Kartu Keluarga.',
                    'SK Pengangkatan CPNS & SK PNS/PPPK terakhir (asli disimpan sebagai agunan utama).',
                    'Kartu Pegawai (Karpeg) & Taspen.',
                    'Daftar rincian gaji terakhir yang ditandatangani bendahara pengeluaran.'
                ],
                'cta_text' => 'Ajukan KAN Sekarang',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 14,
            ],
            [
                'slug' => 'kredit-konstruksi',
                'code' => 'KRD-03',
                'name' => 'Kredit Pembiayaan Konstruksi & Proyek',
                'badge' => 'Rekanan Pengadaan',
                'category' => 'kredit',
                'image' => 'assets/img/produk/multiguna.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Dukungan modal kerja kontraktor pengerjaan proyek infrastruktur daerah.',
                'short_desc' => 'Fasilitas pinjaman modal kerja bagi kontraktor, pengembang rekanan APBD Majalengka / APBN untuk kelancaran pembelian material dan upah tenaga kerja proyek.',
                'ketentuan' => [
                    'Plafon pembiayaan hingga 70% dari nilai Surat Perintah Kerja (SPK) / Kontrak.',
                    'Pola pengembalian menyesuaikan termin pencairan termin fisik proyek (turnkey).',
                    'Pilihan agunan tambahan tanah/bangunan atau jaminan piutang proyek.',
                    'Pendampingan analisa teknis lapangan oleh analis perbankan berpengalaman.'
                ],
                'syarat' => [
                    'Legalitas badan usaha (Akta Pendirian PT/CV, NIB, SIUJK, NPWP Perusahaan).',
                    'Salinan SPK / Kontrak Kerja Asli yang masih berlaku dari instansi pemberi kerja.',
                    'Rekening koran perusahaan 6 bulan terakhir.',
                    'Dokumen agunan tambahan berupa SHM/SHGB.'
                ],
                'cta_text' => 'Konsultasi Kredit Proyek',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 15,
            ],
            [
                'slug' => 'kredit-pensiunan',
                'code' => 'KRD-04',
                'name' => 'Kredit Pensiunan Sejahtera',
                'badge' => 'Masa Purna Tenang',
                'category' => 'kredit',
                'image' => 'assets/img/produk/pensiunan.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Bakti penghormatan bagi purnabakti untuk membuka usaha dan kebutuhan keluarga.',
                'short_desc' => 'Fasilitas pinjaman bagi para pensiunan PNS, TNI, POLRI, dan BUMN untuk memenuhi renovasi hunian, hajatan anak, maupun modal usaha produktif di masa tua.',
                'ketentuan' => [
                    'Plafon pinjaman hingga Rp 100.000.000,-.',
                    'Batas usia saat kredit lunas mencapai 75 tahun.',
                    'Suku bunga ringan dan angsuran terpotong otomatis dari uang pensiun bulanan.',
                    'Wajib dilindungi asuransi jiwa purnabakti sehingga tidak membebani ahli waris.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon dan pasangan.',
                    'SK Pensiun asli (Karip / SKEP).',
                    'Buku tabungan gaji pensiun Taspen / Asabri.',
                    'Surat Keterangan Kematian pasangan (apabila pensiun janda/duda).'
                ],
                'cta_text' => 'Ajukan Kredit Pensiunan',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 16,
            ],
            [
                'slug' => 'kredit-modal-kerja',
                'code' => 'KRD-05',
                'name' => 'Kredit Modal Kerja (KMK)',
                'badge' => 'Solusi Arus Kas',
                'category' => 'kredit',
                'image' => 'assets/img/produk/multiguna.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Perkuat persediaan barang dagang dan percepat perputaran omzet usaha Anda.',
                'short_desc' => 'Pinjaman modal usaha untuk pedagang toko grosir, distributor sembako, pemilik bengkel, dan industri olahan di seluruh penjuru Majalengka.',
                'ketentuan' => [
                    'Plafon pinjaman mulai Rp 10.000.000,- s/d Rp 500.000.000,-.',
                    'Tenor pinjaman mulai 12 bulan hingga 60 bulan (5 tahun).',
                    'Pilihan skema angsuran pokok dan bunga flat atau bunga menurun (efektif).',
                    'Agunan sertifikat tanah (SHM/SHGB) atau BPKB kendaraan niaga.'
                ],
                'syarat' => [
                    'Fotokopi KTP suami/istri dan Kartu Keluarga.',
                    'Surat Keterangan Usaha (SKU) dari Kantor Desa/Kelurahan atau NIB.',
                    'Usaha telah berjalan aktif minimal 1 tahun.',
                    'Dokumen bukti kepemilikan agunan asli.'
                ],
                'cta_text' => 'Ajukan Modal Kerja',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 17,
            ],
            [
                'slug' => 'kredit-pertanian',
                'code' => 'KRD-06',
                'name' => 'Kredit Pertanian & Musiman',
                'badge' => 'Bayar Pasca Panen',
                'category' => 'kredit',
                'image' => 'assets/img/produk/KAN.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Mitra setia petani Majalengka: modal tanam mudah, bayar saat panen raya.',
                'short_desc' => 'Pembiayaan khusus petani padi, budidaya bawang merah, cabai, dan palawija dengan skema pembayaran fleksibel Yarnen (Bayar Setelah Panen) tanpa beban angsuran bulanan.',
                'ketentuan' => [
                    'Pola pelunasan berjangka 3, 4, atau 6 bulan sesuai masa panen komoditas.',
                    'Plafon pinjaman dihitung berdasarkan estimasi luas lahan tanam dan kebutuhan bibit/pupuk.',
                    'Suku bunga terjangkau untuk menunjang ketahanan pangan daerah Majalengka.'
                ],
                'syarat' => [
                    'Fotokopi KTP dan Kartu Keluarga petani pemohon.',
                    'Surat keterangan penggarap / kepemilikan lahan sawah/kebun.',
                    'Rekomendasi dari Ketua Kelompok Tani (Poktan) setempat.',
                    'Agunan sertifikat tanah darat/sawah atau BPKB.'
                ],
                'cta_text' => 'Ajukan Kredit Pertanian',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 18,
            ],
            [
                'slug' => 'kredit-talangan',
                'code' => 'KRD-07',
                'name' => 'Kredit Talangan (Bridging Fund)',
                'badge' => 'Pencairan Kilat',
                'category' => 'kredit',
                'image' => 'assets/img/produk/multiguna.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Solusi dana tunai cepat untuk kebutuhan mendesak dan bridging pembayaran bisnis.',
                'short_desc' => 'Pinjaman jangka pendek berkecepatan tinggi bagi nasabah yang membutuhkan dana talangan segera sebelum dana pelunasan utama masuk.',
                'ketentuan' => [
                    'Jangka waktu penempatan singkat 1 s/d 6 bulan.',
                    'Proses analisa dan persetujuan kilat dalam 24 jam kerja.',
                    'Pelunasan sewaktu-waktu tanpa penalti berlebih apabila dana pelunasan telah tersedia.'
                ],
                'syarat' => [
                    'Fotokopi KTP dan Kartu Keluarga.',
                    'Bukti sumber pengembalian pasti (invoice, SPK, sertifikat deposito, dll).',
                    'Dokumen jaminan likuid atau aset tanah/kendaraan.'
                ],
                'cta_text' => 'Konsultasi Dana Talangan',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 19,
            ],
            [
                'slug' => 'kredit-kios',
                'code' => 'KRD-08',
                'name' => 'Kredit Pemilikan Kios & Los Pasar',
                'badge' => 'Pedagang Pasar',
                'category' => 'kredit',
                'image' => 'assets/img/warung-sembako.jpg',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Miliki kios dan tempat dasaran usaha mandiri di pasar-pasar Kabupaten Majalengka.',
                'short_desc' => 'Pembiayaan pembelian hak guna pakai, renovasi, atau sewa jangka panjang kios dan los di pasar Kadipaten, Jatiwangi, Majalengka Kota, Talaga, dan Cikijing.',
                'ketentuan' => [
                    'Plafon hingga 80% dari harga kios/los pasar.',
                    'Tenor pinjaman panjang hingga 5 tahun agar angsuran harian/bulanan ringan bagi pedagang.',
                    'Petugas pickup service siap menjemput angsuran langsung di lapak pedagang setiap hari.'
                ],
                'syarat' => [
                    'KTP pemohon dan Kartu Keluarga.',
                    'Surat Izin Pemakaian Tempat Dasaran (SIPTD) / Bukti kepemilikan kios dari dinas pengelola pasar.',
                    'Usaha perdagangan di pasar telah aktif minimal 6 bulan.'
                ],
                'cta_text' => 'Ajukan Kredit Kios',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 20,
            ],
            [
                'slug' => 'kredit-perak',
                'code' => 'KRD-09',
                'name' => 'Kredit Raharja (PERAK - Peduli Usaha Mikro)',
                'badge' => 'Subsidi Bunga',
                'category' => 'kredit',
                'image' => 'assets/img/produk/perak.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Program BUMD Majalengka memberantas rentenir dan pinjaman online ilegal.',
                'short_desc' => 'Kredit mikro berbunga sangat rendah yang disubsidi untuk membantu pedagang keliling, pengrajin anyaman bambu, penjahit, dan pelaku usaha ultra mikro rumahan.',
                'ketentuan' => [
                    'Plafon pinjaman mulai Rp 1.000.000,- s/d Rp 10.000.000,-.',
                    'Bunga ultra-ringan tanpa potongan tersembunyi.',
                    'Syarat administrasi sangat mudah dan ramah pelaku usaha kecil.',
                    'Tenor 6 hingga 24 bulan.'
                ],
                'syarat' => [
                    'KTP warga domisili Kabupaten Majalengka.',
                    'Kartu Keluarga.',
                    'Foto usaha aktif di rumah / tempat jualan.',
                    'Surat keterangan domisili usaha dari RT/RW setempat.'
                ],
                'cta_text' => 'Ajukan Kredit PERAK',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 21,
            ],
            [
                'slug' => 'kredit-ksg',
                'code' => 'KRD-10',
                'name' => 'KSG (Kredit Sertifikasi Guru)',
                'badge' => 'Khusus Guru',
                'category' => 'kredit',
                'image' => 'assets/img/produk/KSG.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Kredit kesejahteraan guru bersertifikasi pendidik di seluruh Majalengka.',
                'short_desc' => 'Fasilitas pinjaman perorangan bagi para tenaga pendidik (Guru ASN & Swasta) penerima Tunjangan Profesi Guru (TPG) untuk kebutuhan keluarga terencana.',
                'ketentuan' => [
                    'Plafon pinjaman hingga Rp 100.000.000,-.',
                    'Pola angsuran dapat disesuaikan dengan jadwal pencairan tunjangan sertifikasi triwulan atau bulanan.',
                    'Bunga bersaing dengan proses persetujuan cepat.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon dan pasangan.',
                    'Fotokopi Sertifikat Pendidik (Sertifikasi Guru).',
                    'Rekening koran / buku tabungan penerima tunjangan profesi guru 6 bulan terakhir.',
                    'Surat rekomendasi dari Kepala Sekolah.'
                ],
                'cta_text' => 'Ajukan KSG Guru',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 22,
            ],
            [
                'slug' => 'kredit-non-asn',
                'code' => 'KRD-11',
                'name' => 'Kredit Non-ASN & Pegawai PPPK',
                'badge' => 'Pegawai Daerah',
                'category' => 'kredit',
                'image' => 'assets/img/produk/non asn.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Pinjaman resmi terpercaya bagi honorer, tenaga kontrak, dan PPPK daerah.',
                'short_desc' => 'Pembiayaan multiguna bagi Pegawai Pemerintah dengan Perjanjian Kerja (PPPK) dan tenaga honorer di OPD, Puskesmas, dan sekolah negeri di lingkungan Pemkab Majalengka.',
                'ketentuan' => [
                    'Plafon pinjaman proporsional disesuaikan dengan sisa masa kontrak kerja PPPK.',
                    'Angsuran tetap bulanan dipotong melalui koordinasi bendahara dinas.',
                    'Dilindungi asuransi jiwa kredit.'
                ],
                'syarat' => [
                    'Fotokopi KTP pemohon dan pasangan serta Kartu Keluarga.',
                    'Surat Keputusan (SK) Pengangkatan PPPK / Honorer asli yang masih berlaku.',
                    'Slip gaji terakhir yang ditandatangani bendahara.',
                    'Surat rekomendasi pimpinan instansi / dinas.'
                ],
                'cta_text' => 'Ajukan Kredit PPPK',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 23,
            ],
            [
                'slug' => 'kredit-multiguna',
                'code' => 'KRD-12',
                'name' => 'Kredit Multiguna Keluarga',
                'badge' => 'Kebutuhan Bebas',
                'category' => 'kredit',
                'image' => 'assets/img/produk/multiguna.png',
                'hero_image' => 'assets/img/hero-batik.jpg',
                'slogan' => 'Satu solusi keuangan terpercaya untuk aneka rencana penting keluarga Anda.',
                'short_desc' => 'Pinjaman multiguna beragunan untuk membiayai renovasi rumah impian, dana pendidikan perguruan tinggi anak, biaya pernikahan, hingga fasilitas kesehatan darurat.',
                'ketentuan' => [
                    'Plafon fleksibel mulai Rp 10.000.000,- hingga Rp 300.000.000,-.',
                    'Jangka waktu pinjaman hingga 5 tahun (60 bulan).',
                    'Agunan berupa sertifikat tanah (SHM/SHGB) atau BPKB kendaraan roda empat / roda dua.',
                    'Proses taksasi nilai agunan transparan dan profesional.'
                ],
                'syarat' => [
                    'Fotokopi KTP suami dan istri.',
                    'Fotokopi Kartu Keluarga dan Surat Nikah.',
                    'Bukti penghasilan tetap atau slip gaji / catatan usaha.',
                    'Sertifikat tanah asli atau BPKB kendaraan beserta STNK atas nama pribadi/keluarga.'
                ],
                'cta_text' => 'Ajukan Kredit Multiguna',
                'cta_type' => 'form_pengajuan',
                'sort_order' => 24,
            ],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }
    }
}
