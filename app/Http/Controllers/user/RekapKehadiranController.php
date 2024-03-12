<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanMahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapKehadiranController extends Controller
{
    public function index()
    {
        $rekap = PerkuliahanMahasiswaModel::getAbsensiMhs(Auth::user()->id);
        return view('user.kehadiran.kehadiran_view', compact('rekap'));
    }
}
