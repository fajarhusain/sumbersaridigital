<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengumuman')->insert([
            [
                'judul' => 'Kerja Bakti Bersih Desa',
                'isi' => 'Dimohon seluruh warga untuk ikut serta kerja bakti bersih desa pada hari Minggu pukul 07.00 WIB, titik kumpul di Balai Desa.',
                'tanggal' => '2025-09-20', // format YYYY-MM-DD
            ],
            [
                'judul' => 'Musyawarah Desa Tahunan',
                'isi' => 'Akan dilaksanakan musyawarah desa tahunan pada hari Selasa pukul 09.00 WIB di Balai Desa. Diharapkan perwakilan RT hadir.',
                'tanggal' => '2025-09-25',
            ],
            [
                'judul' => 'Pembagian BLT Dana Desa',
                'isi' => 'Pembagian BLT Dana Desa akan dilaksanakan pada hari Kamis pukul 10.00 WIB di Balai Desa.',
                'tanggal' => '2025-09-30',
            ],
        ]);
    }
}