<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $akun = User::getAllAkun()->get();
        return view('admin.akun.akun_view', compact('akun'));
    }

    public function asisten()
    {
        $akun = User::getAllAkun()->get();
        $asprak = User::where('asprak', 1)->get();
        return view('admin.akun.asisten_view', compact('akun', 'asprak'));
    }

    public function asisten_action(Request $request)
    {
        // User::where('id', $request->id_mahasiswa)->update(['asprak' => 1]);

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
