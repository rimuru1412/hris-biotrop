<?php

namespace Database\Seeders;

use App\Models\JenisPelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPelatihan::create([
            'nama' => 'Pelatihan'
        ]);

        JenisPelatihan::create([
            'nama' => 'Seminar'
        ]);
    }
}
