<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

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
            $data['meja'] = Meja::get();
            return view('pages.meja.index', [
                'page' => 'Meja',
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
}
