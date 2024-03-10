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
        Schema::create('perkuliahan_kelas', function (Blueprint $table) {
            $table->increments('id_perkulihan');
            $table->integer('kelas_id');
            $table->integer('matakuliah_id');
            $table->string('token_perkulihan', 13);
            $table->text('keterangan_perkuliahan');
            $table->text('materi_perkulihan');
            $table->date('tgl_perkulihan');
            $table->date('max_keterlambatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkuliahan_kelas');
    }
};
