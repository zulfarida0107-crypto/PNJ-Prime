<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('histori_approval', function (Blueprint $table) {
            $table->increments('id_histori');
            $table->unsignedInteger('id_produk')->index();
            $table->unsignedInteger('id_user_reviewer')->index();
            $table->string('tahap_review', 100);
            $table->text('catatan_revisi');
            $table->dateTime('tanggal_review');

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk_layanan')
                ->cascadeOnDelete();

            $table->foreign('id_user_reviewer')
                ->references('id_pengguna')
                ->on('user')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histori_approval');
    }
};
