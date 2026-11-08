<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kalender_booking', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->unsignedInteger('id_produk')->index();
            $table->unsignedInteger('id_pesanan')->nullable()->index();
            $table->unsignedInteger('id_inquiry')->nullable()->index();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->enum('status_slot', [
                'tersedia',
                'terkunci',
                'dipesan',
                'selesai',
                'dibatalkan',
            ]);
            $table->dateTime('auto_cancel_at')->nullable()->comment('Anti-Ghost');
            $table->string('catatan', 200);

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk_layanan')
                ->restrictOnDelete();

            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanan')
                ->nullOnDelete();

            $table->foreign('id_inquiry')
                ->references('id_inquiry')
                ->on('inquiry_permohonan')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kalender_booking');
    }
};
