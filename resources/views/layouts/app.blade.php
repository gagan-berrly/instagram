<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fotos') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top mb-5">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" style="color:#00106a; font-size:25px;">
                    Sharavel
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-bar-link" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('login.login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('register.register') }}</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}"><i class="bi bi-plus-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <!--<span class="badge badge-pill badge-danger" style="float:right;margin-bottom:-10px;">1</span>-->
                            <a href="{{route('user.likes')}}" class="nav-link"><i class="bi bi-chat-square-heart"></i></a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.users')}}" class="nav-link"><i class="bi bi-person-plus-fill"></i></i></a>
                        </li>

                        <li class="nav-link-user-profile-image">
                            <a href="{{ route('config') }}">@include('includes.avatar')</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle drop-menu-title" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->nick }}</b> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=" {{ route('user.profile', ['id' => Auth::user()->id]) }} ">
                                        <i class="bi bi-person-circle" style="font-size:20px;"></i>
                                        <span>Mi perfil</span>
                                    </a>
   
                                    <a class="dropdown-item" href=" {{ route('config') }} ">
                                        <i class="bi bi-gear-fill" style="font-size:20px;"></i>
                                        <span>Configuracion</span>
                                   </a>

                                    <a href="{{route('welcome')}}" class="dropdown-item sunshine-user">
                                        <i class="bi bi-stars" style="font-size:20px;"></i>
                                        <span>Me</span>
                                    </a>


                                   @if(Auth::user() && Auth::user()->role == 'admin')
                                   <a class="dropdown-item" href=" {{ route('admin.user') }} " target="_blank">
                                        <i class="bi bi-wrench-adjustable-circle-fill" style="font-size:20px;"></i>
                                        <span>Admin</span>
                                   </a>
                                   @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        
                                    </form>

                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
