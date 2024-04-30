<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index', [
            'page' => 'Laporan Penjualan',
            'section' => 'Laporan'
        ]);
    }

    public function filter(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        $laporan = Transaksi::whereBetween('tanggal_transaksi', [$tgl_awal, $tgl_akhir])->get();

        return view('laporan.index', [
            'laporan' => $laporan,
            'page' => 'Laporan Penjualan',
            'section' => 'Laporan',
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ]);
    }

    public function cetakpdf(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        $laporan = Transaksi::whereBetween('tanggal_transaksi', [$tgl_awal, $tgl_akhir])->get();
        $date = date('Y-M-d');

        $pdf = PDF::loadView('laporan.pdf', compact('laporan', 'tgl_awal', 'tgl_akhir'));
        return $pdf->download($date . '-laporan.pdf');
    }
}
