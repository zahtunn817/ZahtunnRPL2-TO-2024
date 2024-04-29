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
    public function index()
    {

        $menu = Menu::get();
        $stok = Stok::get();
        $pelanggan = Pelanggan::get();
        $transaksi = Transaksi::get();
        $detailtransaksi = DetailTransaksi::get();
        $today = Carbon::today();



        $data['count_menu'] = $menu->count();

        $data['menu_teratas'] = DetailTransaksi::with('menu')
            ->select('menu_id', DB::raw('COUNT(*) as total_terjual'))
            ->groupBy('menu_id')
            ->orderBy('total_terjual', 'desc')
            ->limit(5)->get();

        $data['count_pelanggan'] = $pelanggan->count();

        $data['count_transaksi'] = $transaksi->count();

        $data['pendapatan'] = $transaksi->sum('total_harga');

        $data['pendapatan_today'] = DB::table('transaksi')
            ->whereDate('tanggal_transaksi', $today)
            ->sum('total_harga');

        $data['count_transaksi_today'] = DB::table('transaksi')
            ->whereDate('tanggal_transaksi', $today)
            ->count();

        $data['latest_transaksi'] = Transaksi::with('pelanggan')->orderBy('tanggal_transaksi', 'desc')->limit(3)->get();

        $data['pelanggan'] = Pelanggan::limit(10)->orderBy('created_at', 'desc')->get();

        $data['lowest_stok'] = Stok::with('menu')
            ->join('menu', 'menu.stok_id', '=', 'stok.id')
            ->orderBy('stok.jumlah', 'asc')
            ->limit(3)
            ->get();

        return view('pages.dashboard', ['page' => 'dashboard', 'section' => 'Dashboard'])->with($data);
    }
}
