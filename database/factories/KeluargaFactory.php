<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'keterangankeluarga_id' => mt_rand(1, 3),
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->sentence(1),
            'tanggal_lahir' => fake()->date(),
            'jenjangpendidikan_id' => mt_rand(1, 10),
            'pekerjaan' => fake()->sentence(1),
            'user_id' => mt_rand(2, 4)
        ];
    }
}
