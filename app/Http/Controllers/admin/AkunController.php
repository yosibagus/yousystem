<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $akun = User::getAllAkun()->get();
        return view('admin.akun.akun_view', compact('akun'));
    }

    public function tambah()
    {
        $kelas = KelasModel::all();
        return view('admin.akun.akun_add', compact('kelas'));
    }

    public function tambah_action(Request $request)
    {
        $data = [
            'name' => $request->name,
            'nim_mahasiswa' => $request->nim_mahasiswa,
            'kelas_id' => $request->kelas_id,
            'tgl_lahir' => '',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hint' => $request->password,
            'role' => 1,
            'status_akun' => 1
        ];
        User::create($data);
        return redirect('/akun')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $detail = User::where('id', $id)->first();
        $kelas = KelasModel::all();
        return view('admin.akun.akun_edit', compact('detail', 'kelas'));
    }

    public function edit_action(Request $request, $id)
    {
        if (empty($request->password)) {
            $data = [
                'name' => $request->name,
                'nim_mahasiswa' => $request->nim_mahasiswa,
                'kelas_id' => $request->kelas_id,
                'tgl_lahir' => '',
                'email' => $request->email
            ];
        } else {
            $data = [
                'name' => $request->name,
                'nim_mahasiswa' => $request->nim_mahasiswa,
                'kelas_id' => $request->kelas_id,
                'tgl_lahir' => '',
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'hint' => $request->password,
            ];
        }

        User::where('id', $id)->update($data);
        return redirect('/akun')->with('success', 'Data Berhasil Diupdate');
    }

    public function hapus($id)
    {
        User::where('id', $id)->delete();
        return redirect('/akun')->with('error', 'Data Mahasiswa Berhasil Dihapus');
    }

    //asisten praktikum
    public function asisten()
    {
        $akun = User::getAllAkun()->get();
        $asprak = User::where('asprak', 1)->get();
        return view('admin.akun.asisten_view', compact('akun', 'asprak'));
    }

    public function asisten_action(Request $request)
    {
        $akun = User::where('id', $request->id_mahasiswa)->first();

        $data = [
            'name' => $akun->name,
            'nim_mahasiswa' => '1' . $akun->nim_mahasiswa,
            'password' => bcrypt('asprak123'),
            'hint' => 'asprak123',
            'kelas_id' => 3,
            'tgl_lahir' => '',
            'email' => '',
            'role' => 0,
            'status_akun' => 1,
            'asprak' => 1
        ];

        User::create($data);

        return redirect('/asisten')->with('success', 'Data Berhasil Disimpan');
    }
}
