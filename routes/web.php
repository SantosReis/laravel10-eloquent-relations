<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    // \App\Models\User::factory(10)->create();

    // \App\Models\Address::create([
    //     'user_id' => 1,
    //     'country' => 'Nepal'
    // ]);

    // \App\Models\Address::create([
    //     'user_id' => 2,
    //     'country' => 'USA'
    // ]);

    // \App\Models\Address::create([
    //     'user_id' => 3,
    //     'country' => 'UK'
    // ]);

    //option of searchs
    // $users = \App\Models\User::all();
    $users = \App\Models\User::with(['addresses', 'posts'])->get();
    // $users = \App\Models\User::has('posts', '>=', 2)->with('posts')->get();
    // $users = \App\Models\User::doesntHave('posts')->with('posts')->get();
    //search like
    // $users = \App\Models\User::whereHas('posts', function($query){
    //     $query->where('title', 'like', '%10%');
    // })->with('posts')->get();

    
    // $users = \App\Models\User::get();

    // $users[0]->addresses()->create([
    //     'country' => 'Nepal'
    // ]);

    // $users[0]->posts()->create([
    //     'title' => 'Post 10'
    // ]);

    // $users[2]->posts()->create([
    //     'title' => 'Post 11'
    // ]);

    // dd(compact('users'));

    return view('users.index', compact('users'));

});

Route::get('/address', function () {

    // $user = \App\Models\User::factory()->create();

    // $user->address()->create([
    //     'country' => 'UK'
    // ]);

    // $addresses = \App\Models\Address::all();
    $addresses = \App\Models\Address::with('user')->get();

    // dd(compact('users'));

    return view('address.index', compact('addresses'));

});


Route::get('/posts', function () {

    // $user = \App\Models\User::factory()->create();    

    // \App\Models\Post::create([
    //     'user_id' => 1,
    //     'title' => 'Post title 1',
    // ]);

    // \App\Models\Post::create([
    //     'user_id' => 2,
    //     'title' => 'Post title 3',
    // ]);

    // $addresses = \App\Models\Post::all();
    $posts = \App\Models\Post::with('user')->get();

    //retrive pivot
    // $posts = \App\Models\Post::first();
    // dd($posts->tags->first()->pivot->status);
    // dd(compact('posts'));

    return view('posts.index', compact('posts'));

});


Route::get('/tags', function () {

    // \App\Models\Tag::create([
    //     'name' => 'PHP',
    // ]);

    // \App\Models\Tag::create([
    //     'name' => 'Laravel',
    // ]);

    // \App\Models\Tag::create([
    //     'name' => 'Javascrip',
    // ]);

    $tag = \App\Models\Tag::first();
    // $post = \App\Models\Post::first();
    // $post = \App\Models\Post::with('tags')->first();
    $post = \App\Models\Post::with(['user', 'tags'])->first();

    //setup into related tables
    // $post->tags()->attach($tag);
    // $post->tags()->attach([2, 3, 4]);
    // $post->tags()->attach(1);
    // $post->tags()->attach([
    //     1 => [
    //         'status' => 'approved'
    //     ]
    // ]);
    $post->tags()->detach(1);
    // $post->tags()->sync([1, 3]);
    // $post->tags()->sync([1]);


    // dd($post->toArray());
    // dd($post->tags->first());
    // dd($post->tags->first()->pivot->created_at);

    $tags = \App\Models\Tag::with('posts')->get();
    return view('tags.index', compact('tags'));

});


Route::get('/projects', function () {

    //TODO setup into factories
    // $project1 = \App\Models\Project::create([
    //     'title' => 'Project A',
    // ]);

    // $project2 = \App\Models\Project::create([
    //     'title' => 'Project B',
    // ]);

    // $user1 = \App\Models\User::create([
    //     'name' => 'User 1',
    //     'email' => 'user1@example.com',
    //     'password' => Hash::make('password'),
    // ]);

    // $user2 = \App\Models\User::create([
    //     'name' => 'User 2',
    //     'email' => 'user2@example.com',
    //     'password' => Hash::make('password'),
    // ]);

    // $user3 = \App\Models\User::create([
    //     'name' => 'User 3',
    //     'email' => 'user3@example.com',
    //     'password' => Hash::make('password'),
    // ]);

    // $project1->users()->attach($user1);
    // $project1->users()->attach($user2);
    // $project1->users()->attach($user3);

    // $project2->users()->attach($user1);
    // $project2->users()->attach($user3);


    // $project = \App\Models\Project::find(1);
    $user = \App\Models\User::find(2);

    // return $project->users;
    return $user->projects;

});

Route::get('/team', function () {

    // \App\Models\Task::create([
    //     'title' => 'Task A',
    //     'user_id' => 1
    // ]);

    // \App\Models\Task::create([
    //     'title' => 'Task B',
    //     'user_id' => 1
    // ]);

    // \App\Models\Task::create([
    //     'title' => 'Task C',
    //     'user_id' => 2
    // ]);

    // \App\Models\Task::create([
    //     'title' => 'Task D',
    //     'user_id' => 3
    // ]);

    // $project = Project::find(1);
    $project = Project::find(2);

    return $project->tasks;
    
});