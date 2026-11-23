<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->string('latitude', 32)->nullable()->change();
            $table->string('longitude', 32)->nullable()->change();
        });

        $coordinates = [
            'Kantor Cabang Kadipaten' => ['-6.7632246516128065', '108.1682402947551'],
            'Kantor Cabang Jatitujuh' => ['-6.6439472368882635', '108.2294895625247'],
            'Kantor Cabang Cikijing' => ['-7.016916098244055', '108.36454874491558'],
            'Kantor Cabang Rajagaluh' => ['-6.779398593568954', '108.3447027455341'],
            'Kantor Cabang Bantarujeg' => ['-6.968736619525069', '108.23936331773582'],
            'Kantor Cabang Sukahaji' => ['-6.8190775141653255', '108.2807762434407'],
            'Kantor Cabang Kertajati' => ['-6.677310235565713', '108.1890547352578'],
            'Kantor Cabang Ligung' => ['-6.652526614832701', '108.28211492563509'],
        ];

        foreach ($coordinates as $name => [$latitude, $longitude]) {
            DB::table('branches')
                ->where('name', $name)
                ->update(['latitude' => $latitude, 'longitude' => $longitude]);
        }
    }

    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->decimal('latitude', 10, 7)->nullable()->change();
            $table->decimal('longitude', 10, 7)->nullable()->change();
        });
    }
};
