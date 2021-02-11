@extends('layouts.app')
@section('content') <br><br>
    <div class="container" style="width: 65%">
        <div class="row">
            <div class="col-sm-8">
                <img src="/storage/uploads/{{ $post->image }}" height="300" width="300">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="col-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle"
                            style="max-width: 40px;">
                    </div>
                    <div class="col-4">
                        <div class="link-web"><a href="/profile/{{ $post->user->id }}"><strong>
                                    {{ $post->user->name }}</strong>
                            </a></div>
                    </div>
                    <div class="col-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">Follow</a>
                    </div>
                </div>
                <hr>
                <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"><span
                                class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>
            </div>
        </div>
    </div>

@endsection
