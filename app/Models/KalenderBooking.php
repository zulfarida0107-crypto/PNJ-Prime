<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KalenderBooking extends Model
{
    protected $table = 'kalender_booking';

    protected $primaryKey = 'id_booking';

    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'id_pesanan',
        'id_inquiry',
        'tanggal_mulai',
        'tanggal_selesai',
        'jam_mulai',
        'jam_selesai',
        'status_slot',
        'auto_cancel_at',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'auto_cancel_at' => 'datetime',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukLayanan::class, 'id_produk', 'id_produk');
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function inquiry(): BelongsTo
    {
        return $this->belongsTo(InquiryPermohonan::class, 'id_inquiry', 'id_inquiry');
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'id_kalender', 'id_booking');
    }
}
