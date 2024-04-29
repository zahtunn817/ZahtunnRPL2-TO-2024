<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            [
                'nama_jenis' => 'Pastry',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Brunch',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Desserts',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Beverage',
                'kategori_id' => '2'
            ],
            [
                'nama_jenis' => 'Breakfast',
                'kategori_id' => '1'
            ]
        ];
        foreach ($jenis as $key => $value) {
            Jenis::create($value);
        }
    }
}
