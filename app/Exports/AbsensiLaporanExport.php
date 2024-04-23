<?php

namespace App\Exports;

use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Sheet;

class AbsensiLaporanExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $tgl_awal = session('tgl_awal', date('Y-m-d'));
        $tgl_akhir = session('tgl_akhir', date('Y-m-d'));

        return Absensi::whereBetween('tanggalMasuk', [$tgl_awal, $tgl_akhir])->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama karyawan',
            'Tanggal masuk',
            'Waktu masuk',
            'Status',
            'Waktu keluar',
            'Tanggal input',
            'Tanggal update',
        ];
    }

    public function registerEvents(): array
    {
        $request = app('request');
        $tgl_awal = $request->session()->get('tgl_awal', date('Y-m-d'));
        $tgl_akhir = $request->session()->get('tgl_akhir', date('Y-m-d'));

        return [
            AfterSheet::class => function (AfterSheet $event) use ($tgl_awal, $tgl_akhir) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->setCellValue('A1', 'Data Absensi dari tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir);

                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A3:H' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
            }

        ];
    }
}
