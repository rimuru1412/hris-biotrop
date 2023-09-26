<?php

namespace Database\Seeders;

use App\Models\JenisPublikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPublikasi::create([
            'nama' => 'Artikel'
        ]);

        JenisPublikasi::create([
            'nama' => 'Jurnal'
        ]);

        JenisPublikasi::create([
            'nama' => 'Majalah'
        ]);

        JenisPublikasi::create([
            'nama' => 'Buku'
        ]);

        JenisPublikasi::create([
            'nama' => 'Prosiding'
        ]);

        JenisPublikasi::create([
            'nama' => 'Laporan'
        ]);

        JenisPublikasi::create([
            'nama' => 'Media Cetak/Daring'
        ]);

        JenisPublikasi::create([
            'nama' => 'Policy Brief'
        ]);
    }
}
