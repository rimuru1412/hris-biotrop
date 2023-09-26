<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendidikan>
 */
class PendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_instansi' => fake()->name(),
            'jenjangpendidikan_id' => mt_rand(1, 10),
            'jurusan' => fake()->sentence(1),
            'tahun_lulus' => fake()->randomDigit(),
            'user_id' => mt_rand(2, 4)
        ];
    }
}
