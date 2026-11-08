<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_layanan', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->unsignedInteger('id_kategori')->index();
            $table->unsignedInteger('id_user_pengusul')->index()->comment('Dosen/Mhs');
            $table->string('nama_produk', 200);
            $table->text('deskripsi_lengkap');
            $table->boolean('is_preorder')->default(false);
            $table->boolean('is_bookable')->default(false);
            $table->string('lokasi_fasilitas', 100)->nullable();
            $table->unsignedSmallInteger('kapasitas_slot_per_hari')->nullable()->default(1);
            $table->string('kode_fasilitas', 30)->nullable()->unique();
            $table->string('url_lms', 255)->nullable();
            $table->decimal('tkdn_persen', 5, 2)->nullable()->comment('NFR-6');
            $table->smallInteger('masa_garansi')->nullable()->comment('NFR-6');
            $table->enum('satuan_garansi', ['hari', 'bulan', 'tahun'])->nullable();
            $table->string('catatan_garansi', 255)->nullable();
            $table->enum('status_pengajuan', [
                'draft',
                'p3m',
                'rtpu',
                'pimpinan',
                'disetujui',
                'ditolak',
                'revisi',
            ]);

            $table->foreign('id_kategori')
                ->references('id_kategori_produk')
                ->on('kategori_produk')
                ->restrictOnDelete();

            $table->foreign('id_user_pengusul')
                ->references('id_pengguna')
                ->on('user')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_layanan');
    }
};
