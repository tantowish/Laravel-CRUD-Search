<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $harga = $this->faker->numberBetween(1, 20) * 10000;
        return [
            'judul' => $this->faker->sentence(2, true),
            'penulis' => $this->faker->name,
            'harga' => $harga,
            'tgl_terbit' => $this->faker->date
        ];
    }
}
