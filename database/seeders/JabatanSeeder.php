<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'nama' => 'Board of Directors'
        ]);

        Jabatan::create([
            'nama' => 'Manager'
        ]);

        Jabatan::create([
            'nama' => 'Kepala Unit'
        ]);

        Jabatan::create([
            'nama' => 'Supervisor'
        ]);

        Jabatan::create([
            'nama' => 'Head of Section'
        ]);

        Jabatan::create([
            'nama' => 'Staff'
        ]);
    }
}
