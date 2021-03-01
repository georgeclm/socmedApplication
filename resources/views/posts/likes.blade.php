<div class="container row align-items-baseline mx-auto">
    @foreach ($profiles as $profile)
        <div class="col-2">
            <img src="{{ $profile->profileImage() }}" class="rounded-circle" width="50px" height="50px">
        </div>
        <div class="col-6">
            <div class="link-web h5"><a
                    href="{{ route('profile.index', $profile->user) }}">{{ $profile->user->name }}</a>
            </div>
            <div class="text-muted h5">{{ $profile->title }}</div>
        </div>


</div>
<hr>
@endforeach
</div>
