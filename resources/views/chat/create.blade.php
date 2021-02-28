@extends('layouts.app')
@section('title', 'SocMed - Create Room')
@section('content')
    <br><br>
    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Create New Room</h4>
                <form method="POST" action="{{ route('room.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Room Name</label>
                        <input type="text" name="name" class="form-control" id="name" required autofocus
                            autocomplete="name">
                    </div>
                    @foreach ($profiles as $profile)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checked[]"
                                value="{{ $profile->user->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $profile->title }}
                            </label>
                        </div>
                        <hr>
                    @endforeach


                    <button type="submit" class="btn btn-outline-primary">Create Room</button>
                </form>
            </div>
        </div>

    </div>


@endsection
