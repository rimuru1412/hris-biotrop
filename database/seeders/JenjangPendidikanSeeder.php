<?php

namespace Database\Seeders;

use App\Models\JenjangPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenjangPendidikan::create([
            'nama' => 'SD'
        ]);

        JenjangPendidikan::create([
            'nama' => 'SMP'
        ]);

        JenjangPendidikan::create([
            'nama' => 'SMA'
        ]);

        JenjangPendidikan::create([
            'nama' => 'D1'
        ]);

        JenjangPendidikan::create([
            'nama' => 'D2'
        ]);

        JenjangPendidikan::create([
            'nama' => 'D3'
        ]);

        JenjangPendidikan::create([
            'nama' => 'D4'
        ]);

        JenjangPendidikan::create([
            'nama' => 'S1'
        ]);

        JenjangPendidikan::create([
            'nama' => 'S2'
        ]);

        JenjangPendidikan::create([
            'nama' => 'S3'
        ]);
    }
}
