<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'user';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'sso_id',
        'auth_provider',
        'saic_id',
        'email',
        'password',
        'nama_lengkap',
        'no_telepon',
        'role',
        'status_akun',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function mitraEksternal(): HasOne
    {
        return $this->hasOne(MitraEksternal::class, 'id_user', 'id_pengguna');
    }

    public function profilPerorangan(): HasOne
    {
        return $this->hasOne(ProfilPerorangan::class, 'id_user', 'id_pengguna');
    }

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'id_penerima', 'id_pengguna');
    }

    public function pengaturanSistem(): HasMany
    {
        return $this->hasMany(PengaturanSistem::class, 'updated_by', 'id_pengguna');
    }

    public function produkDiajukan(): HasMany
    {
        return $this->hasMany(ProdukLayanan::class, 'id_user_pengusul', 'id_pengguna');
    }

    public function hargaDisetujui(): HasMany
    {
        return $this->hasMany(HargaProduk::class, 'id_pimpinan_approval', 'id_pengguna');
    }

    public function historiApproval(): HasMany
    {
        return $this->hasMany(HistoriApproval::class, 'id_user_reviewer', 'id_pengguna');
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'id_user_pembeli', 'id_pengguna');
    }

    public function bagiHasilDosen(): HasMany
    {
        return $this->hasMany(BagiHasilTransaksi::class, 'id_user_dosen', 'id_pengguna');
    }

    public function bagiHasilMahasiswa(): HasMany
    {
        return $this->hasMany(BagiHasilTransaksi::class, 'id_user_mahasiswa', 'id_pengguna');
    }
}
