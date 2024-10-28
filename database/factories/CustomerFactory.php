<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "uuid" => Str::uuid(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'notes' => fake()->notes(),
            'contact_name' => fake()->name(),
            'contact_number' => fake()->randomNumber(8, true),
            'type' => fake()->randomElement(['BAC', 'INDUSTRIAL', 'PROMERICA', 'BANRURAL', 'BAM', 'AZTECA']),
        ];
    }
}