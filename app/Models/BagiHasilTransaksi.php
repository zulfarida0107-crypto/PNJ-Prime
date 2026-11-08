<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BagiHasilTransaksi extends Model
{
    protected $table = 'bagi_hasil_transaksi';

    protected $primaryKey = 'id_bagi_hasil';

    public $timestamps = false;

    protected $fillable = [
        'id_pesanan',
        'id_user_dosen',
        'porsi_persen_dosen',
        'nominal_kotor_dosen',
        'tarif_pph21_dosen',
        'nominal_pph21_dosen',
        'nominal_bersih_dosen',
        'id_user_mahasiswa',
        'porsi_persen_mahasiswa',
        'nominal_kotor_mahasiswa',
        'tarif_pph21_mahasiswa',
        'nominal_pph21_mahasiswa',
        'nominal_bersih_mahasiswa',
        'porsi_kas_jurusan',
        'porsi_kas_rtpu',
        'status_pencairan',
        'tanggal_pencairan',
        'bukti_transfer',
    ];

    protected function casts(): array
    {
        return [
            'porsi_persen_dosen' => 'decimal:2',
            'nominal_kotor_dosen' => 'decimal:2',
            'tarif_pph21_dosen' => 'decimal:2',
            'nominal_pph21_dosen' => 'decimal:2',
            'nominal_bersih_dosen' => 'decimal:2',
            'porsi_persen_mahasiswa' => 'decimal:2',
            'nominal_kotor_mahasiswa' => 'decimal:2',
            'tarif_pph21_mahasiswa' => 'decimal:2',
            'nominal_pph21_mahasiswa' => 'decimal:2',
            'nominal_bersih_mahasiswa' => 'decimal:2',
            'porsi_kas_jurusan' => 'decimal:2',
            'porsi_kas_rtpu' => 'decimal:2',
            'tanggal_pencairan' => 'datetime',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_dosen', 'id_pengguna');
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_mahasiswa', 'id_pengguna');
    }
}
