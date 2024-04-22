<?php

namespace App\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Jenis([
            'nama_jenis' => $row['jenis'],
            'kategori_id' => $row['kategori'],
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
