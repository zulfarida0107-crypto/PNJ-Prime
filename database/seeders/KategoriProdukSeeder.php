<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Jasa Uji Lab',
                'deskripsi' => 'Layanan pengujian dan kalibrasi laboratorium Politeknik Negeri Jakarta untuk kebutuhan industri dan riset.',
            ],
            [
                'nama_kategori' => 'Produk Inovasi',
                'deskripsi' => 'Produk hasil inovasi dosen dan mahasiswa PNJ yang siap dikomersialkan, termasuk pre-order prototipe.',
            ],
            [
                'nama_kategori' => 'Sewa Ruangan',
                'deskripsi' => 'Penyewaan fasilitas, laboratorium, dan ruang praktik PNJ berdasarkan slot kalender harian.',
            ],
        ];

        foreach ($kategori as $data) {
            KategoriProduk::updateOrCreate(
                ['nama_kategori' => $data['nama_kategori']],
                $data
            );
        }
    }
}
