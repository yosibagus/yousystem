<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportUsers;
use App\Jobs\ImportMhsJob;
use App\Models\KelasModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = KelasModel::all();
        return view('admin.kelas.kelas_view', compact('kelas'));
    }

    public function tambah_action(Request $request)
    {
        $data = [
            'nama_kelas' => $request->nama_kelas,
            'angkatan' => $request->angkatan,
            'keterangan' => $request->keterangan
        ];
        KelasModel::create($data);
        return redirect('/kelas')->with('success', 'Data Berhasil Disimpan');
    }

    public function hapus($id)
    { 
        KelasModel::where('id_kelas', $id)->delete();
        return redirect('/kelas')->with('error', 'Data Berhasil Dihapus');
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

        //queue
        $push = [
            'id_kelas' => $request->id_kelas,
            'nama_file' => $nama_file
        ];
        
        $job = new ImportMhsJob($push);
        Queue::push($job);
        
        return redirect()->back();
    }
}
