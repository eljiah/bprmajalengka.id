<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('branches', 'maps_url')) {
            Schema::table('branches', function (Blueprint $table) {
                $table->string('maps_url', 2048)->nullable()->after('address');
            });
        }

        DB::table('branches')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->orderBy('id')
            ->get(['id', 'latitude', 'longitude'])
            ->each(function (object $branch): void {
                DB::table('branches')
                    ->where('id', $branch->id)
                    ->update(['maps_url' => 'https://www.google.com/maps?q=' . (string) $branch->latitude . ',' . (string) $branch->longitude]);
            });
    }

    public function down(): void
    {
        if (Schema::hasColumn('branches', 'maps_url')) {
            Schema::table('branches', function (Blueprint $table) {
                $table->dropColumn('maps_url');
            });
        }
    }
};
