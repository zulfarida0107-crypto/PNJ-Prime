<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InquiryPermohonan extends Model
{
    protected $table = 'inquiry_permohonan';

    protected $primaryKey = 'id_inquiry';

    public $timestamps = false;

    protected $fillable = [
        'id_mitra',
        'id_produk',
        'tanggal_pengajuan',
        'tanggal_mulai_diinginkan',
        'tanggal_selesai_diinginkan',
        'qty_estimasi',
        'deskripsi_kebutuhan',
        'file_surat_permohonan',
        'penawaran_harga_admin',
        'file_penawaran',
        'status_inquiry',
        'id_pesanan_hasil',
        'catatan_admin',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pengajuan' => 'datetime',
            'tanggal_mulai_diinginkan' => 'date',
            'tanggal_selesai_diinginkan' => 'date',
            'qty_estimasi' => 'integer',
            'penawaran_harga_admin' => 'decimal:2',
        ];
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(MitraEksternal::class, 'id_mitra', 'id_mitra');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukLayanan::class, 'id_produk', 'id_produk');
    }

    public function pesananHasil(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan_hasil', 'id_pesanan');
    }

    public function kalenderBooking(): HasMany
    {
        return $this->hasMany(KalenderBooking::class, 'id_inquiry', 'id_inquiry');
    }
}
