<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TitipanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('about', [PageController::class, 'about']);
Route::resource('jenis', JenisController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('menu', MenuController::class);
Route::resource('titipan', TitipanController::class);
Route::resource('meja', MejaController::class);
Route::resource('stok', StokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

Route::resource('transaksi', TransaksiController::class);
