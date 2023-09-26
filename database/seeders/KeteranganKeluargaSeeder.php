<?php

namespace Database\Seeders;

use App\Models\KeteranganKeluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KeteranganKeluarga::create([
            'nama' => 'suami'
        ]);

        KeteranganKeluarga::create([
            'nama' => 'istri'
        ]);

        KeteranganKeluarga::create([
            'nama' => 'anak'
        ]);
    }
}
