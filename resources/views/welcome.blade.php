<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fotos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">

                    <div class="card border-0">
                        <div class="card-header border-0 bg-dark text-white">
                          Bienvenido!
                        </div>
                        <div class="card-body">
                          <blockquote class="blockquote mb-0">
                            <p>Comparte tus fotos con otros usuarios!</p>
                            <footer class="blockquote-footer">Autor <cite title="Source Title">Desconocido</cite></footer>
                          </blockquote>
                        </div>
                      </div>

                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner welcomeview-images">
                          <div class="carousel-item active">
                            <img src="{{asset('img/connect-friends.jpeg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Comparte!</h5>
                              <p>Comparte momentos con los demas usuarios!</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('img/connect.jpeg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Conecta!</h5>
                              <p>Conecta con otros usuarios!</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('img/share-love.jpeg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Dale Like!</h5>
                              <p>Muestra tu amor a los demas!</p>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
            
                    <div class="login-register-buttons">
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    
                                    <button type="button" class="btn btn-outline-primary"><a href="{{ url('/home') }}">Home</a></button>
                                @else
                                    
                                    <button type="button" class="btn btn-primary"><a href="{{ route('login') }}">Login</a> </button>
                                    <button type="button" class="btn btn-primary"><a href="{{ route('register') }}">Register</a> </button>
                                    
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


       
        
    </body>
</html>
