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

    //Search Options
    // $users = \App\Models\User::all();
    $users = \App\Models\User::with(['addresses', 'posts'])->get();
    // $users = \App\Models\User::has('posts', '>=', 2)->with('posts')->get();
    // $users = \App\Models\User::doesntHave('posts')->with('posts')->get();
    
    // $users = \App\Models\User::whereHas('posts', function($query){
    //     $query->where('title', 'like', '%10%');
    // })->with('posts')->get();

    $users = \App\Models\User::get();
    return view('users.index', compact('users'));

});

Route::get('/address', function () {

    // $addresses = \App\Models\Address::all();
    $addresses = \App\Models\Address::with('user')->get();

    // dd(compact('users'));
    return view('address.index', compact('addresses'));

});


Route::get('/posts', function () {

    $posts = \App\Models\Post::with('user')->get();

    //retrive pivot
    // $posts = \App\Models\Post::first();
    // dd($posts->toArray());
    // dd($posts->tags->first()->pivot->status);
    // dd(compact('posts'));

    return view('posts.index', compact('posts'));

});


Route::get('/tags', function () {

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

Route::get('/tagsMorph', function () {

    // $post = \App\Models\Post::find(1);
    // $tag = \App\Models\Tag::create([
    //     'name' => 'PHP'
    // ]);
    // $post->tags()->attach($tag);
    // dd($post->tags);


    // $video = \App\Models\Video::create([
    //     'title' => 'Video title 1'
    // ]);
    // $tag = \App\Models\Tag::find(1);
    // $video->tags()->attach($tag);
    // $video = \App\Models\Video::find(1);
    // dd($video->tags);
    // dd($post->tags);


    $tag = \App\Models\Tag::find(1);
    // dd($tag->posts);

    // $tag->videos()->create([
    //     'title' => 'video title 2'
    // ]);
    dd($tag->videos);




});

Route::get('/projects', function () {

    $project = \App\Models\Project::find(1);
    // return $project->users[0]->tasks;
    // return $project->users;
    // return $project->task;
    // return $project;

    $user = \App\Models\User::find(1);
    return $user->projects;

});

Route::get('/teams', function () {

    // $project = Project::find(1);
    $project = Project::find(2);

    return $project->tasks;
    
});


Route::get('/videos', function () {

    $videos = \App\Models\Video::all();
    dd($videos);

    // $video = \App\Models\Video::find(2);
    // dd($video)->toArray();
    // dd($video->comments)->toArray();

});


Route::get('/comments', function () {

    //Post comments
    // $post = \App\Models\Post::find(2);
    // dd($post->comment->toArray());
    // dd($post->toArray());

    //Video comments
    // $video = \App\Models\Video::find(2);
    // dd($video)->toArray();
    // dd($video->comments)->toArray();

    $comment = \App\Models\Comment::find(2);
    // dd($comment);
    // dd($comment->commentable);
    dd($comment->subject());


    // $comments = \App\Models\Comment::all();
    // dd($comments);

});