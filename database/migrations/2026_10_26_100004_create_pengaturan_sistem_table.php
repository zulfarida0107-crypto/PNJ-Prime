<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan_sistem', function (Blueprint $table) {
            $table->increments('id_pengaturan');
            $table->enum('kategori', ['pajak', 'bagi_hasil', 'operasional']);
            $table->string('nama_kunci', 50)->unique();
            $table->decimal('nilai', 12, 4);
            $table->enum('status_berlaku', ['aktif', 'pending_sk', 'nonaktif']);
            $table->string('dasar_hukum', 255);
            $table->text('keterangan');
            $table->unsignedInteger('updated_by')->nullable();
            $table->dateTime('updated_at');

            $table->foreign('updated_by')
                ->references('id_pengguna')
                ->on('user')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_sistem');
    }
};
