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
                                <img src="{{ $post->user->profile->profileImage() }}" width="23" height="23"
                                    class="rounded-circle">
                                <strong> {{ $post->user->name }}</strong>
                            </a>
                        </span>
                        <img src="/storage/uploads/{{ $post->image }}" height="400" width="400">
                        <div class="link-web p-2"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a>
                            {{ $post->caption }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ $profileImage }}" width="80" height="80" class="rounded-circle">
                    </div>
                    <div class="col-1 mt-4">
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
