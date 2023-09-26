<?php

namespace Database\Seeders;

use App\Models\JenisCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisCuti::create([
            'nama' => 'Tahunan'
        ]);

        JenisCuti::create([
            'nama' => 'Besar'
        ]);

        JenisCuti::create([
            'nama' => 'Sakit'
        ]);

        JenisCuti::create([
            'nama' => 'Bersalin'
        ]);

        JenisCuti::create([
            'nama' => 'Karena Alasan Penting'
        ]);

        JenisCuti::create([
            'nama' => 'Keterangan Lain'
        ]);
    }
}
