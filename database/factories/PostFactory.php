<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentences(3, asText: true),
            'content' => $this->faker->paragraphs(5, asText: true),
            'published' => 1,
        ];
    }

    /**
     * Indicate that the model's published should be true.
     *
     * @return static
     */
    public function published()
    {
        return $this->state(fn() => ['published' => true]);

    }

    /**
     * Indicate that the model's published should be false.
     *
     * @return static
     */
    public function unpublished()
    {
        return $this->state(fn() => ['published' => false]);
    }
}
