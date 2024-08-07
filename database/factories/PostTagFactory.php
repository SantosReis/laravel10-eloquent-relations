<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTag>
 */
class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => function () {
                return \App\Models\Tag::all()->random()->id;
            },
            'tag_id' => function () {
                return \App\Models\Tag::all()->random()->id;
            },
            'status' => 'approved',
        ];
    }
}
