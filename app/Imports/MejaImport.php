<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row['kapasitas'] == 0) {
            $row['kapasitas'] = 0;
        } else {
            $row['kapasitas'];
        }
        return new Meja([
            'nomor_meja' => $row['nomor_meja'],
            'kapasitas' => $row['kapasitas'],
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
