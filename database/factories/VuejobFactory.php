<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vuejob>
 */
class VuejobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->jobTitle(),
            'type' => 'Full-Time',
            'description' => fake()->text(),
            'salary' => 'under $50K',
            'location' => fake()->streetAddress(),
            'user_id' => 1,
        ];
    }
}
