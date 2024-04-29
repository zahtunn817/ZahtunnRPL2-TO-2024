<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $today = Carbon::today();
        $menu = Menu::get();
        $stok = Stok::get();
        $pelanggan = Pelanggan::get();
        $transaksi = Transaksi::get();
        $detailtransaksi = DetailTransaksi::get();

        if ($request->has('tgl_awal') && $request->has('tgl_awal')) {
            $date['tgl_awal'] = $tgl_awal;
            $date['tgl_akhir'] = $tgl_akhir;

            $data['pendapatan'] = DB::table('transaksi')
                ->whereBetween('tanggal_transaksi', [$tgl_awal, $tgl_akhir])
                ->sum('total_harga');

            $data['count_transaksi'] = DB::table('transaksi')
                ->whereBetween('tanggal_transaksi', [$tgl_awal, $tgl_akhir])
                ->count();

            $data['menu_teratas'] = DetailTransaksi::with('menu')
                ->whereHas('transaksi', function ($query) use ($tgl_awal, $tgl_akhir) {
                    $query->whereBetween('tanggal_transaksi', [$tgl_awal, $tgl_akhir]);
                })
                ->select('menu_id', DB::raw('COUNT(*) as total_terjual'))
                ->groupBy('menu_id')
                ->orderBy('total_terjual', 'desc')
                ->limit(5)
                ->get();
        } else {
            $date = $today;

            $data['pendapatan'] = DB::table('transaksi')
                ->whereDate('tanggal_transaksi', $today)
                ->sum('total_harga');

            $data['count_transaksi'] = DB::table('transaksi')
                ->whereDate('tanggal_transaksi', $today)
                ->count();

            $data['menu_teratas'] = DetailTransaksi::with('menu')
                ->whereHas('transaksi', function ($query) use ($today) {
                    $query->whereDate('tanggal_transaksi', $today);
                })
                ->select('menu_id', DB::raw('COUNT(*) as total_terjual'))
                ->groupBy('menu_id')
                ->orderBy('total_terjual', 'desc')
                ->limit(5)
                ->get();
        };

        // dd($data);

        $data['latest_transaksi'] = Transaksi::with('pelanggan')->orderBy('tanggal_transaksi', 'desc')->limit(3)->get();
        $data['count_pelanggan'] = $pelanggan->count();
        $data['pelanggan'] = Pelanggan::limit(10)->orderBy('created_at', 'desc')->get();
        $data['lowest_stok'] = Stok::with('menu')
            ->join('menu', 'menu.stok_id', '=', 'stok.id')
            ->orderBy('stok.jumlah', 'asc')
            ->limit(3)
            ->get();
        return view('pages.dashboard', ['page' => 'dashboard', 'section' => 'Dashboard'], compact('date'))->with($data);
    }
}
