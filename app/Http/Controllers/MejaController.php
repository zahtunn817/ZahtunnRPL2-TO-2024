<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;
use App\Imports\MejaImport;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['meja'] = Meja::orderBy('created_at', 'DESC')->get();
            return view('Meja.index', [
                'page' => 'meja',
                'section' => 'Kelola data',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreMejaRequest $request)
    {
        try {
            DB::beginTransaction();
            Meja::create($request->all());
            DB::commit();
            return redirect('meja')->with('success', 'Meja berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreMejaRequest $request, Meja $meja)
    {
        try {
            DB::beginTransaction();
            $meja->update($request->all());
            DB::commit();
            return redirect('meja')->with('success', 'Meja berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Meja $meja)
    {
        try {
            DB::beginTransaction();
            $meja->delete();
            DB::commit();
            return redirect('meja')->with('success', 'Meja berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }

    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new MejaExport, $date . '-meja.xlsx');
    }

    public function importData()
    {
        Excel::import(new MejaImport, request()->file('import'));
        return redirect('meja')->with('success', 'Import data meja produk berhasil!');
    }

    public function cetakpdf()
    {


        $meja = Meja::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('meja.pdf', compact('meja'));
        return $pdf->download($date . '-meja.pdf');
    }
}
