<?php

namespace App\Http\Controllers;

use App\Models\Titipan;
use App\Http\Requests\StoreTitipanRequest;
use App\Http\Requests\UpdateTitipanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

class TitipanController extends Controller
{

    public function index()
    {
        try {
            $data['produk_titipan'] = Titipan::orderBy('created_at', 'DESC')->get();
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
        //
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
}
