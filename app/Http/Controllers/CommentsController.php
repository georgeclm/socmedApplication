<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Post $post)
    {
        // for validation as usual post so not just in html but laravel to
        $data = request()->validate([
            'comment' => 'required',
        ]);
        $userId = Auth::user()->id;
        $comment = new Comment([
            'comment' => $data['comment'],
            'post_id' => $post->id,
            'user_id' => $userId
        ]);
        $comment->save();
        return Redirect::back();
    }
}
