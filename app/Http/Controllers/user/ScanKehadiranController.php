<?php

namespace App\Http\Controllers\user;

use App\Events\KehadiranCreated;
use App\Http\Controllers\Controller;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanKehadiranController extends Controller
{
    public function index($id)
    {
        $data = $this->cekKelas($id);
        $now = PerkuliahanMahasiswaModel::getRuntimePerkuliahan($id)->first();
        return view('user.scan.scan', compact('data', 'now'));
    }

    private function cekKelas($id)
    {
        $now = PerkuliahanMahasiswaModel::getRuntimePerkuliahan($id)->first();
        $targetDateTime = $now->tgl_perkuliahan; // Gantilah dengan tanggal dan jam target Anda
        $currentDateTime = date('Y-m-d H:i:s'); // Mendapatkan tanggal dan jam saat ini

        if ($currentDateTime > $targetDateTime) {
            return 1;
        } else {
            return 0;
        }
    }

    public function scanpost(Request $request)
    {
        $token = $request->token_perkuliahan;
        $id_mhs = Auth::user()->id;
        $tgl_absensi = date('Y-m-d H:i:s');

        $row = PerkuliahanKelasModel::where('token_perkuliahan', $token)->first();

        if ($row->kelas_id == Auth::user()->kelas_id) {
            $cek = PerkuliahanMahasiswaModel::where([
                ['token_perkuliahan', '=', $token],
                ['mahasiswa_id', '=', $id_mhs]
            ])->count();

            if ($cek < 1) {

                $lambat = $this->cekKeterlambatan($token) != 'Tepat Waktu' ? 0 : 1;

                $data = [
                    'token_perkuliahan' => $token,
                    'mahasiswa_id' => $id_mhs,
                    'tgl_absensi' => $tgl_absensi,
                    'status_lambat' => $this->cekKeterlambatan($token),
                    'status_kehadiran' => $lambat,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'lokasi' => $request->lokasi,
                ];
                PerkuliahanMahasiswaModel::create($data);
                $pesan = [
                    'status' => 1,
                    'pesan' => 'Berhasil Melakukan Absensi'
                ];
                $this->event_trigger($data);
            } else {
                $pesan = [
                    'status' => 200,
                    'pesan' => 'Anda Sudah Melakukan Absensi'
                ];
            }
        } else {
            $pesan = [
                'status' => 404,
                'pesan' => 'Bukan Kelas Anda'
            ];
        }

        echo json_encode($pesan);
    }

    private function event_trigger($data)
    {
        $event = [
            'mhs' => Auth::user()->nim_mahasiswa . ' - ' . Auth::user()->name,
            'tgl_absensi' => $data['tgl_absensi'],
            'status_terlambat' => $data['status_lambat'],
            'status_kehadiran' => $data['status_kehadiran'],
            'radius' => 0
        ];
        event(new KehadiranCreated($event));
    }

    private function cekKeterlambatan($token)
    {
        $row = PerkuliahanKelasModel::where('token_perkuliahan', $token)->first();

        $tgl_perkuliahan = $row->tgl_perkuliahan;
        $max_keterlambatan = $row->max_keterlambatan;

        $now = date('Y-m-d H:i:s');

        if ($now > $tgl_perkuliahan && $now < $max_keterlambatan) {
            return 'Tepat Waktu';
        } else {
            $sebenarnya = new DateTime($now);
            $jadwal = new DateTime($max_keterlambatan);
            $keterlambatan = $sebenarnya->diff($jadwal);
            return 'Terlambat ' . $keterlambatan->format('%H jam, %i menit, %s detik');
        }
    }
}
