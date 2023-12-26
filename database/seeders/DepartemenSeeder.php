<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::create([
            'nama' => 'Director'
        ]);

        Departemen::create([
            'nama' => 'Deputy Director for Administration'
        ]);

        Departemen::create([
            'nama' => 'Science Innovation and Technology'
        ]);

        Departemen::create([
            'nama' => 'Human Center and Innovation Department'
        ]);

        Departemen::create([
            'nama' => 'Finance and Facilities Management Department'
        ]);

        Departemen::create([
            'nama' => 'Human Resource and Administration Departement'
        ]);

        Departemen::create([
            'nama' => 'Knowledge Management, Publication and Communication Unit'
        ]);

        Departemen::create([
            'nama' => 'Earth Observatory and Change Section'
        ]);

        Departemen::create([
            'nama' => 'Environmental Technology and Security Section'
        ]);

        Departemen::create([
            'nama' => 'Environmental and Finance Risk Management Section'
        ]);

        Departemen::create([
            'nama' => 'Environmental Policy and Governance Section'
        ]);

        Departemen::create([
            'nama' => 'Perencanaan dan Monev Program dan Kegiatan'
        ]);

        Departemen::create([
            'nama' => 'Keuangan DIPA'
        ]);

        Departemen::create([
            'nama' => 'Keuangan Non DIPA'
        ]);

        Departemen::create([
            'nama' => 'Pemeliharaan Gedung dan Halaman Gedung'
        ]);

        Departemen::create([
            'nama' => 'Pemeliharaan Alat dan Mesin'
        ]);
    }
}
