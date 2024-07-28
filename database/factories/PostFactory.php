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
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'user_id' => function () {
                // return rand(0, 5);
                return \App\Models\User::all()->random()->id;
                // return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
