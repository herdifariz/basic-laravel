<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/hello", "App\Http\Controllers\HelloController@index");

// Route::get("/hello", [HelloController::class, "index"]);
// Route::post("/hello", [HelloController::class, "create"]);
// Route::get("/world", [HelloController::class, "world_message"]);

// Route::resource('posts', PostController::class);

Route::get('posts', [PostController::class, 'index']);
Route::get("posts/{id}", [PostController::class, "show"]);
Route::get("posts/create", [PostController::class, "create"]);
Route::post("posts/create", [PostController::class, "store"]);
