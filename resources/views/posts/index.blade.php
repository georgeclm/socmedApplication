@extends('layouts.app')
@section('content') <br><br>
    <div class="container-fluid" style="width: 65%">
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
        {{-- <div class="row pt-2">
            <div class="col-6 offset-3">
                <p>
                    <span class="link-web">
                        <a href="/profile/{{ $post->user->id }}">
                            <strong> {{ $post->user->name }}</strong>
                        </a>
                    </span>
                </p>
            </div>
        </div>

        <div class="row  pb-4">
            <div class="col-6 offset-3">
                <img src="/storage/uploads/{{ $post->image }}" height="400" width="400">
                {{ $post->caption }}

            </div>

        </div> --}}
        {{-- <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div> --}}
    </div>
    </div>

@endsection
