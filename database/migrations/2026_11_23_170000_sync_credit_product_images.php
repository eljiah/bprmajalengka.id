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

        $imagesByCode = [
            'KRD-03' => 'assets/img/produk/ChatGPT Image 24 Jul 2026, 15.09.13.png',
            'KRD-05' => 'assets/img/produk/ChatGPT Image 24 Jul 2026, 11.48.02.png',
            'KRD-06' => 'assets/img/produk/ChatGPT Image 31 Jul 2026, 08.47.14.png',
            'KRD-07' => 'assets/img/produk/ChatGPT Image 31 Jul 2026, 09.08.23.png',
            'KRD-08' => 'assets/img/produk/ChatGPT Image 31 Jul 2026, 10.11.00.png',
        ];

        foreach ($imagesByCode as $code => $image) {
            DB::table('products')
                ->where('category', 'kredit')
                ->where('code', $code)
                ->update(['image' => $image]);
        }
    }

    public function down(): void
    {
        // Keep the corrected product images when rolling back unrelated schema changes.
    }
};
