<?php

namespace App\Http\Controllers;

use App\Models\Titipan;
use App\Http\Requests\StoreTitipanRequest;
use App\Http\Requests\UpdateTitipanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TitipanExport;
use App\Imports\TitipanImport;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;

class TitipanController extends Controller
{

    public function index()
    {
        try {
            $data['produk_titipan'] = Titipan::orderBy('created_at', 'DESC')->get();
            // return view('titipan.pdf', [
            return view('titipan.index', [
                'page' => 'titipan',
                'section' => 'Kelola data',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreTitipanRequest $request)
    {

        $hargaJual = $request->input('harga_jual');

        try {
            DB::beginTransaction();
            $data['nama_produk'] = $request->nama_produk;
            $data['nama_supplier'] = $request->nama_supplier;
            $data['harga_beli'] = $request->harga_beli;
            $data['stok'] = $request->stok;
            $data['keterangan'] = $request->keterangan;
            $data['harga_jual'] = $hargaJual;
            Titipan::create($data);
            DB::commit();
            return redirect('titipan')->with('success', 'Produk titipan berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreTitipanRequest $request, Titipan $titipan)
    {
        $hargaJual = $request->input('harga_jual');

        try {
            DB::beginTransaction();
            $data['nama_produk'] = $request->nama_produk;
            $data['nama_supplier'] = $request->nama_supplier;
            $data['harga_beli'] = $request->harga_beli;
            $data['stok'] = $request->stok;
            $data['keterangan'] = $request->keterangan;
            $data['harga_jual'] = $hargaJual;
            $titipan->update($data);
            DB::commit();
            return redirect('titipan')->with('success', 'Produk titipan berhasil diubah!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Titipan $titipan)
    {
        try {
            DB::beginTransaction();
            $titipan->delete();
            DB::commit();
            return redirect('titipan')->with('success', 'Produk titipan berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }

    public function show()
    {
    }

    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new TitipanExport, $date . '-titipan.xlsx');
    }

    public function importData()
    {
        Excel::import(new TitipanImport, request()->file('import'));
        return redirect('titipan')->with('success', 'Import data titipan produk berhasil!');
    }

    public function cetakpdf()
    {


        $produk_titipan = Titipan::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('titipan.pdf', compact('produk_titipan'));
        return $pdf->download($date . '-titipan.pdf');
    }
}
