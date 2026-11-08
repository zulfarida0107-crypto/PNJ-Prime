<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilPerorangan extends Model
{
    protected $table = 'profil_perorangan';

    protected $primaryKey = 'id_profil';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'alamat_lengkap',
        'kota',
        'provinsi',
        'kode_pos',
        'dokumen_ktp',
        'dokumen_npwp',
        'status_verifikasi',
        'catatan_verifikasi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_pengguna');
    }
}
