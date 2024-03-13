<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MatkulModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = MatkulModel::all();
        return view('admin.matkul.matkul_view', compact('matkul'));
    }

    public function tambah_action(Request $request)
    {
        $data = [
            'nama_matakuliah' => $request->nama_matakuliah
        ];

        MatkulModel::create($data);
        return redirect('/matkul')->with('success', 'Matakuliah Berhasil Ditambahkan');
    }

    public function edit_action(Request $request, $id)
    {
        $data = [
            'nama_matakuliah' => $request->nama_matakuliah
        ];

        MatkulModel::where('id_matkul', $id)->update($data);
        return redirect('/matkul')->with('success', 'Matakuliah Berhasil Diperbaharui');
    }

    public function hapus($id)
    { 
        MatkulModel::where('id_matkul', $id)->delete();
        return redirect('/matkul')->with('error', 'Matakuliah Berhasil Dihapus');
    }
}
