<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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

// use auth:sanctum middleware is the same with middleware auth inside contreoller to access
Auth::routes();


Route::group(['middleware' => 'auth:sanctum'], function () {
    //Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{user}', [ProfilesController::class, 'index'])->name('profile.index');
        // following view for each user
        Route::get('/{user}/following', [ProfilesController::class, 'following'])->name('profile.following');
        // followers view for each user
        Route::get('/{user}/followers', [ProfilesController::class, 'followers'])->name('profile.followers');
        // to edit profile data
        Route::get('/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
        // patch method to update the profile
        Route::patch('/{user}', [ProfilesController::class, 'update'])->name('profile.update');
    });
    // Post Controller Data
    // home post index
    Route::get('/', [PostsController::class, 'index']);
    // the view to add new post
    Route::group(['prefix' => 'p'], function () {
        Route::get('/create', [PostsController::class, 'create']);
        // store the post data inside database
        Route::post('/', [PostsController::class, 'store']);
        // post detail view for each post
        Route::get('/{post}', [PostsController::class, 'show']);
        // the post method to like a post trigger toogle
        Route::post('/{post}/like', [PostsController::class, 'likePost']);
        // post the comment to the database
        Route::post('/{post}/comment', [CommentsController::class, 'store']);
    });
    Route::group(['prefix' => 'chat'], function () {
        // Chat Controller Data
        // the chat template view
        Route::get('/', [ChatController::class, 'index']);
        // for the room view
        Route::get('/rooms', [ChatController::class, 'rooms']);
        // to take all the messages inside a room
        Route::get('/room/{roomId}/messages', [ChatController::class, 'messages']);
        // to post the message to the database
        Route::post('/room/{roomId}/message', [ChatController::class, 'newMessage']);
        // to create a room link view
        Route::get('/create/room', [ChatController::class, 'create']);
        // to take each profile image
        Route::get('/{user}/profile', [ProfilesController::class, 'profileImage']);
    });
    // to post the new room to the database
    Route::post('/create/room', [ChatController::class, 'store']);
    // activity for notification view for each user
    Route::get('/activity', [ProfilesController::class, 'activity']);
    // for the search using ajax
    Route::get("/search", [ProfilesController::class, 'search']);
    // post method inside search to execute link
    Route::post("/gotoprofile", [ProfilesController::class, 'gotoprofile']);


    // Follows Controller Data
    Route::post('/follow/{user}', [FollowsController::class, 'store']);
});
