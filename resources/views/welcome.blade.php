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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

</head>

<body>


    @if (Route::has('login'))
        <section class="banner">
            <div class="container banner-carousel">

                <div id="carouselExampleSlidesOnly" class="carousel slide banner-carousel--container" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img/carousel/camera-picture-photo.jpg') }}" alt="Photo with Camera">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/carousel/friends-girls.jpg') }}" alt="Girls">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/carousel/friends-jump.jpg') }}" alt="Friends Jump">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/carousel/friends.jpg') }}" alt="Friends">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/carousel/girl-photo.jpg') }}" alt="Girl Photo">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/carousel/sunset-girl-photo.jpg') }}" alt="Sunset">
                        </div>
                    </div>
                </div>

                <div class="banner-text">
                    <h1>Laravel</h1>
                    <p>Comparte fotos, comparte momentos<br> <strong>Empieza ahora con Laravel</strong></p>
                    <div class="banner-text--buttons">
                        @auth
                            <button><a href="{{ url('/home') }}">Volver</a></button>
                        @else
                            <button><a href="{{ route('login') }}">Iniciar Session</a></button>
                            <button><a href="{{ route('register') }}">Registrarse</a></button>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    @endif
</body>

</html>
