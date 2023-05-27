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
    // App\Models\Friends::create(
    //     [
    //     'name' => 'Evans',
    //     'age' => 18
    //     ]
    // );

    // App\Models\Friends::create(
    //     [
    //     'name' => 'Vincent',
    //     'age' => 20
    //     ]
    // );

    $friend = App\Models\Friends::first();
    $user = App\Models\User::first();

    // Adding a relationship
    $user->friends()->attach($friend);
    



    return view('welcome');
});
