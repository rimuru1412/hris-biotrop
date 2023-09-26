<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penghargaan>
 */
class PenghargaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->sentence(3),
            'pemberi' => fake()->sentence(2),
            'tahun' => fake()->randomDigit(),
            'pdf' => fake()->sentence(1),
            'user_id' => mt_rand(2, 4)
        ];
    }
}
