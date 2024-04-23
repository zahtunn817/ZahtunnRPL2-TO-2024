<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TitipanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

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
    return view('pages.index', [
        'page' => 'page',
        'section' => 'Halaman kosong'
    ]);
});

Route::get('/login', [UserController::class, 'log'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/pdftest', [TitipanController::class, 'index']);

Route::get('about', [PageController::class, 'about']);
Route::get('contact', [PageController::class, 'contact']);
Route::post('kirim-pesan', [PageController::class, 'send'])->name('kirim-pesan');

Route::group(['middleware' => 'auth'], function () {

    Route::get('laporanTransaksi', [LaporanController::class, 'index']);
    Route::post('laporanTransaksi', [LaporanController::class, 'filter']);

    Route::resource('transaksi', TransaksiController::class);

    Route::resource('absensi', AbsensiController::class);
    Route::post('/update-waktu-keluar', [AbsensiController::class, 'updateWaktuKeluar'])->name('update.waktu.keluar');
    Route::get('export/absensi', [AbsensiController::class, 'exportData'])->name('export-absensi');
    Route::get('format/absensi', [AbsensiController::class, 'formatData'])->name('format-absensi');
    Route::post('import/absensi', [AbsensiController::class, 'importData'])->name('import-absensi');
    Route::get('cetakpdf/absensi', [AbsensiController::class, 'cetakpdf'])->name('cetakpdf-absensi');
    Route::get('laporanAbsensi', [AbsensiController::class, 'laporan']);
    Route::post('laporanAbsensi', [AbsensiController::class, 'filter']);
    Route::get('export/laporanAbsensi', [AbsensiController::class, 'exportDataLaporan'])->name('laporan-export-absensi');
    Route::get('cetakpdf/laporanAbsensi', [AbsensiController::class, 'laporanpdf'])->name('laporan-pdf-absensi');

    Route::resource('jenis', JenisController::class);
    Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
    Route::post('import/jenis', [JenisController::class, 'importData'])->name('import-jenis');
    Route::get('cetakpdf/jenis', [JenisController::class, 'cetakpdf'])->name('cetakpdf-jenis');

    Route::resource('kategori', KategoriController::class);
    Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
    Route::post('import/kategori', [KategoriController::class, 'importData'])->name('import-kategori');
    Route::get('cetakpdf/kategori', [KategoriController::class, 'cetakpdf'])->name('cetakpdf-kategori');

    Route::resource('menu', MenuController::class);
    Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
    Route::post('import/menu', [MenuController::class, 'importData'])->name('import-menu');
    Route::get('cetakpdf/menu', [MenuController::class, 'cetakpdf'])->name('cetakpdf-menu');

    Route::resource('meja', MejaController::class);
    Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
    Route::post('import/meja', [MejaController::class, 'importData'])->name('import-meja');
    Route::get('cetakpdf/meja', [MejaController::class, 'cetakpdf'])->name('cetakpdf-meja');

    Route::resource('stok', StokController::class);
    Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
    Route::post('import/stok', [StokController::class, 'importData'])->name('import-stok');
    Route::get('cetakpdf/stok', [StokController::class, 'cetakpdf'])->name('cetakpdf-stok');

    Route::resource('pelanggan', PelangganController::class);
    Route::resource('user', UserController::class);

    Route::resource('titipan', TitipanController::class);
    Route::get('export/titipan', [TitipanController::class, 'exportData'])->name('export-titipan');
    Route::post('import/titipan', [TitipanController::class, 'importData'])->name('import-titipan');
    Route::get('cetakpdf/titipan', [TitipanController::class, 'cetakpdf'])->name('cetakpdf-titipan');

    Route::group(['middleware' => ['cekUserLogin:kasir']], function () {
    });
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
    });
});
