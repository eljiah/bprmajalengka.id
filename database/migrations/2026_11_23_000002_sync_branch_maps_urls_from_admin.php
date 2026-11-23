<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('branches') || !Schema::hasColumn('branches', 'maps_url')) {
            return;
        }

        $branchMaps = [
            'Kantor Cabang Kadipaten' => 'https://maps.app.goo.gl/m1WY5x3bvt2rf74Z7',
            'Kantor Cabang Jatitujuh' => 'https://www.google.com/maps?q=-6.6439472368882635,108.2294895625247',
            'Kantor Cabang Cikijing' => 'https://maps.app.goo.gl/65yBz4rkPUPPYpBc9',
            'Kantor Cabang Rajagaluh' => 'https://maps.app.goo.gl/dzKqbWBpxUZiqkR37',
            'Kantor Cabang Sukahaji' => 'https://maps.app.goo.gl/FUDyUFCGK9qBppsJ7',
            'Kantor Cabang Bantarujeg' => 'https://maps.app.goo.gl/cRU3vjddyqW6uQx38',
            'Kantor Cabang Kertajati' => 'https://maps.app.goo.gl/oDvA7PDcnVTPNZWi7',
            'Kantor Cabang Ligung' => 'https://maps.app.goo.gl/vezobnU4cMSMgH7L6',
        ];

        foreach ($branchMaps as $name => $url) {
            DB::table('branches')
                ->where('name', $name)
                ->update(['maps_url' => $url]);
        }
    }

    public function down(): void
    {
        // Safe no-op
    }
};
