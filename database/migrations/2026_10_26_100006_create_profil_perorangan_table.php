<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_perorangan', function (Blueprint $table) {
            $table->increments('id_profil');
            $table->unsignedInteger('id_user')->unique();
            $table->string('alamat_lengkap', 255);
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('kode_pos', 10);
            $table->string('dokumen_ktp', 255)->comment('AES-256');
            $table->string('dokumen_npwp', 255)->comment('AES-256 NIK/NPWP');
            $table->enum('status_verifikasi', ['belum', 'terverif', 'ditolak']);
            $table->string('catatan_verifikasi', 255)->nullable();

            $table->foreign('id_user')
                ->references('id_pengguna')
                ->on('user')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_perorangan');
    }
};
