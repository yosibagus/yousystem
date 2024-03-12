<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class ProfileController extends Controller
{
    public function index()
    {
        $detail = KelasModel::where('id_kelas', Auth::user()->kelas_id)->first();
        return view('user.profile.profile_view', compact('detail'));
    }

    public function update()
    {
        return view('user.profile.profile_update');
    }

    public function update_action(Request $request)
    {
        $cek = User::where('email', $request->email)->count();
        if ($cek == 0) {
            User::where('id', Auth::user()->id)->update(['email' => $request->email]);
            $kirim = $this->kirimEmail($request->email);
            if ($kirim == 1) {
                return redirect('/profil')->with('success', 'Akun Berhasil Di Tautkan');
            }
        } else {
            return redirect('/profil')->with('error', 'Akun email sudah ada!');
        }
    }

    private function kirimEmail($email)
    {
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

            $nama = Auth::user()->name;
            $tujuan = $email;

            //Recipients
            $mail->setFrom('info@turbo-main.my.id', 'Turbo Info');
            $mail->addAddress($tujuan, $nama);     //email tujuan

            //Content
            $mail->isHTML(true);   //Set email format to HTML
            $mail->Subject = 'Yousystem - ' . $nama;

            $mail->Body    = '
            <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px;"
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
                    style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:justify;">
                    <p><b>Selamat Datang,</b></p>
                    <p>Alamat Email <b>' . $tujuan . '</b> berhasil terhubung ke akun Mahasiswa atas nama <b>' . $nama . '</b> pada
                        tanggal ' . date('d-m-Y H:i') . ' WIB.
                        Seluruh notifikasi, pemberitahuan, pengumuman tentang Praktikum akan dikirim melalui email
                        <b>' . $tujuan . '</b>
                    </p>
                    <p style="text-align:center;"><i>"Mari Ciptakan kondisi belajar yang produktif dan jadilah generasi pencipta
                            solusi dengan inovasi!"</i></p>
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
}
