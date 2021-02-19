<?php
use App\Http\Controllers\ProfilesController;
$limit = 1;
if (Auth::user()) {
$profileImage = ProfilesController::takeProfileImg();
}
?>
@extends('layouts.app')
@section('title', 'SocMedApp')

@section('content')

    <div class="container-fluid" style="width: 65%">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mx-auto mb-5" style="width: 402px">
                        <span class="link-web p-2">
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="{{ $post->user->profile->profileImage() }}" width="27" height="27"
                                    class="rounded-circle">
                                <strong> {{ $post->user->name }}</strong>
                            </a>
                        </span>
                        <input type="hidden"
                            value="{{ $liked = auth()->user()
    ? auth()->user()->like->contains($post->id)
    : false }}">

                        {{-- <img src="/storage/uploads/{{ $post->image }}" height="400" width="400"> --}}
                        <like-button post-id="{{ $post->id }}" liked="{{ $liked }}" image="{{ $post->image }}"
                            count="{{ $post->likes->count() }}">
                        </like-button>
                        {{-- <div class="pt-2 px-2"><strong>{{ $post->likes->count() }}</strong> likes</div> --}}
                        <div class="link-web px-2"><a href="/profile/{{ $post->user->id }}">
                                <strong>{{ $post->user->name }}</strong>
                            </a>
                            {{ $post->caption }}
                        </div>
                        <input type="hidden" value="{{ $comments = $post->comments }}">
                        @if (count($comments) > 2)
                            <div class="px-2"><a href="/p/{{ $post->id }}" class="text-muted"
                                    style="text-decoration: none">View all
                                    {{ count($comments) }} comments</a></div>
                        @endif
                        <input type="hidden" value="{{ $limit = 1 }}">
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
                        <comment-button post-id="{{ $post->id }}"></comment-button>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mt-5 pt-2">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ $profileImage }}" width="80" height="80" class="rounded-circle">
                    </div>
                    <div class="col-6 mt-3">
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
