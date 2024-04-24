<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('Pelanggan.index', [
                'page' => 'pelanggan',
                'section' => 'Kelola data',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StorePelangganRequest $request)
    {
        try {
            DB::beginTransaction();
            Pelanggan::create($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StorePelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->update($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success', 'Pelanggan berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success', 'Pelanggan berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new PelangganExport, $date . '-pelanggan.xlsx');
    }

    public function importData()
    {
        Excel::import(new PelangganImport, request()->file('import'));
        return redirect('pelanggan')->with('success', 'Import data pelanggan produk berhasil!');
    }

    public function cetakpdf()
    {


        $pelanggan = Pelanggan::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pelanggan.pdf', compact('pelanggan'));
        return $pdf->download($date . '-pelanggan.pdf');
    }
}
