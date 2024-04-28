<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Jenis;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use App\Models\Stok;
use Exception;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['menu'] = Menu::orderBy('created_at', 'DESC')->get();
            $kategori = Kategori::get();
            $jenis = Jenis::get();
            return view('Menu.index', [
                'page' => 'menu',
                'section' => 'Kelola data',
            ], compact('kategori', 'jenis'))->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreMenuRequest $request)
    {
        // try {
        DB::beginTransaction();
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'pictures-menu/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));
            $data['image'] = $filename;
        }
        $stok = Stok::create(['jumlah' => 0]);
        $data['nama_menu'] = $request->nama_menu;
        $data['deskripsi'] = $request->deskripsi;
        $data['jenis_id'] = $request->jenis_id;
        $data['kategori_id'] = $request->kategori_id;
        $data['harga'] = $request->harga;
        $data['stok_id'] = $stok->id;

        Menu::create($data);
        DB::commit();
        return redirect('menu')->with('success', 'Menu berhasil ditambahkan!');
        // } catch (QueryException | Exception | PDOException $error) {
        //     DB::rollBack();
        //     $this->failResponse($error->getMessage(), $error->getCode());
        // }
    }

    public function update(StoreMenuRequest $request, Menu $menu)
    {
        try {
            DB::beginTransaction();
            if ($request->has('image')) {
                if ($request->old_image) {
                    Storage::disk('public')->delete('pictures-menu/' . $request->old_image);
                }
                $image = $request->file('image');
                $filename = date('Y-m-d') . '-' . $image->getClientOriginalName();
                $path = 'pictures-menu/' . $filename;
                Storage::disk('public')->put($path, file_get_contents($image));
                $data['image'] = $filename;
            }
            $data['nama_menu'] = $request->nama_menu;
            $data['deskripsi'] = $request->deskripsi;
            $data['jenis_id'] = $request->jenis_id;
            $data['kategori_id'] = $request->kategori_id;
            $data['harga'] = $request->harga;

            $menu->update($data);
            DB::commit();
            return redirect('menu')->with('success', 'Menu berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            DB::beginTransaction();
            if ($menu->image) {
                Storage::disk('public')->delete('pictures-menu/' . $menu->image);
            }
            $idStok = $menu->stok_id;
            $stok = Stok::find($idStok);

            $menu->delete();
            if ($stok) {
                $stok->delete();
            }
            DB::commit();
            return redirect('menu')->with('success', 'Menu berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }

    public function exportData()
    {
        $date = date('Y-M-d');
        return Excel::download(new MenuExport, $date . '-menu.xlsx');
    }

    public function importData()
    {
        Excel::import(new MenuImport, request()->file('import'));
        return redirect('menu')->with('success', 'Import data Menu produk berhasil!');
    }

    public function cetakpdf()
    {


        $menu = Menu::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('menu.pdf', compact('menu'));
        return $pdf->download($date . '-menu.pdf');
    }
}
