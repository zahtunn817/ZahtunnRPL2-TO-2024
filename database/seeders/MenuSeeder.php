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
                'nama_menu' => 'Croissant',
                'harga' => '5000',
                'deskripsi' => 'Dibaca Quaso-',
                'jenis_id' => '1',
            ],
            [
                'nama_menu' => 'Nasi Goreng',
                'harga' => '15000',
                'deskripsi' => 'Nasi goreng dengan topping telor ceplok.',
                'jenis_id' => '2',
            ],
            [
                'nama_menu' => 'Soto ayam',
                'harga' => '9000',
                'deskripsi' => 'Soto kuah bening.',
                'jenis_id' => '3',
            ],
            [
                'nama_menu' => 'Soda gembira',
                'harga' => '6000',
                'deskripsi' => 'Soda susu + lemon',
                'jenis_id' => '4',
            ],
            [
                'nama_menu' => 'Milkshake coklat',
                'harga' => '8000',
                'deskripsi' => 'Susu kocok rasa coklat.',
                'jenis_id' => '5',
            ]
        ];
        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}
