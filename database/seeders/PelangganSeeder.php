<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggan = [
            [
                'nama_pelanggan' => 'Pelanggan umum',
                'email' => '-',
                'nomor_telepon' => '-',
                'alamat' => '-',
            ],
        ];
        foreach ($pelanggan as $key => $value) {
            Pelanggan::create($value);
        }
        Pelanggan::factory()->count(5)->create();
    }
}
