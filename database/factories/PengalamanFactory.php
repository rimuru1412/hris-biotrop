<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengalaman>
 */
class PengalamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jabatan' => fake()->sentence(1),
            'nama_perusahaan' => fake()->sentence(2),
            'tanggal_masuk' => fake()->date(),
            'tanggal_keluar' => fake()->date(),
            'uraian_pekerjaan' => fake()->sentence(20),
            'user_id' => mt_rand(2, 4)
        ];
    }
}
