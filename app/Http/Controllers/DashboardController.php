<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        $pelanggan = Pelanggan::get();
        $data['count_pelanggan'] = $pelanggan->count();

        $transaksi = Transaksi::get();
        $data['count_transaksi'] = $transaksi->count();

        $data['pendapatan'] = $transaksi->sum('total_harga');

        $today = Carbon::today();

        $data['pendapatan_today'] = DB::table('transaksi')
            ->whereDate('tanggal_transaksi', $today)
            ->sum('total_harga');


        $data['count_transaksi_today'] = DB::table('transaksi')
            ->whereDate('tanggal_transaksi', $today)
            ->count();

        $data['pelanggan'] = Pelanggan::limit(10)->orderBy('created_at', 'desc')->get();

        return view('pages.dashboard', ['page' => 'dashboard', 'section' => 'Dashboard'])->with($data);
    }
}
