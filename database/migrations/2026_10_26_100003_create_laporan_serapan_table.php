<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_serapan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->unsignedTinyInteger('bulan')->comment('1-12');
            $table->unsignedSmallInteger('tahun');
            $table->integer('total_transaksi');
            $table->decimal('total_pendapatan', 15, 2)->comment('DPP');
            $table->decimal('total_ppn_dipungut', 15, 2);
            $table->decimal('total_pph23_dipotong', 15, 2);
            $table->decimal('total_pph21_dipotong', 15, 2);
            $table->decimal('total_bagi_hasil_inovator', 15, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_serapan');
    }
};
