<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerkuliahanKelasModel extends Model
{
    use HasFactory;
    protected $table = "perkuliahan_kelas";
    protected $guarded = [];

    public static function getAllPerkuliahan($id = null)
    {
        $query = DB::table('perkuliahan_kelas')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->join('master_kelas', 'master_kelas.id_kelas', '=', 'perkuliahan_kelas.kelas_id')
            ->join('users', 'users.id', '=', 'perkuliahan_kelas.asprak_id');
        if (!empty($id)) {
            $query->where('perkuliahan_kelas.asprak_id', $id);
        }
        return $query;
    }

    public static function getDetailPerkuliahan($token)
    {
        $query = DB::table('perkuliahan_kelas')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->join('master_kelas', 'master_kelas.id_kelas', '=', 'perkuliahan_kelas.kelas_id')
            ->where('perkuliahan_kelas.token_perkuliahan', $token);
        return $query;
    }

    //user
    public static function getJadwalPerkuliahan($id_kelas)
    {
        $query = DB::table('perkuliahan_kelas')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->join('master_kelas', 'master_kelas.id_kelas', '=', 'perkuliahan_kelas.kelas_id')
            ->where('perkuliahan_kelas.kelas_id', $id_kelas)
            ->orderBy('perkuliahan_kelas.tgl_perkuliahan', 'desc');
        return $query;
    }

    public static function getPerkulihanHariIni($id_kelas)
    {
        $now = date('Y-m-d');
        $query = DB::table('perkuliahan_kelas')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->where('perkuliahan_kelas.kelas_id', $id_kelas)
            ->whereDate('perkuliahan_kelas.tgl_perkuliahan', $now);
        return $query;
    }
}
