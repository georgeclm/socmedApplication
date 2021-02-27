<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function store(Post $post)
    {
        // for validation as usual post so not just in html but laravel to
        $data = request()->validate([
            'comment' => 'required',
        ]);
        $comment = new Comment([
            'comment' => $data['comment'],
            'post_id' => $post->id,
            'user_id' => auth()->user()->id
        ]);
        return $comment->save();
    }
}
