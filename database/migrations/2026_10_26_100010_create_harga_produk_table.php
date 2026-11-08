<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('harga_produk', function (Blueprint $table) {
            $table->increments('id_harga');
            $table->unsignedInteger('id_produk')->index();
            $table->unsignedInteger('id_pimpinan_approval')->index();
            $table->decimal('harga_jual', 12, 2)->comment('DPP Base');
            $table->string('satuan', 30);
            $table->date('tanggal_berlaku');
            $table->date('tanggal_berakhir')->nullable();
            $table->dateTime('tanggal_disetujui')->nullable()->comment('Audit');
            $table->string('catatan_pimpinan', 255)->nullable();
            $table->boolean('status_aktif')->default(true);

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk_layanan')
                ->cascadeOnDelete();

            $table->foreign('id_pimpinan_approval')
                ->references('id_pengguna')
                ->on('user')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harga_produk');
    }
};
