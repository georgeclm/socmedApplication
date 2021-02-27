@extends('layouts.app')
@section('title', "{$user->profile->title} ({$user->name}) - SocMed")
@section('content')
    <div class="container" style="width: 65%">
        <div class="row justify-content-between align-items-baseline">
            <div class="col-md-12 text-center">
                <div class="h3">Followers</div>
                <hr>
            </div>
            @foreach ($profiles as $profile)
                <div class="col-md-4 p-5 m-auto text-center">
                    <img src="{{ $profile->profileImage() }}" class="rounded-circle" width="100px" height="100px">
                </div>
                <div class="col-md-6 pt-5">
                    <div class="link-web h4"><a
                            href="{{ route('profile.index', $profile->user) }}">{{ $profile->user->name }}</a>
                    </div>
                    <div class="text-muted h4">{{ $profile->title }}</div>
                </div>
                <input type="hidden"
                    value="{{ $follows = auth()->user()
    ? auth()->user()->following->contains($profile->user->id)
    : false }}">
                <div class="col-2">
                    @if ($profile->user->id == Auth::user()->id)
                    @else
                        <follow-button user-id="{{ $profile->user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif

                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
