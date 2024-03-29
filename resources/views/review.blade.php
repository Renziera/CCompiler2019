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
    <link rel="stylesheet" href="/css/review.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
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
            <div class="bg-review">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card-header">
                                <h1>Review Proposal</h1>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <th>Nama Tim</th>
                                            <th>Cabang</th>
                                            <th>Proposal</th>
                                            <th>Status</th>
                                            <th class="penilaian">Penilaian</th>
                                        </tr>
                                        @foreach($data as $proposal)
                                        <tr>
                                            <td>{{$proposal['nama']}}</td>
                                            <td>{{$proposal['cabang']}}</td>
                                            <td>
                                                <a href="{{$proposal['link']}}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                            </td>
                                            <td>
                                                @if($proposal['reviewed'] === true)
                                                Reviewed
                                                @else
                                                Belum direview
                                                @endif
                                            </td>
                                            <td>
                                                @if($proposal['reviewed'] === true)
                                                <br>
                                                Kriteria 1 : {{$proposal['kriteria1']}} <br>
                                                Kriteria 2 : {{$proposal['kriteria2']}} <br>
                                                Kriteria 3 : {{$proposal['kriteria3']}} <br>
                                                Kriteria 4 : {{$proposal['kriteria4']}} <br>
                                                Kriteria 5 : {{$proposal['kriteria5']}} <br>
                                                Total : {{$proposal['total']}} <br>
                                                @else
                                                <form action="/review/submit" method="post">
                                                    @csrf
                                                    <input type="hidden" name="proposal_id" value="{{$proposal['id']}}">
                                                    Kriteria 1
                                                    <input type="number" name="kriteria1" min="0" max="10">
                                                    <br>
                                                    Kriteria 2
                                                    <input type="number" name="kriteria2" min="0" max="10">
                                                    <br>
                                                    Kriteria 3
                                                    <input type="number" name="kriteria3" min="0" max="10">
                                                    <br>
                                                    Kriteria 4
                                                    <input type="number" name="kriteria4" min="0" max="10">
                                                    <br>
                                                    Kriteria 5
                                                    <input type="number" name="kriteria5" min="0" max="10">
                                                    <br>
                                                    <input type="submit" value="Submit Review">
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>