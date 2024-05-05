<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PerkuliahanIzinModel as izinModel;
use App\Models\PerkuliahanIzinModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class PerkuliahanIzinController extends Controller
{
    public function index()
    {
        if (Auth::user()->asprak == 2) {
            $izin = izinModel::getAllIzinMahasiswa()->get();
        } else {
            $izin = izinModel::getAllIzinMahasiswa(Auth::user()->id)->get();
        }
        return view('admin.izin.izin_view', compact('izin'));
    }

    public function verifikasi(Request $request, $status)
    {
        PerkuliahanIzinModel::where('id_izin', $request->id_izin)->update(['status_izin' => $status]);
        $user = User::where('id', $request->mahasiswa_id)->first();
        $this->kirimEmail($user->email, $user->name, $status);
        return redirect('/izin-perkuliahan')->with('success', 'Berhasil Divalidasi');
    }

    private function kirimEmail($email, $nama, $status)
    {

        if ($status == 200) {
            $pesan = $nama . ", Permohonan Izin Perkuliahan anda <b>DITERIMA</b> oleh Asisten Praktikum <b>" . Auth::user()->name . "</b>. Disetujui pada tanggal " . date('d-m-Y H:i:s') . " WIB";
        } else if ($status == '202') {
            $pesan = $nama . ", Permohonan Izin Telat Perkuliahan anda <b>DITERIMA</b> oleh Asisten Praktikum <b>" . Auth::user()->name . "</b>. Disetujui pada tanggal " . date('d-m-Y H:i:s') . " WIB";
        } else {
            $pesan = $nama . ", Mohon Maaf Permohonan Izin Perkuliahan anda <b>DITOLAK</b> oleh Asisten Praktikum <b>" . Auth::user()->name . "</b>. Divalidasi pada tanggal " . date('d-m-Y H:i:s') . " WIB";
        }

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
            $mail->isSMTP();   //Send using SMTP
            $mail->Host       = 'mail.turbo-main.my.id'; //hostname/domain yang dipergunakan untuk setting smtp
            $mail->SMTPAuth   = true;  //Enable SMTP authentication
            $mail->Username   = 'info@turbo-main.my.id'; //SMTP username
            $mail->Password   = 'buatkanAKU000';   //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
            $mail->Port       = 465;   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPDebug  = 0;

            $tujuan = $email;

            //Recipients
            $mail->setFrom('info@turbo-main.my.id', 'Turbo Info');
            $mail->addAddress($tujuan, $nama);     //email tujuan

            //Content
            $mail->isHTML(true);   //Set email format to HTML
            $mail->Subject = 'Permohonan Izin - ' . $nama;

            $mail->Body    = '
            <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px; margin:auto; max-width:80%"
            align="center">
                <img src="https://yosibgsdr.site/img/fedalon_logo.png" width="50" aria-hidden="true" style="margin-bottom:0px"
                    alt="Tim Turbo" class="" data-bit="iit">
                <div
                    style="font-family:,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                    <div style="font-size:18px; margin-bottom:0px;">YouSystem</div>
                    <small>#KaryaNyataInformatika</small>
                </div>
                <br>
                <hr>
                <div
                    style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left;">
                    <p><b>' . $this->ucapan() . ',</b></p>
                    <p>
                    ' . $pesan . '
                    </p>
                </div>
                <div style="padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">
                    <img src="https://turbo-main.my.id/logo/turbo_hitam.png" width="20" alt=""> x
                    <img src="https://yosibgsdr.site/img/fedalon_logo.png" width="20">
                    <p style="margin-bottom: 0px;">©2024</p><a href="https://turbo-main.my.id/"
                        style="color:rgba(0,0,0,0.87);text-decoration:inherit">https://turbo-main.my.id</a>
                </div>
            </div>
            ';

            $mail->AltBody = '';
            $mail->send();
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    private function ucapan()
    {
        $waktu_sekarang = date('H:i');

        // Inisialisasi pesan selamat
        $pesan_selamat = '';

        // Menentukan waktu dan pesan selamat
        if ($waktu_sekarang >= '05:00' && $waktu_sekarang < '12:00') {
            $pesan_selamat = 'Selamat Pagi';
        } elseif ($waktu_sekarang >= '12:00' && $waktu_sekarang < '18:00') {
            $pesan_selamat = 'Selamat Siang';
        } elseif ($waktu_sekarang >= '18:00' && $waktu_sekarang < '24:00') {
            $pesan_selamat = 'Selamat Sore';
        } else {
            $pesan_selamat = 'Selamat Malam';
        }
        return $pesan_selamat;
    }
}
