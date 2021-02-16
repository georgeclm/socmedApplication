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
                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle" width="35"
                            height="35">
                    </div>
                    <div class="col-4">
                        <div class="link-web"><a href="/profile/{{ $post->user->id }}"><strong>
                                    {{ $post->user->name }}</strong>
                            </a></div>
                    </div>
                    <div class="col-2">
                        @if ($post->user->id == Auth::user()->id)
                        @else
                            {{-- <x-follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}" /> --}}
                            <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>

                        @endif

                    </div>
                </div>
                <hr>
                {{-- <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"><span
                                class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p> --}}
                <div class="link-web pb-2"><a
                        href="/profile/{{ $post->user->id }}"><strong>{{ $post->user->name }}</strong></a>
                    {{ $post->caption }}
                </div>
                <input type="hidden" value="{{ $comments = $post->comments }}">
                @foreach ($comments as $comment)
                    <div class="link-web pb-1"><a
                            href="/profile/{{ $comment->user->id }}"><strong>{{ $comment->user->name }}</strong></a>
                        {{ $comment->comment }}
                    </div>
                @endforeach
                <hr>
                <input type="hidden"
                    value="{{ $liked = auth()->user()
    ? auth()->user()->like->contains($post->id)
    : false }}">
                <like-button post-id="{{ $post->id }}" liked="{{ $liked }}"></like-button>

                <div class="pt-2 px-1"><strong>{{ $post->likes->count() }}</strong> likes</div>


                <hr>
                <comment-button post-id="{{ $post->id }}"></comment-button>
            </div>

        </div>
    </div>

@endsection
