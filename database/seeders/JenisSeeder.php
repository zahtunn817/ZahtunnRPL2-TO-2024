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
                'nama_jenis' => 'Appetizer'
            ],
            [
                'nama_jenis' => 'Main Course'
            ],
            [
                'nama_jenis' => 'Dessert'
            ]
        ];
        foreach ($jenis as $key => $value) {
            Jenis::create($value);
        }
    }
}
