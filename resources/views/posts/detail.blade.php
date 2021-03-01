@extends('layouts.app')
@section('title', "{$post->user->profile->title} on SocMed: {$post->caption}")

@section('content') <br><br>
    <div class="container border" style="width: 65%">
        <div class="row mt-2">
            <div class="col-8 m-auto text-center">
                <img src="/storage/uploads/{{ $post->image }}" height="570" width="570">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="col-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle" width="35"
                            height="35">
                    </div>
                    <div class="col-4">
                        <div class="link-web"><a href="{{ route('profile.index', $post->user) }}"><strong>
                                    {{ $post->user->name }}</strong>
                            </a></div>
                    </div>
                    <div class="col-2">
                        @if ($post->user->id == Auth::user()->id)
                        @else
                            <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>

                        @endif

                    </div>
                </div>
                <hr>
                <div class="scrollable">
                    <div class="link-web pb-1"><a
                            href="{{ route('profile.index', $post->user) }}"><strong>{{ $post->user->name }}</strong></a>
                        {{ $post->caption }}
                    </div>
                    <input type="hidden" value="{{ $comments = $post->comments }}">
                    @foreach ($comments as $comment)
                        <div class="link-web pb-1"><a
                                href="{{ route('profile.index', $comment->user) }}"><strong>{{ $comment->user->name }}</strong></a>
                            {{ $comment->comment }}
                        </div>
                    @endforeach
                </div>
                <hr>
                <input type="hidden"
                    value="{{ $liked = auth()->user()
    ? auth()->user()->like->contains($post->id)
    : false }}">
                <like-detail post-id="{{ $post->id }}" liked="{{ $liked }}"
                    count="{{ $post->likes->count() }}"></like-detail>
                <hr>
                <comment-button post-id="{{ $post->id }}"></comment-button>
            </div>
            <x-likes />

        </div>
    </div>

@endsection
