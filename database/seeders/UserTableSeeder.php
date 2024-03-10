<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'YOSI BAGUS SADAR RASULI',
                'nim_mahasiswa' => 'admin',
                'kelas_id' => 3,
                'tgl_lahir' => '2000-04-22',
                'email' => 'yosibagus@unibamadura.ac.id',
                'password' => bcrypt('admin123'),
                'hint' => 'admin123',
                'role' => 0,
                'status_akun' => 1
            ]
        ];

        User::insert($userData);
    }
}
