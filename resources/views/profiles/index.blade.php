@extends('layouts.app')
@section('title', "{$user->profile->title} ({$user->name}) - SocMed")
@section('content')
    <div class="container" style="width: 65%">
        <div class="row">
            <div class="col-md-4 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" width="200px" height="200px">
            </div>
            <div class="col-md-8 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center">
                        <div class="col-9 h4"> {{ $user->name }}</div>
                        @if ($user->id == Auth::user()->id)
                            @can('update', $user->profile)
                                <div class="col-8">
                                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-outline-success btn-sm">Edit
                                        Profile</a>
                                </div>
                            @endcan
                        @else
                            {{-- <x-follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" /> --}}
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @endif
                    </div>

                    @can('update', $user->profile)
                        <a href="/p/create" class="btn btn-outline-secondary"> Add new post</a>
                    @endcan

                </div>
                <div class="d-flex">
                    <!--Take the number posts count based on the id created   $user->profile->followers->count() $user->profile->following->count()-->
                    <div class="p-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="link-web p-3"><strong><a
                                href="/profile/{{ $user->id }}/followers">{{ $user->profile->followers->count() }}</strong>
                        followers</a></div>
                    <div class="link-web p-3"><a
                            href="/profile/{{ $user->id }}/following"><strong>{{ $user->following->count() }}</strong>
                            following</a></div>

                </div>
                <div class="p-1"><strong>{{ $user->profile->title ?? 'Coming soon' }} </strong></div>
                <div class="p-1">{{ $user->profile->description ?? '' }} </div>
                <div class="p-1"><a href="https://{{ $user->profile->url ?? '' }}" class="text-dark" target="_blank">
                        {{ $user->profile->url ?? '' }} </a></div>
                <!-- use this can function to make sure auth function will pop or not mention it is the same as before -->
            </div>
        </div>
        <hr> <br>
    </div>

    <div class="container" style="width: 65%">
        <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-6 col-md-4 mb-3">
                    <a href="/p/{{ $post->id }}">
                        <div class="bg-image hover-overlay">

                            <img src="/storage/uploads/{{ $post->image }}" height="300" width="300" class="image">
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
