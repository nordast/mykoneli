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
        $date = fake()->dateTimeBetween('-1 month', now());

        return [
            'title'       => $title,
            'slug'        => Str::slug($title),
            'category_id' => fake()->numberBetween(1, Category::count()),
            'content'     => '<p>' . fake()->paragraph() . '</p>',
            'status'      => fake()->numberBetween(0, 1),
            'tags'        => fake()->words(),
            'created_at'  => $date,
            'updated_at'  => $date,
        ];
    }
}
