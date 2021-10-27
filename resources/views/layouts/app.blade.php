<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<ul class="sidenav" id="mobile">
    @guest
        <li><a href="{{ route('login') }}">Connexion</a></li>
    @else
        <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                Déconnexion
            </a></li>
    @endguest
</ul>
<main>
    @yield('content')
</main>

@yield('javascript')
</body>
</html>
