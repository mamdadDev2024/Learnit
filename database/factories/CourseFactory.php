<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
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
        $title = fake()->sentence();
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text(),
            'rating' => floatval(random_int(1 , 5)),
            'price' => random_int(100 , 10000),
            'image' => fake()->imageUrl()
        ];
    }
}
