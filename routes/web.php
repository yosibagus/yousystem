<?php

use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MatkulController;
use App\Http\Controllers\admin\PerkulihanKelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\IzinController;
use App\Http\Controllers\user\JadwalController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\RekapKehadiranController;
use App\Http\Controllers\user\ScanKehadiranController;
use Illuminate\Support\Facades\Route;

use function League\Flysystem\get;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware(['auth', 'user_akses:1'])->group(function () {
    //user
    Route::get('/home', [DashboardController::class, 'index']);
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/profil', [ProfileController::class, 'index']);

    Route::get('/izin-perkuliahan', [IzinController::class, 'index']);
    Route::post('/izin-perkuliahan', [IzinController::class, 'tambah_action']);
    Route::get('/rekap-izin', [IzinController::class, 'izin']);

    Route::get('/rekap-kehadiran', [RekapKehadiranController::class, 'index']);

    Route::get('/scan/{id}', [ScanKehadiranController::class, 'index']);
    Route::post('/postscan', [ScanKehadiranController::class, 'scanpost']);
});

Route::middleware(['auth', 'user_akses:0'])->group(function () {
    //admin
    Route::get('/admin', [HomeController::class, 'index']);

    Route::get('/kelas', [KelasController::class, 'index']);
    Route::post('/kelas', [KelasController::class, 'tambah_action']);
    Route::get('/kelas/hapus/{id}', [KelasController::class, 'hapus']);
    Route::get('/import', [KelasController::class, 'import']);
    Route::post('/import_ac', [KelasController::class, 'import_action']);

    Route::get('/matkul', [MatkulController::class, 'index']);
    Route::get('/akun', [AkunController::class, 'index']);

    Route::get('/asisten', [AkunController::class, 'asisten']);
    Route::post('/asisten', [AkunController::class, 'asisten_action']);

    Route::get('/perkuliahan_kelas', [PerkulihanKelasController::class, 'index']);
    Route::get('/kuliah_kelas_tambah', [PerkulihanKelasController::class, 'tambah']);
    Route::post('/kuliah_kelas_tambah', [PerkulihanKelasController::class, 'tambah_action']);
    Route::get('/dperkuliahan', [PerkulihanKelasController::class, 'detail_perkuliahan']);
    Route::get('/kehadiran', [PerkulihanKelasController::class, 'detail_kehadiran']);
    Route::get('/get_data_absen', [PerkulihanKelasController::class, 'data_absensi']);
    Route::get('/get_data_detail', [PerkulihanKelasController::class, 'get_detail_kuliah']);
});
