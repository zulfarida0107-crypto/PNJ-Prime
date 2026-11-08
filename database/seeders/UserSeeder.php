<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            [
                'sso_id' => 'SSO-ADM-001',
                'auth_provider' => 'manual',
                'saic_id' => '1987654321',
                'email' => 'admin@pnj.ac.id',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Admin PNJ PRIME',
                'no_telepon' => '081111111111',
                'role' => 'admin',
                'status_akun' => 'aktif',
            ],
            [
                'sso_id' => 'SSO-DSN-001',
                'auth_provider' => 'sso_pnj',
                'saic_id' => '197812152005011001',
                'email' => 'dosen@pnj.ac.id',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Dr. Budi Santoso, M.T.',
                'no_telepon' => '081222222222',
                'role' => 'dosen',
                'status_akun' => 'aktif',
            ],
            [
                'sso_id' => 'SSO-MHS-001',
                'auth_provider' => 'sso_pnj',
                'saic_id' => '2107411001',
                'email' => 'mahasiswa@pnj.ac.id',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Andi Pratama',
                'no_telepon' => '081333333333',
                'role' => 'mhs',
                'status_akun' => 'aktif',
            ],
            [
                'sso_id' => null,
                'auth_provider' => 'manual',
                'saic_id' => null,
                'email' => 'mitra@industri.co.id',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'PT Nusantara Teknik Mandiri',
                'no_telepon' => '0215550123',
                'role' => 'mitra',
                'status_akun' => 'aktif',
            ],
        ];

        foreach ($akun as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
