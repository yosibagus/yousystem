<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerkuliahanIzinModel extends Model
{
    use HasFactory;
    protected $table = "perkuliahan_izin";
    protected $guarded = [];

    public static function getAllIzinMahasiswa($id = null)
    {
        $query = DB::table('perkuliahan_izin')
            ->join('perkuliahan_kelas', 'perkuliahan_kelas.token_perkuliahan', '=', 'perkuliahan_izin.token_perkuliahan')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->join('users', 'users.id', '=', 'perkuliahan_izin.mahasiswa_id');
        if (!empty($id)) {
            $query->where('perkuliahan_kelas.asprak_id', $id);
        }
        $query->orderBy('perkuliahan_izin.tgl_izin', 'desc');
        return $query;
    }

    public static function getIzinMahasiswa($id)
    {
        $query = DB::table('perkuliahan_izin')
            ->join('perkuliahan_kelas', 'perkuliahan_kelas.token_perkuliahan', '=', 'perkuliahan_izin.token_perkuliahan')
            ->join('master_matkul', 'master_matkul.id_matkul', '=', 'perkuliahan_kelas.matakuliah_id')
            ->join('users', 'users.id', '=', 'perkuliahan_izin.mahasiswa_id')
            ->where('perkuliahan_izin.mahasiswa_id', $id);
        return $query;
    }
}
