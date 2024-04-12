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
                'nama_jenis' => 'Roti',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Nasi',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Soup',
                'kategori_id' => '1'
            ],
            [
                'nama_jenis' => 'Soft drink',
                'kategori_id' => '2'
            ],
            [
                'nama_jenis' => 'Susu',
                'kategori_id' => '2'
            ]
        ];
        foreach ($jenis as $key => $value) {
            Jenis::create($value);
        }
    }
}
