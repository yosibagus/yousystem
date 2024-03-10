<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanKelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    { 
        $jadwal = PerkuliahanKelasModel::getJadwalPerkuliahan(Auth::user()->kelas_id);
        return view('user.jadwal.jadwal_view', compact('jadwal'));
    }
}
