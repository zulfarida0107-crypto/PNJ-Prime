<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoriApproval extends Model
{
    protected $table = 'histori_approval';

    protected $primaryKey = 'id_histori';

    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'id_user_reviewer',
        'tahap_review',
        'catatan_revisi',
        'tanggal_review',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_review' => 'datetime',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukLayanan::class, 'id_produk', 'id_produk');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_reviewer', 'id_pengguna');
    }
}
