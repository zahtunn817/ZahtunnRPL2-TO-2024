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
                'jumlah' => '10'
            ],
            [
                'jumlah' => '20'
            ],
            [
                'jumlah' => '50'
            ],
            [
                'jumlah' => '50'
            ],
            [
                'jumlah' => '50'
            ]
        ];
        foreach ($stok as $key => $value) {
            Stok::create($value);
        }
    }
}
