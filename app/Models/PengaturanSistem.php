<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengaturanSistem extends Model
{
    protected $table = 'pengaturan_sistem';

    protected $primaryKey = 'id_pengaturan';

    public const CREATED_AT = null;

    protected $fillable = [
        'kategori',
        'nama_kunci',
        'nilai',
        'status_berlaku',
        'dasar_hukum',
        'keterangan',
        'updated_by',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'nilai' => 'decimal:4',
            'updated_at' => 'datetime',
        ];
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id_pengguna');
    }
}
