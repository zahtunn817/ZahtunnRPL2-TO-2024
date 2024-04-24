<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama_pelanggan' => $row['nama'],
            'email' => $row['email'],
            'nomor_telepon' => $row['no_telepon'],
            'alamat' => $row['alamat']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
