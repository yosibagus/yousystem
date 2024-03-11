<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\PerkuliahanKelasModel;
use App\Models\PerkuliahanMahasiswaModel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerkulihanKelasController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->asprak == 1) {
            $perkuliahan = PerkuliahanKelasModel::getAllPerkuliahan($id)->get();
        } else {
            $perkuliahan = PerkuliahanKelasModel::getAllPerkuliahan()->get();
        }
        return view('admin.perkuliahan_kelas.kuliah_kelas', compact('perkuliahan'));
    }

    public function tambah()
    {
        $data = [
            'kelas' => KelasModel::all(),
            'matakuliah' => MatkulModel::all(),
            'asprak' => User::where('asprak', 1)->get()
        ];
        return view('admin.perkuliahan_kelas.kuliah_kelas_tambah', $data);
    }

    public function tambah_action(Request $request)
    {
        $token = Str::random(12);
        $asprak = Auth::user()->asprak == 2 ? $request->asprak_id : Auth::user()->id;
        $data = [
            'token_perkuliahan' => $token,
            'kelas_id' => $request->kelas_id,
            'matakuliah_id' => $request->matkul_id,
            'asprak_id' => $asprak,
            'tgl_perkuliahan' => $request->tgl_perkuliahan,
            'max_keterlambatan' => $request->max_keterlambatan,
            'keterangan_perkuliahan' => $request->keterangan_perkuliahan,
            'materi_perkuliahan' => $request->materi_perkuliahan,
        ];

        PerkuliahanKelasModel::create($data);
        return redirect('perkuliahan_kelas')->with('success', 'Data Perkuliahan Berhasil Disimpan');
    }

    public function detail_perkuliahan()
    {
        $token = $_GET['token'];
        $detail = PerkuliahanKelasModel::getDetailPerkuliahan($token)->first();
        return view('admin.perkuliahan_kelas.kuliah_kelas_detail', compact('detail'));
    }

    public function detail_kehadiran()
    {
        $token = $_GET['token'];
        $detail = PerkuliahanKelasModel::getDetailPerkuliahan($token)->first();
        return view('admin.perkuliahan_kelas.kehadiran', compact('detail'));
    }

    public function data_absensi()
    {
        $token = $_GET['token'];
        $perkuliahan = PerkuliahanMahasiswaModel::getAbsensiMahasiswa($token)->get();

        $html = "";
        $i = 1;

        foreach ($perkuliahan as $get) {
            $destinasi = $get->latitude . ',' . $get->longitude;
            $html .= '<tr>';
            $html .= '<td>' . $i++ . '</td>';
            $html .= '<td>' . $get->nim_mahasiswa . ' - ' . $get->name . '</td>';
            $html .= '<td>' . $get->tgl_absensi . '</td>';
            $html .= '<td>' . $get->status_lambat . '</td>';
            $html .= '<td>' . $this->hitungJarak($destinasi) . '</td>';
            $html .= '<td>' . $get->status_kehadiran . '</td>';
            $html .= '</tr>';
        }

        echo $html;
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

    public function get_detail_kuliah()
    {
        $token = $_GET['token'];
        $absensi = PerkuliahanMahasiswaModel::getAbsensiMahasiswa($token)->count();
        $perkuliahan = PerkuliahanKelasModel::getDetailPerkuliahan($token)->first();

        $mhs = User::where('kelas_id', $perkuliahan->kelas_id)->count();

        $data = [
            'absensi' => $absensi,
            'mhs'=> ($mhs - $absensi)
        ];

        echo json_encode($data);
    }
}
