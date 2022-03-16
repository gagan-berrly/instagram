<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="#">Gagan</a>
            </div>
            <div class="main_list" id="mainListDiv">
                <ul>
                    <li><a href="{{route('welcome')}}">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="about#credits">Credits</a></li>
                    <li><a href="{{route('login')}}">Log In</a></li>
                </ul>
            </div>
            <div class="media_button">
                <button class="main_media_button" id="mediaButton">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <section class="home"></section>

    <section id="credits">
        <div>
            <img src="{{ asset('img/flaticon/instagram.png') }}" alt="Avatar" width=100 class="avatar">
            <a href="https://www.flaticon.es/iconos-gratis/instagram" title="instagram iconos">Instagram iconos creados por Laisa Islam Ani - Flaticon</a>
        </div>
    </section>

    <script>
        var mainListDiv = document.getElementById("mainListDiv"),
            mediaButton = document.getElementById("mediaButton");

        mediaButton.onclick = function() {

            "use strict";

            mainListDiv.classList.toggle("show_list");
            mediaButton.classList.toggle("active");

        };
    </script>
</body>

</html>
