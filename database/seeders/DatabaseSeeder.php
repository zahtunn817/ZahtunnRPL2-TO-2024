<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KategoriSeeder::class);
        $this->call(JenisSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MejaSeeder::class);
        $this->call(StokSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(UserSeeder::class);
    }
}
