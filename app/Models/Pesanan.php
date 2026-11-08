<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';

    public $timestamps = false;

    protected $fillable = [
        'no_invoice',
        'id_user_pembeli',
        'id_mitra',
        'tanggal_pesanan',
        'subtotal_dpp',
        'tarif_ppn',
        'nominal_ppn',
        'is_subject_pph23',
        'nominal_pph23',
        'biaya_meterai',
        'total_tagihan',
        'jenis_pesanan',
        'skema_bayar',
        'persen_dp',
        'nominal_dp',
        'status_pesanan',
        'catatan_pembeli',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pesanan' => 'datetime',
            'subtotal_dpp' => 'decimal:2',
            'tarif_ppn' => 'decimal:2',
            'nominal_ppn' => 'decimal:2',
            'is_subject_pph23' => 'boolean',
            'nominal_pph23' => 'decimal:2',
            'biaya_meterai' => 'decimal:2',
            'total_tagihan' => 'decimal:2',
            'persen_dp' => 'decimal:2',
            'nominal_dp' => 'decimal:2',
        ];
    }

    public function pembeli(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_pembeli', 'id_pengguna');
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(MitraEksternal::class, 'id_mitra', 'id_mitra');
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_pesanan', 'id_pesanan');
    }

    public function dokumenPajak(): HasOne
    {
        return $this->hasOne(DokumenPajak::class, 'id_pesanan', 'id_pesanan');
    }

    public function bagiHasilTransaksi(): HasOne
    {
        return $this->hasOne(BagiHasilTransaksi::class, 'id_pesanan', 'id_pesanan');
    }

    public function inquiryHasil(): HasMany
    {
        return $this->hasMany(InquiryPermohonan::class, 'id_pesanan_hasil', 'id_pesanan');
    }

    public function kalenderBooking(): HasMany
    {
        return $this->hasMany(KalenderBooking::class, 'id_pesanan', 'id_pesanan');
    }
}
