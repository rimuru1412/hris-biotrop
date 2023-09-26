<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publikasi>
 */
class PublikasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(3),
            'kegiatan' => fake()->sentence(2),
            'tahun' => fake()->randomDigit(),
            'link' => fake()->sentence(2),
            'pdf' => fake()->sentence(1),
            'identifier_id' => mt_rand(1, 3),
            'user_id' => mt_rand(2, 4),
            'jenispublikasi_id' => mt_rand(1, 2),
        ];
    }
}
