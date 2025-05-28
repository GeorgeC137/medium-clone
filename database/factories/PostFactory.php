<?php

namespace Database\Factories;

use App\Models\Category;
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
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraph(5, ),
            'image' => fake()->imageUrl(),
            'published_at' => fake()->optional()->dateTime(),
            'user_id' => 1, // Assuming user IDs 1, 2, and 3 exist
            'category_id' => Category::inRandomOrder()->first()->id ?? null, // Randomly assign a category if available
        ];
    }
}
