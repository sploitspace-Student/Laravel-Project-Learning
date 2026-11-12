<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = fake()->sentence(rand(1, 3), false);
        return [
            'name' => $category_name,
            'color' => fake()->randomElement(['bg-red-200', 'bg-green-200', 'bg-blue-200']),
            'slug' => Str::slug($category_name)
        ];
    }
}
