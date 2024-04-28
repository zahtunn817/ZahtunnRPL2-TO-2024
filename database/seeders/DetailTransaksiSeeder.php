<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailTransaksi::factory()->count(200)->create();
        $transaksi = Transaksi::all();
        foreach ($transaksi as $t) {
            if ($t->detailTransaksi->isEmpty()) {
                $t->delete();
            }
        }
    }
}
