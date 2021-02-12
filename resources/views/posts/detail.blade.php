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
                            @if (!$follows)
                                {{-- @if ($user->profile->followers->count() == 0) --}}
                                <div class="col-2">
                                    <a href="/follow/{{ $post->user->id }}" class="btn btn-outline-primary"> Follow</a>
                                </div>
                                {{-- if($user->profile->followers[0]->id == $user->id) --}}
                            @else
                                <div class="col-2">
                                    <a href="/follow/{{ $post->user->id }}" class="btn btn-outline-dark"> Unfollow</a>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
                <hr>
                <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"><span
                                class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>
                <div class="d-flex">
                    @if (!$liked)
                        {{-- @if ($user->profile->followers->count() == 0) --}}
                        <div class="col-1 mt-2">
                            <a href="/p/{{ $post->id }}/like" class=""> <img src="{{ asset('img/like.jpg') }}"
                                    height="21" width="21"></a>
                        </div>
                        {{-- if($user->profile->followers[0]->id == $user->id) --}}
                    @else
                        <div class="col-1 mt-2">
                            <a href="/p/{{ $post->id }}/like" class=""> <img src="{{ asset('img/unlike.png') }}"
                                    height="21" width="21"></a>
                        </div>
                    @endif
                    <div class="p-2"><strong>{{ $post->likes->count() }}</strong> likes</div>

                </div>

            </div>

        </div>
    </div>

@endsection
