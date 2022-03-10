<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Fotos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

</head>

<body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('about') }}">{{ __('welcome.about') }}</a>
                </div>
            </div>
        </nav>
    </header>

    @if (Route::has('login'))
    <div class="shunshine-container">

        <div class="shunshine-container__left-gallery">
            <div class="floating-users">
                <div class="image-column">
                    <img class="posts-image" src="{{ asset('img/profile/user-8.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-9.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-10.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-1.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-2.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-3.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-4.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-5.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-6.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-7.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-8.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-9.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-10.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-7.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-8.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-9.jpg') }}" alt="User">
                    <img class="posts-image" src="{{ asset('img/profile/user-10.jpg') }}" alt="User">
                </div>
            </div>
        </div>

            <div class="container card">
                @auth
                    <div class="card mb-2">
                        @if (Auth::user()->image)
                            <div class="logged-user-image">
                                <img src="{{ route('user.avatar', ['filename' => Auth::user()->image]) }}" alt="Avatar"
                                    class="avatar">
                            </div>
                        @else
                            <div class="container-avatar">
                                <img src="{{ asset('img/default-user.png') }}" alt="Avatar" class="avatar">
                            </div>
                        @endif
                        <p class="text-center mt-2 mb-2">{{ Auth::user()->nick }}</p>
                    </div>
                    <a class="btn back-btn" href="{{ url('/home') }}">{{__('welcome.go_back')}}</a>
                    <a class="btn profile-btn mt-2" href="{{ route('user.profile', ['id'=>Auth::user()->id]) }}">{{__('welcome.profile')}}</a>
                @else
                <img src="{{ asset('img/app-icon.png') }}" id="app-icon" class="d-inline-block align-top" alt="">
                    <div>
                        <h1 class="app_name">Laravel</h1>
                        <!--<p class="eslogan">{{ __('welcome.slogan') }}</p>-->
                        <br>
                    </div>
                    <a class="btn btn-primary" href="{{ route('login') }}" disabled>{{ __('login.login') }}</a>
                    <div class="card mt-3 p-2">
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('login.user_not_have_account') }}
                        </a>
                    </div>
                    @include('includes.translate')
                @endauth
            </div>
  

        </div>
    @endif
    
    <!--
    <a href="https://www.flaticon.com/free-icons/people" target="_blank" title="people icons">Eucalyp - Flaticon</a>
    --->
    <footer>
        <div>
            <!---<p>{{-- __('welcome.made_with') --}}</p>--->
            <a href="https://laravel.com/" target="_blank">
                <img src="{{ asset('img/laravel.svg') }}" alt="Avatar" class="avatar">
            </a>
        </div>
    </footer>
</body>

</html>
