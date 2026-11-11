<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('mail:test {to : Alamat email penerima pengujian}', function (string $to) {
    $this->info("Menguji koneksi SMTP dan pengiriman email ke: {$to}...");
    try {
        Mail::raw(
            "Halo!\n\nIni adalah email uji coba dari sistem Website Resmi Perumda BPR Majalengka.\nJika Anda menerima email ini, konfigurasi SMTP production aplikasi Anda telah berhasil terhubung dan berfungsi normal.\n\nSalam,\nTim IT Bank Majalengka",
            function ($message) use ($to) {
                $message->to($to)
                    ->subject('[TEST SMTP] Uji Coba Konfigurasi Email - Perumda BPR Majalengka');
            }
        );
        $this->info("BERHASIL! Email uji coba berhasil dikirimkan ke {$to}.");
    } catch (\Throwable $e) {
        $this->error("GAGAL! Terjadi kesalahan saat pengiriman email: " . $e->getMessage());
    }
})->purpose('Uji coba koneksi SMTP pengiriman email di environment production');
