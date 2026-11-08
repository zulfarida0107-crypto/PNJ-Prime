<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    public $timestamps = false;

    protected $fillable = [
        'id_pesanan',
        'jenis_termin',
        'nominal_bayar',
        'metode_bayar',
        'kode_bayar_gateway',
        'tanggal_bayar',
        'bukti_bayar',
        'status_bayar',
    ];

    protected function casts(): array
    {
        return [
            'nominal_bayar' => 'decimal:2',
            'tanggal_bayar' => 'datetime',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
