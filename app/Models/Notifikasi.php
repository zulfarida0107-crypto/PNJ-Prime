<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $primaryKey = 'id_notif';

    public const UPDATED_AT = null;

    protected $fillable = [
        'id_penerima',
        'jenis_notif',
        'judul',
        'pesan',
        'url_tujuan',
        'is_read',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'created_at' => 'datetime',
        ];
    }

    public function penerima(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_penerima', 'id_pengguna');
    }
}
