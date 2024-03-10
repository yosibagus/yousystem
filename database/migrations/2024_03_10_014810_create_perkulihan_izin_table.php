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
        Schema::create('perkulihan_izin', function (Blueprint $table) {
            $table->increments('id_izin');
            $table->string('token_perkuliahan');
            $table->integer('mahasiswa_id');
            $table->text('keterangan_izin');
            $table->string('file_izin', 50);
            $table->integer('status_izin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkulihan_izin');
    }
};
