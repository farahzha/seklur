<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nik' => fake()->nik(),
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'jk' => fake()->randomElement(['l', 'p']),
            'alamat' => fake()->address(),
            'agama' => fake()->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'khonghucu']),
            'status_perkawinan' => fake()->randomElement(['sm', 'bm', 'janda', 'duda']),
            'pekerjaan' => fake()->randomElement(['pns', 'pelajar', 'karyawan', 'wirausaha', 'wiraswasta', 'pengangguran']),
        ];
    }
}
