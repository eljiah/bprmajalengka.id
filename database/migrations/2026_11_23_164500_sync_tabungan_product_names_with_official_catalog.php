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

        $namesByCode = [
            'TAB-01' => 'TAHARA',
            'TAB-02' => 'TIARA',
            'TAB-03' => 'KOTAK MAS',
            'TAB-04' => 'SIDASI',
            'TAB-05' => 'TAPAQUR',
            'TAB-06' => 'TADABUR',
            'TAB-07' => 'T-ASMARA',
            'TAB-08' => 'CIREMAIKU',
            'TAB-09' => 'SIMPEL',
            'TAB-10' => 'SIMARMAS GO',
        ];

        foreach ($namesByCode as $code => $name) {
            DB::table('products')
                ->where('category', 'tabungan')
                ->where('code', $code)
                ->update(['name' => $name]);
        }
    }

    public function down(): void
    {
        // Keep the official catalog names when rolling back unrelated schema changes.
    }
};
