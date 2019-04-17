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
    <!--    <link rel="stylesheet" href="/css/viewmemb.css">-->
    <link rel="stylesheet" href="/css/peserta.css">
</head>

<body>
    <div class="bg-viewmemb">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light nav-css navbar-laravel">
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
                            <div class="header">Dashboard Peserta</div>
                            <div class="card">

                                <div class="card-body">
                                    @if($pending)
                                    Tim anda sedang menunggu pengesahan dari panitia.
                                    @else
                                    Tim anda berhasil terdaftar.
                                    @if($adaProposal)
                                    <br>
                                    Proposal sudah terupload dan dalam proses.
                                    @else
                                    <br>
                                    <br>
                                    @if($cabang == 'cp')
                                    <button class="btn btn-primary">Masuk Platform Mooshak</button>
                                    @endif
                                    @if($cabang == 'ctf')
                                    <button class="btn btn-primary">Masuk Platform AsGama</button>
                                    @endif
                                    @endif
                                    @endif
                                    <br>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6 text-center">
                                                <div class="name" style="padding-top: 10px;">{{$name}}</div>
                                                <h4>Nama Tim</h4>
                                            </div>
                                            <div class="col-sm-6 text-center">
                                                <div class="name" style="padding-top: 10px;">
                                                @if($cabang == 'cp')
                                                Competitive Programming
                                                @elseif($cabang == 'ctf')
                                                Capture The Flag
                                                @elseif($cabang == 'ppl')
                                                Pengembangan Perangkat Lunak
                                                @elseif($cabang == 'iot')
                                                Internet of Things
                                                @elseif($cabang == 'ux')
                                                User eXperience
                                                @endif
                                                </div>
                                                <h4>Cabang Lomba</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @if(!$adaProposal)
                                <br>
                                @if($sudahWaktu)
                                Silahkan masuk ke platform
                                <br>
                                @if($cabang == 'cp')
                                <a href="https://cp.komatikugm.web.id" target="_blank" rel="noopener noreferrer">Masuk Platform CP</a>
                                @else
                                <a href="https://ctf.asgama.web.id" target="_blank" rel="noopener noreferrer">Masuk Platform CTF</a>
                                @endif
                                @else
                                Silahkan tunggu waktu mulai
                                @endif
                                @else
                                <br>
                                <a href="{{$proposal}}" target="_blank" rel="noopener noreferrer">Lihat proposal</a>
                                <br>
                                @if(!$sudahWaktu)
                                Upload ulang proposal
                                <br>
                                <form method="POST" action="/peserta/proposal" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="proposal" id="proposal" accept=".pdf">
                                    <input type="submit" value="Upload Ulang">
                                </form>
                                <br>
                                @endif
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="foreach text-center " style="margin-top: 20px;">
                    @foreach($members as $member)
                    <div class="card-member">
                        <div class="card-name">
                            Nama: {{$member->nama}}
                        </div>
                        <div class="card-nim">
                            NIM: {{$member->nim}}
                        </div>
                        <div class="card-prodi">
                            Prodi: {{$member->prodi}}
                        </div>
                        <div class="card-button">
                            <a href="{{$member->ktm}}" target="_blank" rel="noopener noreferrer">Lihat KTM</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</body>

</html>