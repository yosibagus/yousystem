<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportUsers;
use App\Models\KelasModel;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = KelasModel::all();
        return view('admin.kelas.kelas_view', compact('kelas'));
    }

    public function import()
    {
        $id = $_GET['id'];

        $data = [
            'kelas' => KelasModel::where('id_kelas', $id)->first(),
            'mhs' => User::where('kelas_id', $id)->count(),
            'nonaktif' => User::where([['kelas_id', '=', $id], ['status_akun', 0]])->count(),
            'aktif' => User::where([['kelas_id', '=', $id], ['status_akun', 1]])->count(),
            'mahasiswa' => User::where('kelas_id', $id)->get()
        ];
        return view('admin.kelas.kelas_import', $data);
    }

    public function import_action(Request $request)
    {
        $data = $request->file('file_import');

        $nama_file = $data->getClientOriginalName();
        $data->move('user', $nama_file);

        FacadesExcel::import(new ImportUsers($request->id_kelas), public_path('user/' . $nama_file));
        return redirect()->back();
    }
}
