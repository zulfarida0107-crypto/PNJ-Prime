<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';

    protected $primaryKey = 'id_kategori_produk';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function produkLayanan(): HasMany
    {
        return $this->hasMany(ProdukLayanan::class, 'id_kategori', 'id_kategori_produk');
    }
}
