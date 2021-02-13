<?php
use App\Http\Controllers\ProfilesController;
if (Auth::user()) {
$profileImage = ProfilesController::takeProfileImg();
}
?>

<div>
    <nav class="navbar navbar-expand navbar-light bg-muted sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logoicon.ico') }}" alt="" width="33" height="33"
                    class="d-inline-block align-top mr-5"> SocMedApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Tsoggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><img
                                src="{{ asset('img/homeicon.png') }}" alt="" width="23" height="23"
                                class="d-inline-block align-top mr-5"></a>
                    </li>
                    @guest
                    @else
                        {{-- <li class="nav-item">
                                <a class="nav-link" href="/cashier">Cashier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/history">History</a>
                            </li> --}}
                    @endguest
                </ul>
                @guest
                @else
                    <form action="/gotoprofile" method="POST" class='form-control' style="border: none !important">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <select class="livesearch form-control" name="livesearch" required></select>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-outline-success" type="submit">Visit</button>
                            </div>
                        </div>
                    </form>
                @endguest

                @guest
                    <div class="mr-3 p-2">
                        <a class="btn btn-outline-success btn-sm" href="/login">Login</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="ml-3">
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif

                @else
                    <span class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span><img src="{{ $profileImage }}" width="25" height="25" class="rounded-circle">
                            </span>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" href="/profile/{{ Auth::user()->id ?? 'nouser' }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </span>

                @endguest
            </div>
        </div>
    </nav>

</div>
