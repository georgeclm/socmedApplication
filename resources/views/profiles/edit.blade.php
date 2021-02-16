@extends('layouts.app')
@section('title', 'Edit Profile - SocMed')

@section('content')
    <br>
    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Edit Profile</h4>
                <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title') ?? $user->profile->title }}" required autofocus autocomplete="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Bio</label>
                        <input type="text" name="description" class="form-control" id="description"
                            value="{{ old('description') ?? $user->profile->description }}" autofocus
                            autocomplete="description">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Website</label>
                        <input type="text" name="url" class="form-control" id="url"
                            value="{{ old('url') ?? $user->profile->url }}" autofocus autocomplete="url">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save Profile</button>
                </form>
            </div>
        </div>

    </div>

@endsection
