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
        // to edit profile data
        Route::get('/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
        // patch method to update the profile
        Route::patch('/{user}', [ProfilesController::class, 'update'])->name('profile.update');
    });
    // Post Controller Data
    // home post index
    Route::get('/', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/user', [ProfilesController::class, 'user'])->name('user.auth');

    // the view to add new post
    Route::group(['prefix' => 'p'], function () {
        Route::get('/{post}/liked_by', [PostsController::class, 'likeView'])->name('posts.likeby');
        Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
        // store the post data inside database
        Route::post('/', [PostsController::class, 'store'])->name('posts.store');
        // post detail view for each post
        Route::get('/{post}', [PostsController::class, 'show'])->name('posts.show');
        // the post method to like a post trigger toogle
        Route::post('/{post}/like', [PostsController::class, 'likePost'])->name('posts.like');
        // post the comment to the database
        Route::post('/{post}/comment', [CommentsController::class, 'store'])->name('posts.comment');
    });
    Route::group(['prefix' => 'chat'], function () {
        // Chat Controller Data
        // the chat template view
        Route::get('/', [ChatController::class, 'index'])->name('chat');
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
        // for profile chat
        Route::get('/{user}/create/room', [ChatController::class, 'chat'])->name('chat.store');
    });
    // to post the new room to the database
    Route::post('/create/room', [ChatController::class, 'store'])->name('room.store');
    // activity for notification view for each user
    Route::get('/activity', [ProfilesController::class, 'activity'])->name('activity');
    // for the search using ajax
    Route::get("/search", [ProfilesController::class, 'search']);
    // post method inside search to execute link
    Route::post("/gotoprofile", [ProfilesController::class, 'gotoprofile']);


    // Follows Controller Data
    Route::post('/follow/{user}', [FollowsController::class, 'store']);
});
