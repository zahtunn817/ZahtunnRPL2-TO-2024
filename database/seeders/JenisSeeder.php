<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'nama_jenis' => 'Makanan'
            ],
            [
                'nama_jenis' => 'Minuman'
            ],
            [
                'nama_jenis' => 'Camilan'
            ]
        ];
        foreach ($jenis as $key => $value) {
            Jenis::create($value);
        }
    }
}
