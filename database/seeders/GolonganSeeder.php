<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::create([
            'nama' => '-'
        ]);

        Golongan::create([
            'nama' => 'IIA'
        ]);

        Golongan::create([
            'nama' => 'IIB'
        ]);

        Golongan::create([
            'nama' => 'IIC'
        ]);

        Golongan::create([
            'nama' => 'IID'
        ]);

        Golongan::create([
            'nama' => 'IIIA'
        ]);

        Golongan::create([
            'nama' => 'IIIB'
        ]);

        Golongan::create([
            'nama' => 'IIIC'
        ]);

        Golongan::create([
            'nama' => 'IIID'
        ]);

        Golongan::create([
            'nama' => 'IVA'
        ]);

        Golongan::create([
            'nama' => 'IVB'
        ]);

        Golongan::create([
            'nama' => 'IVC'
        ]);

        Golongan::create([
            'nama' => 'IVD'
        ]);

        Golongan::create([
            'nama' => 'IVE'
        ]);
    }
}
