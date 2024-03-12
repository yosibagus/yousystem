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

    public static function getIzinMahasiswa($id)
    {
        $query = DB::table('perkuliahan_izin')
            ->join('perkuliahan_kelas', 'perkuliahan_kelas.token_perkuliahan', '=', 'perkuliahan_izin.token_perkuliahan')
            ->join('users', 'users.id', '=', 'perkuliahan_izin.mahasiswa_id')
            ->where('perkuliahan_izin.mahasiswa_id', $id);
        return $query;
    }
}
