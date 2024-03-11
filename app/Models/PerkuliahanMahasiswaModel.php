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
}
