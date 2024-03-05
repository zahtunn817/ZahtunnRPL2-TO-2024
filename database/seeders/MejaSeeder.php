<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meja = [
            [
                'nomor_meja' => 'Take away',
                'kapasitas' => '0',
                'status' => '0'
            ],
            [
                'nomor_meja' => 'Drivethru',
                'kapasitas' => '0',
                'status' => '0'
            ],
            [
                'nomor_meja' => 'M-01',
                'kapasitas' => '2',
                'status' => '1'
            ],
            [
                'nomor_meja' => 'M-02',
                'kapasitas' => '2',
                'status' => '0'
            ],
            [
                'nomor_meja' => 'M-03',
                'kapasitas' => '4',
                'status' => '1'
            ],
            [
                'nomor_meja' => 'M-04',
                'kapasitas' => '4',
                'status' => '0'
            ],
            [
                'nomor_meja' => 'M-05',
                'kapasitas' => '6',
                'status' => '1'
            ]
        ];
        foreach ($meja as $key => $value) {
            Meja::create($value);
        }
    }
}
