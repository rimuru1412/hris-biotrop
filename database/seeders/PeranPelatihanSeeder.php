<?php

namespace Database\Seeders;

use App\Models\PeranPelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeranPelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeranPelatihan::create([
            'nama' => 'Peserta'
        ]);

        PeranPelatihan::create([
            'nama' => 'Narasumber'
        ]);

        PeranPelatihan::create([
            'nama' => 'Moderator'
        ]);
    }
}
