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

    
    @if (Route::has('login'))
    <div class="language-select">
        <select class="b-0" id="select_lang">
        <option value="es">Castellano</option>
        <option value="ca">Catalan</option>
        <option value="en">Ingles</option>
        </select>
    </div>
    <div class="container card">
        <div>
            <h1 class="app_name">Instagram</h1>
            <p class="eslogan">Poner un eslogan</p>
        </div>
        @auth
            <a class="btn btn-primary" href="{{ url('/home') }}">Volver</a>
        @else
            <a class="btn btn-primary" href="{{ route('login') }}" disabled>Iniciar Sessión</a>
            <div class="card mt-3 p-2">
                <a class="btn btn-link" href="{{ route('register') }}">
                    ¿No tienes una cuenta? 
                    <span>{{ __('Regístrate') }}</span>
                </a>
            </div>
        @endauth
    </div>
    @endif
    <footer>
        <p>Made with</p>
        <a href="https://laravel.com/" target="_blank">
        <img src="{{ asset('img/laravel-icon.png') }}" alt="Avatar" class="avatar"></a>
    </footer>
</body>
</html>
