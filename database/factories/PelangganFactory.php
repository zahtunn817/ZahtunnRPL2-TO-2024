<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pelanggan' => fake()->name('male' | 'female'),
            'email' => fake()->email(),
            'nomor_telepon' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
        ];
    }
}
