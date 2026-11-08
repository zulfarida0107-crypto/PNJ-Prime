<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MitraEksternal extends Model
{
    protected $table = 'mitra_eksternal';

    protected $primaryKey = 'id_mitra';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'nama_perusahaan',
        'nama_pic',
        'tipe_mitra',
        'npwp_perusahaan',
        'nomor_identitas_lembaga',
        'no_telepon',
        'alamat_perusahaan',
        'dokumen_ktp',
        'dokumen_npwp',
        'status_verifikasi_dokumen',
        'catatan_verifikasi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_pengguna');
    }

    public function inquiryPermohonan(): HasMany
    {
        return $this->hasMany(InquiryPermohonan::class, 'id_mitra', 'id_mitra');
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'id_mitra', 'id_mitra');
    }
}
