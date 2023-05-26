<?php

namespace Database\Factories;

use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = Arr::random(['Male', 'FeMale', 'Trans']);

        return [
            'uuid' => substr(config('app.name'), 0, 3) . random_int(1000, 9999),
            'locality_id' => Locality::pluck('id')[fake()->numberBetween(1, Locality::count() - 1)],
            'name' => fake()->name(),
            'gender' => $gender,
            'dob' => fake()->date(),
            'designation' => fake()->name(),
            'blood_group' => Arr::random(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'contact_no' => fake()->unique()->numberBetween(7777777777, 999999999),
            'about' => fake()->text(500),
        ];
    }
}
