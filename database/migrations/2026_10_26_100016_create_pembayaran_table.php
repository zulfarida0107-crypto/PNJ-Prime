<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->unsignedInteger('id_pesanan')->index();
            $table->enum('jenis_termin', ['dp', 'pelunasan', 'lunas']);
            $table->decimal('nominal_bayar', 12, 2);
            $table->string('metode_bayar', 50)->comment('VA Mandiri/QRIS');
            $table->string('kode_bayar_gateway', 100);
            $table->dateTime('tanggal_bayar');
            $table->string('bukti_bayar', 255);
            $table->enum('status_bayar', ['pending', 'terverif', 'gagal']);

            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanan')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
