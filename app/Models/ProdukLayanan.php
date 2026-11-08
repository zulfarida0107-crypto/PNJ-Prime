<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProdukLayanan extends Model
{
    protected $table = 'produk_layanan';

    protected $primaryKey = 'id_produk';

    public $timestamps = false;

    protected $fillable = [
        'id_kategori',
        'id_user_pengusul',
        'nama_produk',
        'deskripsi_lengkap',
        'is_preorder',
        'is_bookable',
        'lokasi_fasilitas',
        'kapasitas_slot_per_hari',
        'kode_fasilitas',
        'url_lms',
        'tkdn_persen',
        'masa_garansi',
        'satuan_garansi',
        'catatan_garansi',
        'status_pengajuan',
    ];

    protected function casts(): array
    {
        return [
            'is_preorder' => 'boolean',
            'is_bookable' => 'boolean',
            'kapasitas_slot_per_hari' => 'integer',
            'tkdn_persen' => 'decimal:2',
            'masa_garansi' => 'integer',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori', 'id_kategori_produk');
    }

    public function pengusul(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_pengusul', 'id_pengguna');
    }

    public function fotoProduk(): HasMany
    {
        return $this->hasMany(FotoProduk::class, 'id_produk', 'id_produk');
    }

    public function hargaProduk(): HasMany
    {
        return $this->hasMany(HargaProduk::class, 'id_produk', 'id_produk');
    }

    public function historiApproval(): HasMany
    {
        return $this->hasMany(HistoriApproval::class, 'id_produk', 'id_produk');
    }

    public function inquiryPermohonan(): HasMany
    {
        return $this->hasMany(InquiryPermohonan::class, 'id_produk', 'id_produk');
    }

    public function kalenderBooking(): HasMany
    {
        return $this->hasMany(KalenderBooking::class, 'id_produk', 'id_produk');
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'id_produk', 'id_produk');
    }
}
