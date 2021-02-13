<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/logoicon.ico') }}" />

    <title>SocMedApp</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <x-header />
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
        <main class="py-0">
            @yield('content')
        </main>
        <br><br><br><br><br><br><br><br>
        <x-footer />
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>
<script>
    function forceLower(strInput) {
        strInput.value = strInput.value.toLowerCase();
    }​

</script>
<style>
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

</style>

</html>
