<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identifier::create([
            'nama' => 'DOI'
        ]);

        Identifier::create([
            'nama' => 'ISBN'
        ]);

        Identifier::create([
            'nama' => 'ISSN'
        ]);
    }
}
