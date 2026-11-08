<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bagi_hasil_transaksi', function (Blueprint $table) {
            $table->increments('id_bagi_hasil');
            $table->unsignedInteger('id_pesanan')->unique();
            $table->unsignedInteger('id_user_dosen')->index()->comment('Dosen');
            $table->decimal('porsi_persen_dosen', 5, 2)->default(40.00);
            $table->decimal('nominal_kotor_dosen', 12, 2);
            $table->decimal('tarif_pph21_dosen', 5, 2)->default(5.00);
            $table->decimal('nominal_pph21_dosen', 12, 2);
            $table->decimal('nominal_bersih_dosen', 12, 2);
            $table->unsignedInteger('id_user_mahasiswa')->nullable()->index()->comment('Mhs');
            $table->decimal('porsi_persen_mahasiswa', 5, 2)->default(30.00);
            $table->decimal('nominal_kotor_mahasiswa', 12, 2);
            $table->decimal('tarif_pph21_mahasiswa', 5, 2)->default(2.50);
            $table->decimal('nominal_pph21_mahasiswa', 12, 2);
            $table->decimal('nominal_bersih_mahasiswa', 12, 2);
            $table->decimal('porsi_kas_jurusan', 12, 2)->comment('15% DPP');
            $table->decimal('porsi_kas_rtpu', 12, 2)->comment('15% DPP');
            $table->enum('status_pencairan', ['pending_sk', 'disetujui', 'dicairkan', 'ditolak']);
            $table->dateTime('tanggal_pencairan')->nullable();
            $table->string('bukti_transfer', 255)->nullable();

            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanan')
                ->restrictOnDelete();

            $table->foreign('id_user_dosen')
                ->references('id_pengguna')
                ->on('user')
                ->restrictOnDelete();

            $table->foreign('id_user_mahasiswa')
                ->references('id_pengguna')
                ->on('user')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bagi_hasil_transaksi');
    }
};
