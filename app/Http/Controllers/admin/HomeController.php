<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\PerkuliahanIzinModel;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'kelas' => KelasModel::count(),
            'matkul' => MatkulModel::count(),
            'akun' => User::count(),
            'asprak' => User::where('asprak', 1)->count(),
            'kelas_kuliah' => PerkuliahanKelasModel::count(),
            'izin' => PerkuliahanIzinModel::count(),
            'kelas_mhs' => PerkuliahanMahasiswaModel::count(),
            'hadir' => PerkuliahanMahasiswaModel::where('status_kehadiran', 1)->count(),
            'tidakhadir' => PerkuliahanMahasiswaModel::where('status_kehadiran', 0)->count(),
        ];
        return view('admin.home', $data);
    }
}
