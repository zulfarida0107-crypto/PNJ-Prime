<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiry_permohonan', function (Blueprint $table) {
            $table->increments('id_inquiry');
            $table->unsignedInteger('id_mitra')->index();
            $table->unsignedInteger('id_produk')->index();
            $table->dateTime('tanggal_pengajuan');
            $table->date('tanggal_mulai_diinginkan');
            $table->date('tanggal_selesai_diinginkan');
            $table->unsignedInteger('qty_estimasi');
            $table->text('deskripsi_kebutuhan');
            $table->string('file_surat_permohonan', 255)->nullable();
            $table->decimal('penawaran_harga_admin', 12, 2)->nullable();
            $table->string('file_penawaran', 255)->nullable();
            $table->enum('status_inquiry', [
                'menunggu',
                'ditawarkan',
                'deal',
                'ditolak',
                'dibatalkan',
            ]);
            $table->unsignedInteger('id_pesanan_hasil')->nullable()->index();
            $table->text('catatan_admin');

            $table->foreign('id_mitra')
                ->references('id_mitra')
                ->on('mitra_eksternal')
                ->restrictOnDelete();

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk_layanan')
                ->restrictOnDelete();

            $table->foreign('id_pesanan_hasil')
                ->references('id_pesanan')
                ->on('pesanan')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiry_permohonan');
    }
};
