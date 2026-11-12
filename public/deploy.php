<?php
/**
 * Standalone Web Deployment & Maintenance Runner for CyberPanel / Shared Hosting
 * Akses: https://bprmajalengka.id/deploy.php?key=bpr2026
 */

$secretKey = 'bpr2026';
if (($_GET['key'] ?? '') !== $secretKey) {
    http_response_code(403);
    die('Akses ditolak. Gunakan URL: ?key=bpr2026');
}

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap Console Kernel agar Facades, Config, dan Providers aktif penuh
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

echo "<pre style='background:#0f172a; color:#f8fafc; padding:24px; font-family:monospace; border-radius:12px; line-height:1.6; font-size:13px;'>";
echo "========================================================\n";
echo "🚀 WEB DEPLOYMENT & MAINTENANCE RUNNER - BPR MAJALENGKA\n";
echo "========================================================\n\n";

// 1. Coba Git Pull jika didukung oleh server
if (function_exists('shell_exec')) {
    echo "--- [1/4] GIT PULL DARI REPOSITORI GITHUB ---\n";
    $appDir = dirname(__DIR__);
    chdir($appDir);
    $gitOutput = shell_exec('git pull origin main 2>&1');
    echo htmlspecialchars($gitOutput ?: "Tidak ada output dari perintah git.\n");
} else {
    echo "--- [1/4] GIT PULL: shell_exec dinonaktifkan di server (dilewati) ---\n";
}

// 2. Clear Cache Laravel
echo "\n--- [2/4] MEMBERSIHKAN CACHE APLIKASI (OPTIMIZE:CLEAR) ---\n";
try {
    Artisan::call('optimize:clear');
    echo htmlspecialchars(Artisan::output());
} catch (\Throwable $e) {
    echo "Peringatan saat optimize:clear: " . $e->getMessage() . "\n";
}

// 3. Rebuild Config & View Cache
echo "\n--- [3/5] MEMBANGUN CACHE BARU ---\n";
try {
    Artisan::call('config:cache');
    echo htmlspecialchars(Artisan::output());
    Artisan::call('view:cache');
    echo htmlspecialchars(Artisan::output());
} catch (\Throwable $e) {
    echo "Peringatan saat cache: " . $e->getMessage() . "\n";
}

// 4. Migrasi Database Baru secara Aman (Tanpa Menghapus Data Lama)
if (isset($_GET['migrate']) || !empty($_GET['run_migrate'])) {
    echo "\n--- [4/5] MENJALANKAN MIGRASI DATABASE (MIGRATE --FORCE) ---\n";
    try {
        Artisan::call('migrate', ['--force' => true]);
        $migrateOutput = Artisan::output();
        echo htmlspecialchars($migrateOutput ?: "Database sudah yang terbaru (Nothing to migrate).\n");
    } catch (\Throwable $e) {
        echo "Peringatan saat migrasi database: " . $e->getMessage() . "\n";
    }
} else {
    echo "\n--- [4/5] MIGRASI DATABASE: Tambahkan &migrate=1 pada URL untuk mengeksekusi migrasi tabel/field baru ---\n";
}

// Tampilkan Konfigurasi Mail yang Terbaca oleh Laravel
echo "\n--- INFORMASI SMTP YANG SEDANG AKTIF ---\n";
echo "Default Mailer : " . Config::get('mail.default') . "\n";
echo "SMTP Host      : " . Config::get('mail.mailers.smtp.host') . "\n";
echo "SMTP Port      : " . Config::get('mail.mailers.smtp.port') . "\n";
echo "SMTP Scheme    : " . (Config::get('mail.mailers.smtp.scheme') ?: '(default)') . "\n";
echo "SMTP Username  : " . Config::get('mail.mailers.smtp.username') . "\n";
echo "From Address   : " . Config::get('mail.from.address') . "\n";
echo "From Name      : " . Config::get('mail.from.name') . "\n";

// 5. Test Pengiriman Email SMTP
$testEmail = $_GET['test_email'] ?? 'kamelianisaaa@gmail.com';
echo "\n--- [5/5] MENGUJI KONEKSI & PENGIRIMAN EMAIL SMTP KE: {$testEmail} ---\n";
try {
    Mail::raw(
        "Halo!\n\nIni adalah email uji coba dari sistem Website Resmi Perumda BPR Majalengka via Web Deployer.\nJika Anda menerima email ini, konfigurasi SMTP Gmail di server hosting CyberPanel telah aktif dan berfungsi normal!\n\nSalam,\nTim IT Bank Majalengka",
        function ($message) use ($testEmail) {
            $message->to($testEmail)
                ->subject('[TEST SMTP LIVE] Uji Coba Konfigurasi Email - Perumda BPR Majalengka');
        }
    );
    echo "✅ BERHASIL! Email uji coba berhasil dikirimkan ke {$testEmail}!\nSilakan cek Inbox atau folder Spam Anda sekarang.\n";
} catch (\Throwable $e) {
    echo "❌ GAGAL! Terjadi kesalahan koneksi SMTP:\n" . htmlspecialchars($e->getMessage()) . "\n";
}

echo "\n========================================================\n";
echo "✅ PROSES SELESAI!\n";
echo "========================================================\n";
echo "</pre>";
