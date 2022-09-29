<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $religion = ["Islam", "Katolik", "Protestan", "Buddha", "Hindu", "Konghucu"];

        return [
            'nip' => fake()->numerify('3273########'),
            'nik' => fake()->numerify('############'),
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['pria' ,'wanita']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->unique()->dateTimeBetween($startDate = '-78 years', $endDate = '-27 years', $timezone = null, $time = null),
            'telpon' => fake()->numerify('############'),
            'agama' => fake()->randomElement($religion),
            'status_nikah' => fake()->randomElement(['belum nikah' ,'nikah']),
            'alamat' => fake()->address(),
            'golongan_id' => mt_rand(1,17)
        ];
    }
}
