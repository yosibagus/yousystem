<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanIzinModel;
use App\Models\PerkuliahanKelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function index()
    {
        $perkuliahan = PerkuliahanKelasModel::getDataIzinMatkul(Auth::user()->kelas_id)->get();
        return view('user.izin.izin', compact('perkuliahan'));
    }

    public function tambah_action(Request $request)
    {
        $tok = uniqid();
        $file = $request->file('file_izin');
        $keterangan = $request->keterangan_izin;
        $token_perkuliahan = $request->token_perkuliahan;

        $file_name = $tok . '.' . $file->getClientOriginalExtension();

        $data = [
            'token_perkuliahan' => $token_perkuliahan,
            'mahasiswa_id' => Auth::user()->id,
            'keterangan_izin' => $keterangan,
            'file_izin' => $file_name,
            'status_izin' => 1,
            'tgl_izin' => date('Y-m-d H:i:s')
        ];

        $file->move('izin', $file_name);
        PerkuliahanIzinModel::create($data);
        return redirect('/rekap-izin')->with('success', 'Permohonan Izin Dikirim');
    }

    public function izin()
    {
        $izin = PerkuliahanIzinModel::getIzinMahasiswa(Auth::user()->id);
        return view('user.izin.izin_rekap', compact('izin'));
    }
}
