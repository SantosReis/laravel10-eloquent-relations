<?php

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

    // $users = \App\Models\User::all();
    $users = \App\Models\User::with('addresses')->get();

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
