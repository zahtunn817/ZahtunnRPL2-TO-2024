<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['kategori'] = Kategori::get();
            return view('pages.kategori.index', [
                'page' => 'Kategori',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreKategoriRequest $request)
    {
        try {
            DB::beginTransaction();
            Kategori::create($request->all());
            DB::commit();
            return redirect('kategori')->with('success', 'Kategori berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreKategoriRequest $request, Kategori $kategori)
    {
        try {
            DB::beginTransaction();
            $kategori->update($request->all());
            DB::commit();
            return redirect('kategori')->with('success', 'Kategori berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Kategori $kategori)
    {
        try {
            DB::beginTransaction();
            $kategori->delete();
            DB::commit();
            return redirect('kategori')->with('success', 'Kategori berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
}
