<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Sekdes
        User::updateOrCreate(
            ['email' => 'sekdes@sumbersari.id'], // cek unik berdasarkan email
            [
                'nama' => 'Sekdes',
                'nik' => '3318000000000001',
                'nomor_whatsapp' => '081111111111',
                'rt_rw' => '001/001',
                'alamat' => 'Jl. Sumbersari Raya No. 1, Kayen, Pati',
                'role' => 'admin',
                'password' => Hash::make('sekdes01'), // login pakai: sekdes01
                'email_verified_at' => now(),
            ]
        );

        // User RT
        User::updateOrCreate(
            ['email' => 'rt02@sumbersari.id'],
            [
                'nama' => 'Pak RT 002',
                'nik' => '9876543210987654',
                'nomor_whatsapp' => '082222222222',
                'rt_rw' => '002/001',
                'alamat' => 'Jl. Sumbersari Selatan, Kayen, Pati',
                'role' => 'rt',
                'password' => Hash::make('sumbersarirt02'), // login pakai: sumbersarirt02
                'email_verified_at' => now(),
            ]
        );
    }
}