<?php

namespace App\Jobs;

use App\Events\KehadiranCreated;
use App\Http\Controllers\HitungJarakController;
use App\Models\PerkuliahanIzinModel;
use App\Models\PerkuliahanMahasiswaModel;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ScanJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        PerkuliahanMahasiswaModel::create($this->data);

        $absensi = PerkuliahanMahasiswaModel::getAbsensiMahasiswa($this->data['token_perkuliahan'])->count();
        $kehadiran = $this->data['status_kehadiran'] == 0 ? '<span class="badge badge-xs badge-danger">Tidak Hadir</span>' : '<span class="badge badge-xs badge-success">Hadir</span>';
        $latlong = $this->data['latitude'] . ',' . $this->data['longitude'];

        $maps = new HitungJarakController();

        $hitung_jarak = $maps->index($latlong);

        $mahasiswa = User::where('id', $this->data['mahasiswa_id'])->first();

        $event = [
            'mhs' => $mahasiswa->nim_mahasiswa . ' - ' . $mahasiswa->name,
            'tgl_absensi' => $this->data['tgl_absensi'],
            'status_terlambat' => $this->data['status_lambat'],
            'status_kehadiran' => $kehadiran,
            'radius' => $hitung_jarak,
            'absensi' => $absensi
        ];

        event(new KehadiranCreated($event));
    }
}
