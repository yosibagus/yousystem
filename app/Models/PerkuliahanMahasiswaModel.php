<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerkuliahanMahasiswaModel extends Model
{
    use HasFactory;
    protected $table = "perkuliahan_mahasiswa";
    protected $guarded = [];

    public static function getRuntimePerkuliahan($token)
    {
        $query = DB::table('perkuliahan_kelas')
            ->where([
                ['token_perkuliahan', '=', $token]
            ]);

        return $query;
    }

    public static function countHadir($status, $id_mahasiswa)
    {
        $query  = DB::table('perkuliahan_mahasiswa')
            ->where([
                ['mahasiswa_id', '=', $id_mahasiswa],
                ['status_kehadiran', '=', $status]
            ]);

        return $query;
    }

    public static function getAbsensiMahasiswa($token)
    {
        $query = DB::table('perkuliahan_mahasiswa')
            ->join('users', 'users.id', '=', 'perkuliahan_mahasiswa.mahasiswa_id')
            ->where('perkuliahan_mahasiswa.token_perkuliahan', $token)
            ->orderBy('perkuliahan_mahasiswa.tgl_absensi', 'desc');
        return $query;
    }

    public static function getAbsensiMhs($id_mahasiswa)
    {
        $query = DB::table('perkuliahan_mahasiswa')
            ->join('users', 'users.id', '=', 'perkuliahan_mahasiswa.mahasiswa_id')
            ->join('perkuliahan_kelas', 'perkuliahan_kelas.token_perkuliahan','=', 'perkuliahan_mahasiswa.token_perkuliahan')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->where('perkuliahan_mahasiswa.mahasiswa_id', $id_mahasiswa)
            ->orderBy('perkuliahan_mahasiswa.tgl_absensi', 'desc');
        return $query;
    }
}
