<?php

use App\Http\Controllers\ProfilesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', [ProfilesController::class, 'index']);

Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit']);

Route::patch('/profile/{user}', [ProfilesController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
