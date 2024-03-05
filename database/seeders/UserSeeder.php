<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'developer',
                'email' => 'zdev@email.com',
                'password' => 'masterkey',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-16',
                'nomor_telepon' => '0895372166600',
                'alamat' => 'Indonesia',
                'roles' => 'masterkey',
            ],
            [
                'nama' => 'admin',
                'email' => 'admin@email.com',
                'password' => '123',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-16',
                'nomor_telepon' => 'xxxx',
                'alamat' => 'Indonesia',
                'roles' => 'admin',
            ],
            [
                'nama' => 'kasir',
                'email' => 'kasir@email.com',
                'password' => '123',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-16',
                'nomor_telepon' => 'xxxx',
                'alamat' => 'Indonesia',
                'roles' => 'kasir',
            ],
            [
                'nama' => 'owner',
                'email' => 'owner@email.com',
                'password' => '123',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-16',
                'nomor_telepon' => 'xxxx',
                'alamat' => 'Indonesia',
                'roles' => 'owner',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
