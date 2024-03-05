<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Jenis;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Exception;
use PDOException;

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
            $data['menu'] = DB::table('menu')
                ->join('jenis', 'menu.jenis_id', '=', 'jenis.id')
                ->join('kategori', 'menu.kategori_id', '=', 'kategori.id')
                ->select('menu.*', 'jenis.nama_jenis', 'jenis.id as idJenis', 'kategori.id as idKategori', 'kategori.nama_kategori')->orderBy('created_at', 'DESC')->get();
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
        try {
            DB::beginTransaction();
            if ($request->has('image')) {
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
            Menu::create($data);
            DB::commit();
            return redirect('menu')->with('success', 'Menu berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreMenuRequest $request, Menu $menu)
    {
        try {
            DB::beginTransaction();
            if ($request->has('image')) {
                if ($request->old_image) {
                    Storage::disk('public')->delete('pictures-menu/'.$request->old_image);
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
            if($menu->image){
                Storage::disk('public')->delete('pictures-menu/'.$menu->image);
            }
            $menu->delete();
            DB::commit();
            return redirect('menu')->with('success', 'Menu berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
}
