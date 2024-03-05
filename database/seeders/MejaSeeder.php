<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meja = [
            [
                'nomor_meja' => 'Take away/Drivethru',
                'kapasitas' => '0'
            ],
            [
                'nomor_meja' => 'M-01',
                'kapasitas' => '4'
            ],
            [
                'nomor_meja' => 'M-02',
                'kapasitas' => '4'
            ],
            [
                'nomor_meja' => 'M-03',
                'kapasitas' => '4'
            ]
        ];
        foreach ($meja as $key => $value) {
            Meja::create($value);
        }
    }
}
