<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/quizs-removebg-preview.png') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('styles-links')

    <script src="https://kit.fontawesome.com/f416851b63.js" crossorigin="anonymous"></script>

</head>

<body>

    <header></header>

    <main>
        {{-- <div class="container padding-top d-flex flex-column gap-3 align-items-center max-vh"> --}}
            @yield('main-content')
        {{-- </div> --}}
    </main>

    <footer></footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')

</body>

</html>
