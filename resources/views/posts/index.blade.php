<?php
use App\Http\Controllers\ProfilesController;
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
                                <div class="px-2 col-1 mt-2">
                                    <a href="/p/{{ $post->id }}/like" class=""> <img src="{{ asset('img/like.jpg') }}"
                                            height="21" width="21"></a>
                                </div>
                                {{-- if($user->profile->followers[0]->id == $user->id) --}}
                            @else
                                <div class="px-2 col-1 mt-2">
                                    <a href="/p/{{ $post->id }}/like" class=""><img
                                            src="{{ asset('img/unlike.png') }}" height="21" width="21"> </a>
                                </div>
                            @endif
                            <div class="p-2"><strong>{{ $post->likes->count() }}</strong> likes</div>

                        </div>


                        <div class="link-web p-2"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a>
                            {{ $post->caption }}
                        </div>

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
