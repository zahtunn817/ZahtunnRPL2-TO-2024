<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['transaksi'] = Transaksi::get();
            return view('Transaksi.histori', [
                'page' => 'transaksi',
                'section' => 'Transaksi',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function transaksi()
    {
        try {
            $data['menu'] = Menu::get();
            $data['pelanggan'] = Pelanggan::get();
            return view('Transaksi.index', [
                'page' => 'transaksi',
                'section' => 'Transaksi',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreTransaksiRequest $request)
    {
        try {
            DB::beginTransaction();

            // Membuat transaksi baru
            $last_id = Transaksi::where('tanggal_transaksi', date('y-m-d'))
                ->orderBy('created_at', 'desc')
                ->select('id')
                ->first();

            $notrans = $last_id !== null ? date('ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1) : date('ymd') . '0001';

            $inserttransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal_transaksi' => date('y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => $request->metode_pembayaran,
                'keterangan' => '',
                'pelanggan_id' => $request->pelanggan_id,
                'user_id' => auth()->id(),
            ]);

            if (!$inserttransaksi->exists) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => 'Gagal membuat transaksi']);
            }

            foreach ($request->orderedList as $detail) {
                $menu = Menu::find($detail['id']);
                if (!$menu) {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => 'Menu tidak ditemukan']);
                }

                // Pastikan stok cukup untuk memenuhi pesanan
                if ($menu->stok->jumlah < $detail['qty']) {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => 'Stok tidak mencukupi untuk menu: ' . $menu->nama_menu]);
                }

                // Kurangi stok menu
                $menu->stok->decrement('jumlah', $detail['qty']);

                // Simpan detail transaksi
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $inserttransaksi->id,
                    'menu_id' => $detail['id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Transaksi berhasil',
                'notrans' => $inserttransaksi->id,
            ]);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => $e->getMessage()]);
        }
    }




    public function faktur($nofaktur)
    {
        try {
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();
            // dd($nofaktur);
            return view('transaksi.nota')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => $e->getMessage()]);
        }
    }


    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        try {
            $data['keterangan'] = $request->keterangan;

            $transaksi->update($data);
            DB::commit();
            return redirect('transaksi')->with('success', 'Keterangan berhasil diubah!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
