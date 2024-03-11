<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $perkuliahan = PerkuliahanKelasModel::getPerkulihanHariIni(Auth::user()->kelas_id);
        if ($perkuliahan->count() > 0) {
            $perkuliahan = $perkuliahan->get();
        } else {
            $perkuliahan = '';
        }

        $scan = PerkuliahanMahasiswaModel::where('mahasiswa_id', Auth::user()->id)->count();
        $tidakhadir = PerkuliahanMahasiswaModel::countHadir(0, Auth::user()->id)->count();
        $hadir = PerkuliahanMahasiswaModel::countHadir(1, Auth::user()->id)->count();
        $prosentase = $scan == 0 ? 0 : ($hadir / $scan) * 100;
        $ucapan = $this->ucapan();

        return view('user.dashboard', compact('perkuliahan', 'scan', 'hadir', 'tidakhadir', 'ucapan', 'prosentase'));
    }

    private function ucapan()
    {
        $waktu_sekarang = date('H:i');

        // Inisialisasi pesan selamat
        $pesan_selamat = '';

        // Menentukan waktu dan pesan selamat
        if ($waktu_sekarang >= '05:00' && $waktu_sekarang < '12:00') {
            $pesan_selamat = 'Selamat Pagi';
        } elseif ($waktu_sekarang >= '12:00' && $waktu_sekarang < '18:00') {
            $pesan_selamat = 'Selamat Siang';
        } elseif ($waktu_sekarang >= '18:00' && $waktu_sekarang < '24:00') {
            $pesan_selamat = 'Selamat Sore';
        } else {
            $pesan_selamat = 'Selamat Malam';
        }
        return $pesan_selamat;
    }
}
