<?php
use App\Http\Controllers\ProfilesController;
$limit = 1;
if (Auth::user()) {
$profileImage = ProfilesController::takeProfileImg();
}
?>
@extends('layouts.app')
@section('content') <br><br>
    <div class="container-fluid" style="width: 65%">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mx-auto mb-5" style="width: 402px">
                        <span class="link-web p-2 ml-2">
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="{{ $post->user->profile->profileImage() }}" width="27" height="27"
                                    class="rounded-circle">
                                <strong> {{ $post->user->name }}</strong>
                            </a>
                        </span>
                        <img src="/storage/uploads/{{ $post->image }}" height="400" width="400">
                        <input type="hidden"
                            value="{{ $liked = auth()->user()
    ? auth()->user()->like->contains($post->id)
    : false }}">
                        <div class="d-flex">
                            @if (!$liked)
                                {{-- @if ($user->profile->followers->count() == 0) --}}
                                <div class="px-2">
                                    <a href="/p/{{ $post->id }}/like" class=""> <img src="{{ asset('img/like.jpg') }}"
                                            height="25" width="25"></a>
                                </div>
                                {{-- if($user->profile->followers[0]->id == $user->id) --}}
                            @else
                                <div class="px-2">
                                    <a href="/p/{{ $post->id }}/like" class=""> <img
                                            src="{{ asset('img/unlike.png') }}" height="25" width="25"></a>
                                </div>
                            @endif
                            <div class="px-2">
                                <a href="/p/{{ $post->id }}" class=""> <img src="{{ asset('img/commenticon.png') }}"
                                        height="25" width="25"></a>
                            </div>
                        </div>
                        <div class="pt-2 px-2"><strong>{{ $post->likes->count() }}</strong> likes</div>
                        <div class="link-web px-2"><a href="/profile/{{ $post->user->id }}">
                                <strong>{{ $post->user->name }}</strong>
                            </a>
                            {{ $post->caption }}
                        </div>
                        <input type="hidden" value="{{ $comments = $post->comments }}">
                        @if (count($comments) > 2)
                            <div class=" px-2"><a href="/p/{{ $post->id }}" class="text-muted"
                                    style="text-decoration: none">View all
                                    {{ count($comments) }} comments</a></div>
                        @endif
                        @foreach ($comments as $comment)
                            <div class="link-web px-2"><a
                                    href="/profile/{{ $comment->user->id }}"><strong>{{ $comment->user->name }}</strong></a>
                                {{ $comment->comment }}
                            </div>
                            @if ($limit++ == 2)
                                @break
                            @endif
                        @endforeach
                        <hr>
                        <form method="POST" action="p/{{ $post->id }}/comment">
                            @csrf
                            <div class="d-flex pb-3">
                                <div class="col-10 px-3">
                                    <input type="text" name="comment" class="form-control" id="comment"
                                        placeholder="Add a comment..." required autofocus autocomplete="comment">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ $profileImage }}" width="80" height="80" class="rounded-circle">
                    </div>
                    <div class="col-1 mt-3">
                        <div class="link-web">
                            <a href="/profile/{{ auth()->user()->id }}">
                                <strong>{{ auth()->user()->name }}</strong></a>
                        </div>
                        {{ auth()->user()->profile->title }}

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
