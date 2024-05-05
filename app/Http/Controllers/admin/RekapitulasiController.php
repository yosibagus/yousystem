<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanIzinModel;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->asprak == 1) {
            $perkuliahan = PerkuliahanKelasModel::getAllPerkuliahan($id)->get();
        } else {
            $perkuliahan = PerkuliahanKelasModel::getAllPerkuliahan()->get();
        }
        return view('admin.rekapitulasi.rekap_perkuliahan', compact('perkuliahan'));
    }

    public function review()
    {
        $token = $_GET['token'];
        $data['perkuliahan'] = $this->getReview($token);
        return view('admin.rekapitulasi.review_perkuliahan', $data);
    }

    private function getReview($token)
    {
        $kelas = PerkuliahanKelasModel::where('token_perkuliahan', $token)->first();
        $mhs = User::where('kelas_id', $kelas->kelas_id)->get();

        foreach ($mhs as $get) {
            $absensi = PerkuliahanMahasiswaModel::where([
                ['mahasiswa_id', '=', $get->id],
                ['token_perkuliahan', '=', $token]
            ]);

            if ($absensi->count() > 0) {
                $status = $absensi->first()->status_kehadiran;
                $keterangan = $absensi->first()->status_lambat;
            } else {
                //akan di input ke database
                $izin = PerkuliahanIzinModel::where([
                    ['mahasiswa_id', '=', $get->id],
                    ['token_perkuliahan', '=', $token]
                ]);
                if ($izin->count() > 0) {
                    if ($izin->first()->status_izin == '200') {
                        $status = 1;
                        $keterangan = 'Izin';
                    } else if ($izin->first()->status_izin == '202') {
                        $status = 1;
                        $keterangan = 'Izin Telat';
                    } else {
                        $status = 0;
                        $keterangan = 'Izin Ditolak';
                    }
                } else {
                    $status = 0;
                    $keterangan = 'Tanpa Keterangan';
                }
            }

            $data[] = [
                'token_perkuliahan' => $token,
                'mahasiswa_id' => $get->id,
                'mahasiswa' => $get->name,
                'status' => $status,
                'keterangan' => $keterangan
            ];
        }

        return $data;
    }
}
