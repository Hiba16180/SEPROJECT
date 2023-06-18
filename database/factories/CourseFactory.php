<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'upvotes' => fake()->randomNumber(),
            'body' => fake()->paragraph(),
            'title' => fake()->sentence(),
            'user_id' => \App\Models\User::factory(),     
            'price' => 0,   
            "place"=>['online', 'offline'][ rand(0, 1)], 
            "duration"=> 1, 
            "description"=>fake()->paragraph(),
            "module"=>"mathematics",
            "level"=>"1st elementary",
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
