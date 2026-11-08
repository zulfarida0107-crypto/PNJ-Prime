<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use App\Models\ProdukLayanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProdukLayananSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = User::query()->where('role', 'dosen')->where('email', 'dosen@pnj.ac.id')->firstOrFail();

        $produk = [
            [
                'nama_kategori' => 'Jasa Uji Lab',
                'nama_produk' => 'Pengujian Tarik Material Komposit',
                'deskripsi_lengkap' => 'Jasa uji tarik (tensile test) material komposit sesuai standar ASTM D638 di Laboratorium Material PNJ.',
                'is_preorder' => false,
                'is_bookable' => true,
                'lokasi_fasilitas' => 'Lab Material, Gedung T LT. 2',
                'kapasitas_slot_per_hari' => 4,
                'kode_fasilitas' => 'LAB-MAT-01',
                'url_lms' => null,
                'tkdn_persen' => 85.50,
                'masa_garansi' => null,
                'satuan_garansi' => null,
                'catatan_garansi' => null,
                'status_pengajuan' => 'disetujui',
            ],
            [
                'nama_kategori' => 'Produk Inovasi',
                'nama_produk' => 'IoT Monitoring Kualitas Udara PNJ-Air',
                'deskripsi_lengkap' => 'Perangkat IoT pemantau kualitas udara (PM2.5, suhu, kelembapan) hasil inovasi dosen dan mahasiswa Jurusan Teknik Elektro.',
                'is_preorder' => true,
                'is_bookable' => false,
                'lokasi_fasilitas' => null,
                'kapasitas_slot_per_hari' => null,
                'kode_fasilitas' => null,
                'url_lms' => 'https://lms.pnj.ac.id/inovasi/pnj-air',
                'tkdn_persen' => 72.00,
                'masa_garansi' => 12,
                'satuan_garansi' => 'bulan',
                'catatan_garansi' => 'Garansi perangkat dan kalibrasi sensor selama 12 bulan.',
                'status_pengajuan' => 'disetujui',
            ],
            [
                'nama_kategori' => 'Sewa Ruangan',
                'nama_produk' => 'Sewa Workshop CNC & Fabrication',
                'deskripsi_lengkap' => 'Penyewaan ruang workshop CNC lengkap dengan mesin milling dan operator pendamping untuk mitra industri.',
                'is_preorder' => false,
                'is_bookable' => true,
                'lokasi_fasilitas' => 'Workshop CNC, Gedung Teknik Mesin',
                'kapasitas_slot_per_hari' => 2,
                'kode_fasilitas' => 'WS-CNC-01',
                'url_lms' => null,
                'tkdn_persen' => null,
                'masa_garansi' => null,
                'satuan_garansi' => null,
                'catatan_garansi' => null,
                'status_pengajuan' => 'pimpinan',
            ],
        ];

        foreach ($produk as $data) {
            $kategori = KategoriProduk::query()
                ->where('nama_kategori', $data['nama_kategori'])
                ->firstOrFail();

            unset($data['nama_kategori']);

            ProdukLayanan::updateOrCreate(
                ['nama_produk' => $data['nama_produk']],
                array_merge($data, [
                    'id_kategori' => $kategori->id_kategori_produk,
                    'id_user_pengusul' => $dosen->id_pengguna,
                ])
            );
        }
    }
}
