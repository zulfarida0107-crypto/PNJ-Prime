<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
            $table->string('no_invoice', 50)->unique();
            $table->unsignedInteger('id_user_pembeli')->index();
            $table->unsignedInteger('id_mitra')->nullable()->index();
            $table->dateTime('tanggal_pesanan');
            $table->decimal('subtotal_dpp', 12, 2);
            $table->decimal('tarif_ppn', 5, 2)->default(11.00);
            $table->decimal('nominal_ppn', 12, 2);
            $table->boolean('is_subject_pph23')->default(false)->comment('B2B Jasa');
            $table->decimal('nominal_pph23', 12, 2)->default(0);
            $table->decimal('biaya_meterai', 10, 2)->comment('>5jt: 10.000');
            $table->decimal('total_tagihan', 12, 2);
            $table->enum('jenis_pesanan', ['b2c', 'b2b']);
            $table->enum('skema_bayar', ['lunas', 'termin']);
            $table->decimal('persen_dp', 5, 2)->nullable()->comment('50-70%');
            $table->decimal('nominal_dp', 12, 2)->nullable();
            $table->enum('status_pesanan', [
                'draft',
                'menunggu_dp',
                'menunggu_pelunasan',
                'diproses',
                'selesai',
                'dibatalkan',
            ]);
            $table->string('catatan_pembeli', 200);

            $table->foreign('id_user_pembeli')
                ->references('id_pengguna')
                ->on('user')
                ->restrictOnDelete();

            $table->foreign('id_mitra')
                ->references('id_mitra')
                ->on('mitra_eksternal')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
