<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CCompiler</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Script-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        html,
        body {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-color: #F9FBFC;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 100px;
            top: 22px;
        }

        .content {
            text-align: center;
            display: none;
        }

        .card {
            background-color: #F9FBFC;
            border: none;
        }

        .links>a {
            margin-top: 20px;
            font-family: 'Montserrat';
            color: white;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            font-weight: 700;
            font-size: 13pt;
        }

        .links a:hover {
            transform: scale(2.0);
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        @media screen and (max-width: 480px) {
            .top-right {
                position: absolute;
                right: 10px;
                top: 35px;
            }
        }
    </style>
</head>

<body>

    <!--
    <div class="flex-center position-ref">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Beranda</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
-->
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/image/ccomp%20hd-white.png" alt="" width="100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Route::has('login'))
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}" style="color: #F9FBFC;">Beranda</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color: #F9FBFC;">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" style="color: #F9FBFC;">Register</a>
                    </li>
                    @endif
                    @endauth
                </ul>
                @endif
            </div>
        </div>
    </nav>


    <!--
    <div class="nav-logo">
        <a href="#"><img src="/image/ccomp%20hd-white.png" alt="" width="100px"></a>
    </div>
-->

    <!--    header start-->
    <header>
        <div class="welcome">
            WELCOME
        </div>
        <div class="container">
            <div class="row" style="text-align: left;">
                <div class="col-md-6">
                    <div class="header-kiri">
                        <div class="title">
                            C-COMPILER<br>2019
                        </div>
                        <div class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius molestiae, eligendi obcaecati vitae temporibus illo natus corporis suscipit aliquam, nihil dolores, iure inventore deleniti ullam harum consequuntur amet, cupiditate cum officia maxime numquam. At, molestias, quia voluptatibus odio fugit officiis.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-kanan">
                        <img src="/image/ilus-welcome.png" alt="" width="90%">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--    header end-->

    <!--    lomba start-->
    <section class="lomba">
        <div class="lomba-title">
            LOMBA
        </div>
        <div class="card">
            <div class="card-lomba">

                <div class="card-img">
                    <img src="/image/icon-cp.png" alt="" width="90px">
                </div>
                <div class="card-name">
                    Competitive<br>Programming
                </div>
                <div class="button">
                    <a href="{{ url('/kompetisi/cp') }}">Read more</a>
                </div>
            </div>
            <div class="card-lomba">

                <div class="card-img">
                    <img src="/image/icon-ctf.png" alt="" width="90px">
                </div>
                <div class="card-name">
                    Capture<br>the Flag
                </div>
                <div class="button">
                    <a href="{{ url('/kompetisi/ctf') }}">Read more</a>
                </div>
            </div>
            <div class="card-lomba">

                <div class="card-img">
                    <img src="/image/icon-ppl.png" alt="" width="90px">
                </div>
                <div class="card-name">
                    Pengembangan<br>Perangkat Lunak
                </div>
                <div class="button">
                    <a href="{{ url('/kompetisi/ppl') }}">Read more</a>
                </div>
            </div>
            <div class="card-lomba">

                <div class="card-img">
                    <img src="/image/icon-iot.png" alt="" width="90px">
                </div>
                <div class="card-name">
                    Internet<br>of Things
                </div>
                <div class="button">
                    <a href="{{ url('/kompetisi/iot') }}">Read more</a>
                </div>
            </div>
            <div class="card-lomba">

                <div class="card-img">
                    <img src="/image/icon-ux.png" alt="" width="90px">
                </div>
                <div class="card-name">
                    User<br>eXperience
                </div>
                <div class="button">
                    <a href="{{ url('/kompetisi/ux') }}">Read more</a>
                </div>
            </div>
        </div>
    </section>
    <!--    lomba end-->

    <!--    gallery start-->
    <section class="gallery">
        <div class="gallery-text">
            GALERI
        </div>
        <div class="card-gallery">
            <div class="gallery-img">
                <img src="/image/galeri-1.jpg" alt="" width="300px">
            </div>
            <div class="gallery-img">
                <img src="/image/galeri-2.jpg" alt="" width="300px">
            </div>
            <div class="gallery-img">
                <img src="/image/galeri-3.png" alt="" width="300px" height="199.21px">
            </div>
            <div class="gallery-img">
                <img src="/image/no-image.jpg" alt="" width="300px" height="199.21px">
            </div>
            <div class="gallery-img">
                <img src="/image/no-image.jpg" alt="" width="300px" height="199.21px">
            </div>
            <div class="gallery-img">
                <img src="/image/no-image.jpg" alt="" width="300px" height="199.21px">
            </div>
        </div>
    </section>
    <!--    gallery end-->

    <!--    footer start-->
    <footer>
        <div class="footer-card">
            <div class="social-media">
                <a href="" class="fab fa-facebook fa-2x"></a>
                <a href="" class="fab fa-instagram fa-2x"></a>
                <a href="" class="fab fa-twitter fa-2x"></a>
                <a href="" class="fab fa-linkedin-in fa-2x"></a>
            </div>
            <div class="organized">
                <div class="organized-text">
                    Organized by:
                </div>
                <div class="organized-logo">
                    <img src="/image/ugm-putih.png" alt="" width="70px">
                    <img src="/image/komatik%20hd-white.png" alt="" width="70px">
                </div>
            </div>
            <div class="copyright">
                &#169; 2019 C-Compiler UGM
            </div>
        </div>
    </footer>
</body>

</html>