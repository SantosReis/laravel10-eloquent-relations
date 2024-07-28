<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $projects = \App\Models\Project::factory(5)->create();
        \App\Models\User::factory(10)->create();

        //seed into project_user
        foreach ($projects as $project) {
            $project->users()->attach(\App\Models\User::all()->random());
        }

        \App\Models\Task::factory(5)->create();
        \App\Models\Address::factory(5)->create();

        \App\Models\Post::factory(5)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\PostTag::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
