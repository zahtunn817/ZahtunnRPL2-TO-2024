<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stok = [
            [
                'jumlah' => '10',
                'menu_id' => '1'
            ],
            [
                'jumlah' => '20',
                'menu_id' => '2'
            ],
            [
                'jumlah' => '50',
                'menu_id' => '3'
            ]
        ];
        foreach ($stok as $key => $value) {
            Stok::create($value);
        }
    }
}
