<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUsers implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $report_id;

    public function __construct($report_id)
    {
        $this->report_id = $report_id;
    }

    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'nim_mahasiswa' => $row[1],
            'kelas_id' => $this->report_id,
            'tgl_lahir' => '',
            'email' => '',
            'password' => bcrypt($row[1]),
            'hint' => $row[1],
            'role' => 1,
            'status_akun' => 1
        ]);
    }
}
