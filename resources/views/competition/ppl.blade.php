<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CCompiler') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/kompetisi.css">
</head>

<body>
    <div class="bg-lomba">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light nav-css">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/image/ccomp%20hd-white.png" alt="" width="100px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn2 btn-primary2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <a href="#lomba" style="text-decoration: none; color: #F9FBFC;">Lomba</a>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ url('/kompetisi/cp') }}">Competitive Programming</a>
                                        <a class="dropdown-item" href="{{ url('/kompetisi/ctf') }}">Capture The Flag</a>
                                        <a class="dropdown-item" href="{{ url('/kompetisi/ppl') }}">Pengembangan Perangkat Lunak</a>
                                        <a href="{{ url('/kompetisi/iot') }}" class="dropdown-item">Internet of Things</a>
                                        <a href="{{ url('/kompetisi/ux') }}" class="dropdown-item">User eXperience</a>
                                    </div>
                                </div>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #F9FBFC;">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: #F9FBFC;">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Beranda') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="logo-kompetisi">
                                        <img src="/image/icon-ppl.png" alt="" width="100px">
                                    </div>
                                    <div class="card-name">
                                        <div class="nama-kompetisi">
                                            Pengembangan Perangkat Lunak
                                        </div>
                                        <div class="desc-kompetisi">
                                            Pengembangan Perangkat Lunak bertujuan untuk menguji kemampuan peserta dalam mengembangkan ide kreatif untuk memberikan solusi penyelesaian masalah  dalam bentuk perangkat lunak berkualitas tinggi. Produk perangkat lunak yang dihasilkan harus bisa dioperasikan sehingga dampaknya dapat terukur.
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="desc2-kompetisi">
                                        <div class="prize">
                                            <div class="title-prize">
                                                Prize :
                                            </div>
                                            <div class="desc-prize">
                                                <table>
                                                    <tr>
                                                        <td>Juara I</td>
                                                        <td>: Rp. 1.000.000,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juara II</td>
                                                        <td>: Rp. 600.000,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juara III</td>
                                                        <td>: Rp. 400.000,00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="contact-person">
                                            <div class="title-contact">
                                                Contact Person :
                                            </div>
                                            <div class="desc-contact">
                                                Line: @ju76hb<br>
                                                Instagram: @ccompiler2019<br>
                                                No HP: 0813817432
                                            </div>
                                        </div>
                                    </div>
                                    <div class="guide-book">
                                        <div class="click">
                                            click for
                                        </div>
                                        <div class="download-book">
                                            <a href="#" class="btn btn-primary">Guide Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>