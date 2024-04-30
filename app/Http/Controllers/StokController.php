<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Menu;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use App\Imports\StokImport;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['stok'] = DB::table('stok')
                ->join('menu', 'menu.stok_id', '=', 'stok.id')
                ->select('stok.*', 'menu.nama_menu',)->orderBy('created_at', 'DESC')->get();
            $menu = Menu::get();
            return view('Stok.index', [
                'page' => 'stok',
                'section' => 'Kelola data',
            ], compact('menu'))->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function add(StoreStokRequest $request, Stok $stok)
    {
        try {
            DB::beginTransaction();

            $stok->jumlah += $request->jumlah;
            $stok->update(['jumlah' => $stok->jumlah]);


            DB::commit();
            return redirect('stok')->with('success', 'Stok berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreStokRequest $request, Stok $stok)
    {
        try {
            DB::beginTransaction();
            $stok->update($request->all());
            DB::commit();
            return redirect('stok')->with('success', 'Stok berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Stok $stok)
    {
        try {
            DB::beginTransaction();
            $stok->delete();
            DB::commit();
            return redirect('stok')->with('success', 'Stok berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new StokExport, $date . '-stok.xlsx');
    }

    public function importData()
    {
        Excel::import(new StokImport, request()->file('import'));
        return redirect('stok')->with('success', 'Import data stok produk berhasil!');
    }

    public function cetakpdf()
    {


        $stok = Stok::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('stok.pdf', compact('stok'));
        return $pdf->download($date . '-stok.pdf');
    }
}
