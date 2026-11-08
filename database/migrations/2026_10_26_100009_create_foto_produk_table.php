<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foto_produk', function (Blueprint $table) {
            $table->increments('id_foto');
            $table->unsignedInteger('id_produk')->index();
            $table->string('path_file', 255)->comment('Max 1MB');
            $table->unsignedTinyInteger('urutan')->default(1);
            $table->string('keterangan', 100)->nullable();
            $table->dateTime('uploaded_at');

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk_layanan')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foto_produk');
    }
};
