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
                'deskripsi' => 'Kue sabit empuk manis.',
                'jenis_id' => '1',
                'stok_id' => '1',
            ],
            [
                'nama_menu' => 'Eclair',
                'harga' => '3000',
                'deskripsi' => 'Kue adonan sus yang dipanggang berlapis coklat.',
                'jenis_id' => '1',
                'stok_id' => '2',
            ],
            [
                'nama_menu' => 'Danish pastry',
                'harga' => '7000',
                'deskripsi' => 'Pastry lezat dengan aneka cita rasa',
                'jenis_id' => '1',
                'stok_id' => '3',
            ],
            [
                'nama_menu' => 'Egg Benedict',
                'harga' => '8000',
                'deskripsi' => 'Roti bakar + telur yang gurih.',
                'jenis_id' => '2',
                'stok_id' => '4',
            ],
            [
                'nama_menu' => 'Pancakes',
                'harga' => '9000',
                'deskripsi' => 'Sarapan empuk dengan topping madu.',
                'jenis_id' => '2',
                'stok_id' => '5',
            ],
            [
                'nama_menu' => 'Waffles',
                'harga' => '9000',
                'deskripsi' => 'Wafel enak bertopping madu manis',
                'jenis_id' => '2',
                'stok_id' => '6',
            ],
            [
                'nama_menu' => 'Chocolate cake',
                'harga' => '12000',
                'deskripsi' => 'Kue empuk dengan coklat yang lumer.',
                'jenis_id' => '3',
                'stok_id' => '7',
            ],
            [
                'nama_menu' => 'Cheesecake',
                'harga' => '11000',
                'deskripsi' => 'Kue soft dengan rasa keju yang manis',
                'jenis_id' => '3',
                'stok_id' => '8',
            ],
            [
                'nama_menu' => 'Tiramisu',
                'harga' => '15000',
                'deskripsi' => 'Lapisan-lapisan keju mascarpone yang lembut dengn kopi sebagai penutup.',
                'jenis_id' => '3',
                'stok_id' => '9',
            ],
            [
                'nama_menu' => 'Milk coffee',
                'harga' => '4000',
                'deskripsi' => 'Kopi manis pembuka harimu.',
                'jenis_id' => '4',
                'stok_id' => '10',
            ],
            [
                'nama_menu' => 'Lemon tea',
                'harga' => '5000',
                'deskripsi' => 'Teh dengan manis dan asam yang pas.',
                'jenis_id' => '4',
                'stok_id' => '11',
            ],
            [
                'nama_menu' => 'Milkshake',
                'harga' => '8000',
                'deskripsi' => 'Susu kocok segar aneka rasa',
                'jenis_id' => '4',
                'stok_id' => '12',
            ],
            [
                'nama_menu' => 'Oatmeal with Fresh Fruit',
                'harga' => '10000',
                'deskripsi' => 'Bubur lembut ditemani buah segar.',
                'jenis_id' => '5',
                'stok_id' => '13',
            ],
            [
                'nama_menu' => 'Yogurt parfait',
                'harga' => '9000',
                'deskripsi' => 'Yogurt manis dengan granola renyah dan buah segar.',
                'jenis_id' => '5',
                'stok_id' => '14',
            ],
            [
                'nama_menu' => 'Sandwich',
                'harga' => '8000',
                'deskripsi' => 'Roti lapis gurih bergizi.',
                'jenis_id' => '5',
                'stok_id' => '15',
            ]
        ];
        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}
