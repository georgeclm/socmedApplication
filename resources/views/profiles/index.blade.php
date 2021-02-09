@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h6>{{ $errors->first() }}</h6>
            </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <h6>{!! \Session::get('success') !!}</h6>
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" width="160px" height="160px">
            </div>
            <div class="col-md-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4"> {{ $user->name }}</div>
                    </div>
                    @can('update', $user->profile)
                        <a href="/p/create" class="btn btn-outline-secondary"> Add new post</a>
                    @endcan

                </div>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-outline-success btn-sm">Edit Profile</a> <br>
                @endcan
                <div class="d-flex">
                    <!--Take the number posts count based on the id created  $user->posts->count()  $user->profile->followers->count() $user->profile->following->count()-->
                    <div class="p-3"><strong>0</strong> posts</div>
                    <div class="p-3"><strong>0</strong> followers</div>
                    <div class="p-3"><strong>0</strong> following</div>

                </div>
                <div class="p-1"><strong>{{ $user->profile->title ?? 'Coming soon' }} </strong></div>
                <div class="p-1">{{ $user->profile->description ?? '' }} </div>
                <div class="p-1"><a href="https://{{ $user->profile->url ?? '' }}" class="text-dark" target="_blank">
                        {{ $user->profile->url ?? '' }} </a></div>
                <!-- use this can function to make sure auth function will pop or not mention it is the same as before -->
                {{-- @foreach ($user->posts as $post)
                    <div>
                        <a href="/p/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}">
                        </a>
                    </div>

                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
