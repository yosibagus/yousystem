<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perkuliahan_mahasiswa', function (Blueprint $table) {
            $table->increments('id_perkuliahan_mhs');
            $table->string('token_perkuliahan', 13);
            $table->integer('mahasiswa_id');
            $table->date('tgl_absensi');
            $table->integer('status_lambat');
            $table->integer('status_kehadiran');
            $table->string('latitude', 50);
            $table->string('longitude', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkuliahan_mahasiswa');
    }
};
