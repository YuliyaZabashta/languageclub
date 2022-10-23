<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Вход для администратора</title>
    <link rel="icon" type="image/png" sizes="512x512" href="/images/logo.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <div class="header_box_position">  
                        <div class="header_box">
                            <div class="header_logo"><a href="/"><h1>
                                Language Education Club</h1><a>    
                            </div>
                            <div class="dropdown">  
                                <!-- Authentication Links -->
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>     
        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
