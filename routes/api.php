<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/unauthorized', function(){
    return ["message"=>"Unauthorized"];
});

// Authentication
Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register')->name('register');
    Route::post('/login',  'login')->name('login');


});

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/data', [DataController::class, 'data']);
    Route::get('/data/{id}', [DataController::class, 'show']);
    Route::get('/friends/{id}', [DataController::class, 'friends']);


});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
