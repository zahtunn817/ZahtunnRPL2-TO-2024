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
                'jumlah' => '0'
            ],
            [
                'jumlah' => '10'
            ],
            [
                'jumlah' => '20'
            ],
            [
                'jumlah' => '8'
            ],
            [
                'jumlah' => '13'
            ],
            [
                'jumlah' => '0'
            ],
            [
                'jumlah' => '10'
            ],
            [
                'jumlah' => '20'
            ],
            [
                'jumlah' => '8'
            ],
            [
                'jumlah' => '13'
            ],
            [
                'jumlah' => '0'
            ],
            [
                'jumlah' => '10'
            ],
            [
                'jumlah' => '20'
            ],
            [
                'jumlah' => '8'
            ],
            [
                'jumlah' => '13'
            ]
        ];
        foreach ($stok as $key => $value) {
            Stok::create($value);
        }
    }
}
