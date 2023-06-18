<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaggedPosts>
 */
class TaggedPostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $options = ["university","high_school","middle_school","elementary_school","Q&A","science", "languages", "sports", "business_and_entrepreneurship", "politics", "arts_and_culture", "technology", "career", "education", "general", "religion"];

    public function definition(): array
    {
        $randomKey = array_rand($this->options);
        $randomOption = $this->options[$randomKey];
        return [
            'tag' => $randomOption ,
            'post_id' => \App\Models\Post::factory(),
        ];
    }
}
