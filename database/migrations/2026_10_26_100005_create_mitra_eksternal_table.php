<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitra_eksternal', function (Blueprint $table) {
            $table->increments('id_mitra');
            $table->unsignedInteger('id_user')->unique();
            $table->string('nama_perusahaan', 150);
            $table->string('nama_pic', 100);
            $table->enum('tipe_mitra', ['perusahaan', 'institusi']);
            $table->string('npwp_perusahaan', 30)->unique();
            $table->string('nomor_identitas_lembaga', 30)->nullable()->comment('NPSN');
            $table->string('no_telepon', 30);
            $table->string('alamat_perusahaan', 255);
            $table->string('dokumen_ktp', 255)->comment('AES-256');
            $table->string('dokumen_npwp', 255)->comment('AES-256');
            $table->enum('status_verifikasi_dokumen', ['belum', 'terverif', 'ditolak']);
            $table->string('catatan_verifikasi', 255)->nullable();

            $table->foreign('id_user')
                ->references('id_pengguna')
                ->on('user')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitra_eksternal');
    }
};
