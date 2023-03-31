<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Abdelrahman of Web it">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('asstes/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('asstes/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('asstes/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asstes/css/owl.theme.default.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">

        @include('layouts/inc/frontendnavbar')


        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts/inc/frontendfooter')
    </div>

    <script src="{{ asset('asstes/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asstes/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('asstes/js/scripts.js') }}"></script>
    <script src="{{ asset('asstes/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</body>

</html>
