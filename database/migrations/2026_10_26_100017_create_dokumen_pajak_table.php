<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_pajak', function (Blueprint $table) {
            $table->increments('id_dokumen');
            $table->unsignedInteger('id_pesanan')->unique();
            $table->enum('jenis_faktur', ['penuh', 'termin']);
            $table->string('no_seri_efaktur_dp', 50)->nullable();
            $table->string('file_efaktur_dp', 255)->nullable();
            $table->decimal('nominal_ppn_dp', 12, 2)->default(0);
            $table->string('no_seri_efaktur_pelunasan', 50)->nullable();
            $table->string('file_efaktur_pelunasan', 255)->nullable();
            $table->decimal('nominal_ppn_pelunasan', 12, 2)->default(0);
            $table->decimal('total_nominal_ppn', 12, 2);
            $table->string('no_bukti_potong_pph23', 50)->nullable();
            $table->string('file_bukti_potong', 255)->nullable();
            $table->decimal('nominal_bukti_potong', 12, 2)->default(0);
            $table->enum('status_dokumen', ['belum', 'dp_up', 'pelunasan_up', 'lengkap']);
            $table->text('catatan');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanan')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_pajak');
    }
};
