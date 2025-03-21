<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => fake()->jobTitle(),
            'salary' => '$' . number_format(
                    fake()->numberBetween(50000, 120000), 0, '.', ','
                ) . ' CAD',
            'employer_id' => Employer::factory()
        ];
    }
}
