<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
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
        // try {
        //     DB::beginTransaction();
        Absensi::create($request->all());
        // DB::commit();
        return redirect('absensi')->with('success', 'absensi berhasil ditambahkan!');
        // } catch (QueryException | Exception | PDOException $error) {
        //     DB::rollBack();
        //     $this->failResponse($error->getMessage(), $error->getCode());
        // }
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
}
