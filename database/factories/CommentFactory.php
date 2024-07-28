<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $commentable = $this->commentable();

        return [
            'user_id' => function () {
                // return rand(0, 5);
                return \App\Models\User::all()->random()->id;
                // return \App\Models\User::factory()->create()->id;
            },
            'body' => $this->faker->paragraph,
            'commentable_id' => $commentable::factory(),
            'commentable_type' => $commentable,
        ];

    }

    public function commentable()
    {
        // return \App\Models\Post::class;
        // return \App\Models\Video::class;
        return $this->faker->randomElement([
            \App\Models\Post::class,
            \App\Models\Video::class,
        ]);
    }
}
