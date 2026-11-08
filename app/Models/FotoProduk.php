<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoProduk extends Model
{
    protected $table = 'foto_produk';

    protected $primaryKey = 'id_foto';

    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'path_file',
        'urutan',
        'keterangan',
        'uploaded_at',
    ];

    protected function casts(): array
    {
        return [
            'urutan' => 'integer',
            'uploaded_at' => 'datetime',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukLayanan::class, 'id_produk', 'id_produk');
    }
}
