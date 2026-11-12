<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends Factory<Post>
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
        $title = fake()->sentence(6, 8);
        return [
            'title' => $title,
            'author_id' => user::factory(),
            'category_id' => category::factory(),
            'slug' => Str::slug($title),
            'body' => fake()->text()
        ];
    }
}
