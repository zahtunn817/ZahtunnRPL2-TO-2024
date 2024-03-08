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
            // $data['transaksi'] = Transaksi::orderBy('created_at', 'DESC')->get();
            $data['menu'] = Menu::get();
            $data['pelanggan'] = Pelanggan::get();
            return view('Transaksi.index', [
                'page' => 'transaksi',
                'section' => 'Order',
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreTransaksiRequest $request)
    {
        try {
            DB::beginTransaction();
            $last_id = Transaksi::where('tanggal', date('y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();

            $notrans = $last_id !== null ? date('ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1) : date('ymd') . '0001';


            $inserttransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => 'Transaksi berhasil',
                'id_pelanggan' => Pelanggan::orderBy('created_at', 'asc')->first()->id
            ]);



            if (!$inserttransaksi) return 'error';

            foreach ($request->orderedList as $detail) {
                $insertdetail_transaksi = DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Transaksi berhasil',
                'notrans' => $notrans,
            ]);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Transaksi gagal', 'error' => $e->getMessage()]);
        }
    }


    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
