<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use App\Exports\AbsensiLaporanExport;
use App\Exports\AbsensiFormat;
use App\Imports\AbsensiImport;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['absensi'] = Absensi::orderBy('created_at', 'DESC')->get();
            return view('absensi.index', [
                'page' => 'absensi',
                'section' => 'Absensi',
            ],)->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreabsensiRequest $request)
    {
        try {
            DB::beginTransaction();
            Absensi::create($request->all());
            DB::commit();
            return redirect('absensi')->with('success', 'absensi berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreabsensiRequest $request, absensi $absensi)
    {
        try {
            DB::beginTransaction();
            $absensi->update($request->all());
            DB::commit();
            return redirect('absensi')->with('success', 'absensi berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function updateWaktuKeluar(Request $request)
    {
        dd($request->all());
        $absensiId = $request->input('id');

        // Cari data absensi berdasarkan ID
        $absensi = Absensi::find($absensiId);

        if (!$absensi) {
            return response()->json(['success' => false]);
        }

        // Update waktu_keluar ke waktu sekarang
        $absensi->waktuKeluar = now();
        $absensi->save();

        return response()->json(['success' => true]);
    }

    public function destroy(absensi $absensi)
    {
        try {
            DB::beginTransaction();
            $absensi->delete();
            DB::commit();
            return redirect('absensi')->with('success', 'absensi berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }

    public function exportDataLaporan()
    {
        $date = date('Y-M-d');
        return Excel::download(new AbsensiLaporanExport, $date . '-absensi.xlsx');
    }

    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new AbsensiExport, $date . '-absensi.xlsx');
    }

    public function formatData()
    {
        return Excel::download(new AbsensiFormat, 'format-absensi.xlsx');
    }

    public function importData()
    {
        Excel::import(new AbsensiImport, request()->file('import'));
        return redirect('absensi')->with('success', 'Import data absensi produk berhasil!');
    }

    public function cetakpdf()
    {
        $title = 'absensi';
        $absensi = Absensi::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('absensi.pdf', [
            'title' => $title,
        ], compact('absensi'));
        return $pdf->download($date . '-absensi.pdf');
    }

    public function laporan()
    {
        return view('absensi.laporan.index', [
            'page' => 'Laporan Absensi',
            'section' => 'Laporan'
        ]);
    }

    public function filter(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        $laporan = Absensi::whereBetween('tanggalMasuk', [$tgl_awal, $tgl_akhir])->get();

        session(['tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);

        return view('absensi.laporan.index', [
            'laporan' => $laporan,
            'page' => 'Laporan Absensi',
            'section' => 'Laporan'
        ]);
    }
    public function laporanpdf()
    {
        $request = app('request');
        $tgl_awal = $request->session()->get('tgl_awal', date('Y-m-d'));
        $tgl_akhir = $request->session()->get('tgl_akhir', date('Y-m-d'));

        $title = 'Absensi dari tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        $absensi = Absensi::whereBetween('tanggalMasuk', [$tgl_awal, $tgl_akhir])->get();

        $date = date('Ymd');
        $pdf = PDF::loadView('absensi.pdf', [
            'title' => $title,
        ], compact('absensi'));
        return $pdf->download($date . '-absensi.pdf');
    }
}
