<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        $catalogByCode = [
            'KRD-01' => ['KREDIT PEGAWAI SWASTA (KAPESTA)', 'assets/img/produk/KAPESTA.png'],
            'KRD-02' => ['KREDIT APARATUR NEGARA (KAN)', 'assets/img/produk/KAN.png'],
            'KRD-03' => ['KREDIT PEMBIAYAAN KONSTRUKSI DAN PROYEK', 'assets/img/produk/ChatGPT Image 31 Jul 2026, 09.08.23.png'],
            'KRD-04' => ['KREDIT PENSIUNAN', 'assets/img/produk/pensiunan.png'],
            'KRD-05' => ['KREDIT MODAL KERJA', 'assets/img/produk/ChatGPT Image 24 Jul 2026, 11.48.02.png'],
            'KRD-06' => ['KREDIT PERTANIAN', 'assets/img/produk/ChatGPT Image 24 Jul 2026, 15.09.13.png'],
            'KRD-07' => ['KREDIT TALANGAN', 'assets/img/produk/ChatGPT Image 31 Jul 2026, 08.47.14.png'],
            'KRD-08' => ['KREDIT PEMILIKAN KIOS DAN LOS', 'assets/img/produk/ChatGPT Image 31 Jul 2026, 10.11.00.png'],
            'KRD-09' => ['KREDIT PERAK', 'assets/img/produk/perak.png'],
            'KRD-10' => ['KSG – KREDIT SERTIFIKASI GURU', 'assets/img/produk/KSG.png'],
            'KRD-11' => ['KREDIT NON ASN / PPPK', 'assets/img/produk/non asn.png'],
            'KRD-12' => ['KREDIT MULTIGUNA', 'assets/img/produk/multiguna.png'],
        ];

        foreach ($catalogByCode as $code => [$name, $image]) {
            DB::table('products')
                ->where('category', 'kredit')
                ->where('code', $code)
                ->update([
                    'name' => $name,
                    'image' => $image,
                ]);
        }
    }

    public function down(): void
    {
        // Keep the official catalog names and image assignments on rollback.
    }
};
