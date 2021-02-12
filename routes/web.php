<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [PostsController::class, 'index']);

Route::get('/profile/{user}', [ProfilesController::class, 'index']);

Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit']);

Route::patch('/profile/{user}', [ProfilesController::class, 'update']);

Route::get('/p/create', [PostsController::class, 'create']);
// for the post data that is going inside the variable
Route::post('/p', [PostsController::class, 'store']);

Route::get('/p/{post}', [PostsController::class, 'show']);

Route::get('follow/{user}', [FollowsController::class, 'store']);

Route::get('p/{post}/like', [PostsController::class, 'likePost']);
