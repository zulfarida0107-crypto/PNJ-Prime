<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->string('sso_id', 100)->nullable()->comment('SSO PNJ');
            $table->enum('auth_provider', ['sso_pnj', 'manual']);
            $table->string('saic_id', 50)->nullable()->comment('NIP/NIM');
            $table->string('email', 150)->unique();
            $table->string('password', 255)->nullable()->comment('Bcrypt');
            $table->string('nama_lengkap', 150);
            $table->string('no_telepon', 20);
            $table->enum('role', ['admin', 'dosen', 'mhs', 'mitra', 'pimpinan', 'p3m', 'rtpu']);
            $table->enum('status_akun', ['aktif', 'nonaktif', 'pending']);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
