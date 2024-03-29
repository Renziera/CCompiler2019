<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CCompiler') }}</title>

    <!--Favicon-->
    <link rel="icon" type="image/png" href="/image/favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--    <link rel="stylesheet" href="/css/cabang.css">-->
    <link rel="stylesheet" href="/css/daftarmember.css">
</head>

<body>
    <div class="bg-cabang">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
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
                            <div class="card-header2">Yuk, Daftarin Anggotamu!</div>

                            <div class="card-body">
                                @if(isset($pesan))
                                {{ $pesan }}
                                <br>
                                <br>
                                @endif
                                <form method="POST" action="/peserta/member" enctype="multipart/form-data">
                                    @csrf

                                    <div class="anggota">
                                        <label for="member" class="label-anggota">{{ __('Anggota 1') }}</label>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                        <div class="col-md-6">
                                            <input id="nama" type="text" class="form-control" name="nama1" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                                        <div class="col-md-6">
                                            <input id="nim" type="text" class="form-control" name="nim1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="text" class="form-control" name="prodi1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row last">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('KTM') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="file" accept="image/*" class="form-control" name="ktm1" required>
                                        </div>
                                    </div>

                                    <div class="anggota">
                                        <label for="member" class="label-anggota">{{ __('Anggota 2') }}</label>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                        <div class="col-md-6">
                                            <input id="nama" type="text" class="form-control" name="nama2" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                                        <div class="col-md-6">
                                            <input id="nim" type="text" class="form-control" name="nim2" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="text" class="form-control" name="prodi2" required>
                                        </div>
                                    </div>

                                    <div class="form-group row last">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('KTM') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="file" accept="image/*" class="form-control" name="ktm2" required>
                                        </div>
                                    </div>

                                    <div class="anggota">
                                        <label for="member" class="label-anggota">{{ __('Anggota 3') }}</label>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                        <div class="col-md-6">
                                            <input id="nama" type="text" class="form-control" name="nama3" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                                        <div class="col-md-6">
                                            <input id="nim" type="text" class="form-control" name="nim3" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="text" class="form-control" name="prodi3" required>
                                        </div>
                                    </div>

                                    <div class="form-group row last">
                                        <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('KTM') }}</label>

                                        <div class="col-md-6">
                                            <input id="prodi" type="file" accept="image/*" class="form-control" name="ktm3" required>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="card-button">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
