<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            [
                'nama_menu' => 'Basreng',
                'harga' => '5000',
                'deskripsi' => 'Baso goreng dengan saos.',
                'jenis_id' => '1',
                'kategori_id' => '3'
            ],
            [
                'nama_menu' => 'Nasi Goreng',
                'harga' => '15000',
                'deskripsi' => 'Nasi goreng dengan topping telor ceplok.',
                'jenis_id' => '2',
                'kategori_id' => '1'
            ],
            [
                'nama_menu' => 'Milkshake Coklat',
                'harga' => '9000',
                'deskripsi' => 'Susu kocok segar rasa coklat.',
                'jenis_id' => '3',
                'kategori_id' => '2'
            ]
        ];
        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}
