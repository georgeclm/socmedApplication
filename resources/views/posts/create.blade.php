@extends('layouts.app')
@section('content')
    <br><br>
    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Add New Post</h4>
                <form method="POST" action="/p" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"
                            required aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" name="caption" class="form-control" id="caption" value="{{ old('caption') }}"
                            required autofocus autocomplete="caption">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Add New Post</button>
                </form>
            </div>
        </div>

    </div>

@endsection
