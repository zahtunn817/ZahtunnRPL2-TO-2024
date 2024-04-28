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
                'nama' => 'admin',
                'email' => 'zahratunn817@gmail.com',
                'password' => 'kurotsuki',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-08',
                'nomor_telepon' => '0895372166600',
                'alamat' => '-',
                'roles' => 'masterkey',
            ],
            [
                'nama' => 'Zahratunnisa',
                'email' => 'zahra@gmail.com',
                'password' => 'password',
                'jk' => 'P',
                'tgl_lahir' => '2007-01-08',
                'nomor_telepon' => '0895372166600',
                'alamat' => 'Desa Jambudipa Kec. Warungkondang',
                'roles' => 'admin',
            ],
            [
                'nama' => 'Atsuhiro Rei',
                'email' => 'atrurei@gmail.com',
                'password' => 'password',
                'jk' => 'L',
                'tgl_lahir' => '2007-01-06',
                'nomor_telepon' => '0895372166600',
                'alamat' => 'Jl. Melati Jakarta Timur',
                'roles' => 'kasir',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
