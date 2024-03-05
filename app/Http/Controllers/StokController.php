<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Menu;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

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
                ->join('menu', 'stok.menu_id', '=', 'menu.id')
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

    public function store(StoreStokRequest $request)
    {
        try {
            DB::beginTransaction();
            Stok::create($request->all());
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
}
