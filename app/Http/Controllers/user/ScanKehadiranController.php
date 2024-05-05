<?php

namespace App\Http\Controllers\user;

use App\Events\KehadiranCreated;
use App\Http\Controllers\Controller;
use App\Jobs\ScanJobs;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;

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
        $job = new ScanJobs($data);
        Queue::push($job);
    }

    private function hitungJarak($destinasi)
    {
        // $destinasi = '-7.008388269417333,113.84431298909102';
        $origin = '-7.006672007148823,113.84435156944333'; //uniba

        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . $origin . '&destinations=' . $destinasi . '&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k';

        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        if ($data['status'] == 'OK') {
            $distanceValue = $data['rows'][0]['elements'][0]['distance']['text'];
        } else {
            $distanceValue = $data['status'];
        }

        return $distanceValue;
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
