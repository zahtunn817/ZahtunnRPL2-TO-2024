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
        $tglTransaksi = '2023-' . fake()->numberBetween(1, 12) . '-' . fake()->numberBetween(1, 30);
        $totalHarga = fake()->numberBetween(1, 100) . "000";
        $metodePembayaran = fake()->randomElement(['Tunai', 'Debit']);
        $pelangganId = fake()->randomElement(Pelanggan::select('id')->get());
        $userId = fake()->randomElement(User::select('id')->get());
        return [
            'tanggal_transaksi' => $tglTransaksi,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $metodePembayaran,
            'pelanggan_id' => $pelangganId,
            'user_id' => $userId,
        ];
    }
}
