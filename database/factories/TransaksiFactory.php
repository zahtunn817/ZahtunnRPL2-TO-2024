<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $notrans =  fake()->numberBetween(23, 24) . sprintf('%02d', fake()->numberBetween(1, 12)) . sprintf('%02d', fake()->numberBetween(1, 30)) . sprintf('%04d', fake()->numberBetween(1, 50));
        $tglTransaksi = date('y-m-d');
        $totalHarga = fake()->numberBetween(1, 100) . "000";
        $metodePembayaran = fake()->randomElement(['Tunai', 'Debit']);
        $pelangganId = fake()->randomElement(Pelanggan::select('id')->get());
        $userId = fake()->randomElement(User::select('id')->get());
        return [
            'id' => $notrans,
            'tanggal_transaksi' => $tglTransaksi,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $metodePembayaran,
            'pelanggan_id' => $pelangganId,
            'user_id' => $userId,
        ];
    }
}
