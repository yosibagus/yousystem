<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\PerkuliahanKelasModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PerkulihanKelasController extends Controller
{
    public function index()
    {
        $perkuliahan = PerkuliahanKelasModel::getAllPerkuliahan()->get();
        return view('admin.perkuliahan_kelas.kuliah_kelas', compact('perkuliahan'));
    }

    public function tambah()
    {
        $data = [
            'kelas' => KelasModel::all(),
            'matakuliah' => MatkulModel::all()
        ];
        return view('admin.perkuliahan_kelas.kuliah_kelas_tambah', $data);
    }

    public function tambah_action(Request $request)
    {
        $token = Str::random(12);
        $data = [
            'token_perkuliahan' => $token,
            'kelas_id' => $request->kelas_id,
            'matakuliah_id' => $request->matkul_id,
            'tgl_perkuliahan' => $request->tgl_perkuliahan,
            'max_keterlambatan' => $request->max_keterlambatan,
            'keterangan_perkuliahan' => $request->keterangan_perkuliahan,
            'materi_perkuliahan' => $request->materi_perkuliahan,
        ];

        PerkuliahanKelasModel::create($data);
        return redirect('perkuliahan_kelas')->with('success', 'Data Perkuliahan Berhasil Disimpan');
    }
}
