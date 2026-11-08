<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id_notif');
            $table->unsignedInteger('id_penerima')->index();
            $table->enum('jenis_notif', ['kurasi', 'pesanan', 'bayar', 'sla', 'verifikasi', 'sistem']);
            $table->string('judul', 100);
            $table->text('pesan');
            $table->string('url_tujuan', 255)->nullable();
            $table->boolean('is_read')->default(false);
            $table->dateTime('created_at');

            $table->foreign('id_penerima')
                ->references('id_pengguna')
                ->on('user')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
