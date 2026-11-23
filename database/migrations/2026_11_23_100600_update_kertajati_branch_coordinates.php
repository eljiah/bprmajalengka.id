<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('branches')
            ->where('name', 'Kantor Cabang Kertajati')
            ->orWhere('name', 'Kantor Kas Kertajati')
            ->update([
                'latitude' => '-6.677310235565713',
                'longitude' => '108.1890547352578',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('branches')
            ->where('name', 'Kantor Cabang Kertajati')
            ->orWhere('name', 'Kantor Kas Kertajati')
            ->update([
                'latitude' => '-6.677302143150963',
                'longitude' => '108.18905769385799',
            ]);
    }
};
