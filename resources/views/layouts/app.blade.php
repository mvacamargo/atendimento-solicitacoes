<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://getbootstrap.com/docs/4.3/examples/dashboard/dashboard.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.3/examples/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- Menu Superior -->
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0"
                href="{{ url('/home') }}">{{ config('app.name', 'Atendimento de Solicitações') }}</a>
            <ul class="navbar-nav px-3 justify-content-end">
                @guest
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('profile') }}">Perfil</a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <!-- Menu Lateral -->
                @include('layouts.menu')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @if (Session::has('flash_message_success'))
                    <div class="alert alert-success">
                        {{Session::get('flash_message_success')}}
                    </div>
                    @endif
                    @if (Session::has('flash_message_error'))
                    <div class="alert alert-error">
                        {{Session::get('flash_message_error')}}
                    </div>
                    @endif
                    <!-- Conteudo -->
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>