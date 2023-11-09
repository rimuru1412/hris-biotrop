<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelatihan>
 */
class PelatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kegiatan' => fake()->sentence(2),
            'tanggal_mulai' => fake()->date(),
            'tanggal_selesai' => fake()->date(),
            'penyelenggara' => fake()->sentence(2),
            'pdf' => fake()->sentence(1),
            'user_id' => mt_rand(1, 3),
            'jenispelatihan_id' => mt_rand(1, 2),
            'peranpelatihan_id' => mt_rand(1, 3)
        ];
    }
}
