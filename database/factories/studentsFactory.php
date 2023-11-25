<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\students>
 */
class studentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'class_id' => fake()->randomDigit(),
            'student_name' => fake()->name(),
            'roll' => fake()->randomDigit(),
            'registration' => fake()->randomNumber(),
            'email' => fake()->unique()->safeEmail().'@gmail.com',
        ];
    }
}
