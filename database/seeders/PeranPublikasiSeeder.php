<?php

namespace Database\Seeders;

use App\Models\PeranPublikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeranPublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeranPublikasi::create([
            'nama' => 'penulis'
        ]);

        PeranPublikasi::create([
            'nama' => 'narasumber'
        ]);
    }
}
