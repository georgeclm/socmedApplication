<div>
    <nav class="navbar navbar-expand navbar-light bg-muted sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <img src="{{ asset('img/logoicon.ico') }}" alt="" width="33" height="33"
                    class="d-inline-block align-top"> SocMed</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Tsoggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('posts.index') }}"><img
                                src="{{ asset($home) }}" width="23" height="23" class="d-inline-block align-top"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('activity') }}"><img
                                src="{{ asset($activity) }}" width="23" height="23"
                                class="d-inline-block align-top"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('chat') }}"><img
                                src="{{ asset($dm) }}" width="23" height="23"
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
                                <select class="livesearch form-control" name="livesearch" required
                                    onchange="this.form.submit()"></select>
                            </div>
                        </div>
                    </form>
                @endguest

                @guest
                    <div class="link-web mr-3 p-2">
                        <a class="" href="{{ route('login') }}">Login</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="link-web ml-3">
                            <a class="" href="{{ route('register') }}">Sign Up</a>
                        </div>
                    @endif

                @else
                    <span class="dropstart">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span><img src="{{ $profileImg }}" width="25" height="25" class="rounded-circle">
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" href="{{ route('profile.index', auth()->user()) }}">
                                    My Profile
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
