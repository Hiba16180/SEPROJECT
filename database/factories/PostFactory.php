<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   //\App\Models\Image::factory()->times(10)->create();  
        return [
            'upvotes' => fake()->randomNumber(),
            'body' => fake()->paragraph(),
            'title' => fake()->sentence(),
            'user_id' => \App\Models\User::factory(),
        ];
    }

}
