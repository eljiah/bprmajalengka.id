<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::whereIn('name', [
            'Kantor Kas Kadipaten',
            'Kantor Kas Jatiwangi',
            'Kantor Kas Talaga',
            'Kantor Kas Cikijing',
            'Kantor Kas Rajagaluh',
            'Kantor Kas Leuwimunding',
            'Kantor Kas Sukahaji',
            'Kantor Kas Maja',
            'Kantor Kas Kertajati',
            'Kantor Kas Ligung',
            'Kantor Kas Sumberjaya',
        ])->update(['is_active' => false]);

        $branches = [
            [
                'name' => 'Kantor Pusat Operasional',
                'type' => 'Pusat',
                'address' => 'Jl. Raya K.H. Abdul Halim No. 338, Majalengka Wetan, Kec. Majalengka, Jawa Barat 45411',
                'phone' => '(0233) 281144',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Kantor Cabang Kadipaten',
                'type' => 'Cabang',
                'address' => 'Jl. Raya Kadipaten No. 45, Kec. Kadipaten (Dekat Pasar Kadipaten)',
                'phone' => '(0233) 282510',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 2,
            ],
            [
                'name' => 'Kantor Cabang Jatitujuh',
                'type' => 'Cabang',
                'address' => 'Jl. Raya Utara No.113 Jatitujuh',
                'phone' => '(0233) 8888211',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 3,
            ],
            [
                'name' => 'Kantor Cabang Cikijing',
                'type' => 'Cabang',
                'address' => 'Jl. Raya Kasturi No. 15, Kec. Cikijing (Pusat Konveksi Celana Jeans)',
                'phone' => '(0233) 891340',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Kantor Cabang Rajagaluh',
                'type' => 'Cabang',
                'address' => 'Jl. Pangeran Muhamad No. 34, Kec. Rajagaluh (Sentra Anyaman Bambu)',
                'phone' => '(0233) 511450',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Kantor Cabang Bantarujeg',
                'type' => 'Cabang',
                'address' => 'Jl. Siliwangi No.91 Bantarujeg',
                'phone' => '(0233) 8316346',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 6,
            ],
            [
                'name' => 'Kantor Cabang Sukahaji',
                'type' => 'Cabang',
                'address' => 'Jl. Raya Sukahaji No. 10, Cikalong, Kec. Sukahaji',
                'phone' => '(0233) 882190',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 7,
            ],
            [
                'name' => 'Kantor Cabang Kertajati',
                'type' => 'Cabang',
                'address' => 'Jl. Kertajati-Kadipaten Km 3, Kec. Kertajati (Kawasan Bandara Internasional Kertajati)',
                'phone' => '(0233) 883100',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 8,
            ],
            [
                'name' => 'Kantor Cabang Ligung',
                'type' => 'Cabang',
                'address' => 'Jl. Raya Ligung No. 78, Kec. Ligung (Sentra Industri Pabrik)',
                'phone' => '(0233) 884520',
                'whatsapp' => '0811-1111-6526',
                'hours' => 'Senin - Jumat: 08:00 - 15:30 WIB',
                'is_main' => false,
                'sort_order' => 9,
            ],
        ];

        foreach ($branches as $branch) {
            $branch['is_active'] = true;
            Branch::updateOrCreate(
                ['name' => $branch['name']],
                $branch
            );
        }
    }
}
