<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HargaProduk extends Model
{
    protected $table = 'harga_produk';

    protected $primaryKey = 'id_harga';

    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'id_pimpinan_approval',
        'harga_jual',
        'satuan',
        'tanggal_berlaku',
        'tanggal_berakhir',
        'tanggal_disetujui',
        'catatan_pimpinan',
        'status_aktif',
    ];

    protected function casts(): array
    {
        return [
            'harga_jual' => 'decimal:2',
            'tanggal_berlaku' => 'date',
            'tanggal_berakhir' => 'date',
            'tanggal_disetujui' => 'datetime',
            'status_aktif' => 'boolean',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukLayanan::class, 'id_produk', 'id_produk');
    }

    public function pimpinanApproval(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pimpinan_approval', 'id_pengguna');
    }
}
