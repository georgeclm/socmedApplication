@extends('layouts.app')
@section('title', "{$user->profile->title} ({$user->name}) - SocMed")
@section('content')
    <div class="container" style="width: 65%">
        <div class="row justify-content-between align-items-baseline">
            <div class="col-md-12 text-center">
                <div class="h3">Activity</div>
                <hr>
            </div>
            @foreach ($posts as $post)
                @foreach ($post->likes as $like)
                    @if ($like->id != Auth::user()->id)
                        <div class="col-md-4 p-5 m-auto text-center">
                            <img src="{{ $like->profile->profileImage() }}" class="rounded-circle" width="100px"
                                height="100px">
                        </div>
                        <div class="col-md-6 pt-5">
                            <div class="link-web h5"><a
                                    href="/profile/{{ $like->id }}"><strong>{{ $like->name }}</strong>
                                    liked your photo</a>
                            </div>
                        </div>
                        <div class="col-2 mt-4">
                            <img src="/storage/uploads/{{ $post->image }}" height="125" width="125">
                        </div>
                        <hr>
                    @endif
                @endforeach
            @endforeach
            @foreach ($profiles as $profile)
                <div class="col-md-4 p-5 m-auto text-center">
                    <img src="{{ $profile->profileImage() }}" class="rounded-circle" width="100px" height="100px">
                </div>
                <div class="col-md-6 pt-5">
                    <div class="link-web h5"><a
                            href="/profile/{{ $profile->user->id }}"><strong>{{ $profile->user->name }}</strong>
                            started following you</a>
                    </div>
                </div>
                <input type="hidden"
                    value="{{ $follows = auth()->user()
    ? auth()->user()->following->contains($profile->user->id)
    : false }}">
                <div class="col-2">
                    @if ($profile->user->id == Auth::user()->id)
                    @else
                        <follow-button user-id="{{ $profile->user->id }}" follows="{{ $follows }}">
                        </follow-button>
                    @endif

                </div>
                <hr>
            @endforeach


        </div>
    </div>
@endsection
