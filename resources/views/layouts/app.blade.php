<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SocMedApp</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="/js/app.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Bootstrap 5 CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!--Ajax Search-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
    <x-header />
    <div id="app">
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
        <main class="py-3">
            @yield('content')
        </main>
        <br><br><br><br><br><br><br><br>
        <x-footer />
    </div>
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>
<script>
    function forceLower(strInput) {
        strInput.value = strInput.value.toLowerCase();
    }
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#navbar-example'
    })

</script>
<style>
    body {
        position: relative;
    }

    .bg-image:hover .image {
        filter: brightness(80%);
    }

    .link-web a {
        color: #000;
        text-decoration: none;
        transition: color 0.5s;
    }

    .link-web a:hover {
        transition: 1s;
        border-bottom: 0px;
        color: #646786;
    }

    .scrollable {
        height: 300px;
        /* or any value */
        overflow-y: auto;
    }

</style>

</html>
