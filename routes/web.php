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
// Profiles Controller Data
// profile detail view for each user
Route::get('/profile/{user}', [ProfilesController::class, 'index']);
// following view for each user
Route::get('/profile/{user}/following', [ProfilesController::class, 'following']);
// followers view for each user
Route::get('/profile/{user}/followers', [ProfilesController::class, 'followers']);
// activity for notification view for each user
Route::middleware('auth:sanctum')->get('/activity', [ProfilesController::class, 'activity']);
// to edit profile data
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit']);
// patch method to update the profile
Route::patch('/profile/{user}', [ProfilesController::class, 'update']);
// for the search using ajax
Route::get("/search", [ProfilesController::class, 'search']);
// post method inside search to execute link
Route::post("/gotoprofile", [ProfilesController::class, 'gotoprofile']);
// to take each profile image
Route::get('/chat/{user}/profile', [ProfilesController::class, 'profileImage']);

// Post Controller Data
// home post index
Route::get('/', [PostsController::class, 'index']);
// the view to add new post
Route::get('/p/create', [PostsController::class, 'create']);
// store the post data inside database
Route::post('/p', [PostsController::class, 'store']);
// post detail view for each post
Route::get('/p/{post}', [PostsController::class, 'show']);
// the post method to like a post trigger toogle
Route::post('p/{post}/like', [PostsController::class, 'likePost']);

// Follows Controller Data
// the post method for follow a user to trigger the toogle
Route::post('follow/{user}', [FollowsController::class, 'store']);

// Comment Controller Data
// post the comment to the database
Route::post('p/{post}/comment', [CommentsController::class, 'create']);

// Chat Controller Data
// the chat template view
Route::middleware('auth:sanctum')->get('/chat', [ChatController::class, 'index']);
// for the room view
Route::middleware('auth:sanctum')->get('/chat/rooms', [ChatController::class, 'rooms']);
// to take all the messages inside a room
Route::middleware('auth:sanctum')->get('/chat/room/{roomId}/messages', [ChatController::class, 'messages']);
// to post the message to the database
Route::middleware('auth:sanctum')->post('/chat/room/{roomId}/message', [ChatController::class, 'newMessage']);
// to create a room link view
Route::middleware('auth:sanctum')->get('/chat/create/room', [ChatController::class, 'create']);
// to post the new room to the database
Route::middleware('auth:sanctum')->post('/create/room', [ChatController::class, 'store']);
