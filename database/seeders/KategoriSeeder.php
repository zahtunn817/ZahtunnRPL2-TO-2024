<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Makanan'
            ],
            [
                'nama_kategori' => 'Minuman'
            ],
            [
                'nama_kategori' => 'Camilan'
            ]
        ];
        foreach ($kategori as $key => $value) {
            Kategori::create($value);
        }
    }
}
