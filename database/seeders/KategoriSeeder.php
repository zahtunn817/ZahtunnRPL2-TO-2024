<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama_kategori' => 'Appetizer'
            ],
            [
                'nama_kategori' => 'Main course'
            ],
            [
                'nama_kategori' => 'Dessert'
            ]
        ];
        foreach ($kategori as $key => $value) {
            Kategori::create($value);
        }
    }
}
