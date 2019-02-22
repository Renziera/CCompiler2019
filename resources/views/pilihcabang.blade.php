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
    <link rel="stylesheet" href="/css/cabang.css">
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
                            <div class="card-header">Pilih Cabang Lomba-mu!</div>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="/peserta/cabang">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="cabang" class="col-md-4 col-form-label text-md-right" style="display:none;">{{ __('Cabang lomba yang diikuti') }}</label>
                                            <div class="all-lomba">
                                                <div class="pilih-lomba">
                                                    <div class="inside">
                                                        <div class="input-lomba">
                                                            <input type="radio" name="cabang" value="cp" required>
                                                        </div>
                                                        <div class="logo">
                                                            <img src="/image/icon-cp.png" alt="" width="70px">
                                                        </div>
                                                        <div class="nama-lomba">
                                                            Competitive Programming
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pilih-lomba">
                                                    <div class="inside">
                                                        <div class="input-lomba">
                                                            <input type="radio" name="cabang" value="ctf" required>
                                                        </div>
                                                        <div class="logo">
                                                            <img src="/image/icon-ctf.png" alt="" width="70px">
                                                        </div>
                                                        <div class="nama-lomba">
                                                            Capture the Flag
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pilih-lomba">
                                                    <div class="inside">
                                                        <div class="input-lomba">
                                                            <input type="radio" name="cabang" value="ppl" required>
                                                        </div>
                                                        <div class="logo">
                                                            <img src="/image/icon-ppl.png" alt="" width="70px">
                                                        </div>
                                                        <div class="nama-lomba">
                                                            Pengembangan Perangkat Lunak
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pilih-lomba">
                                                    <div class="inside">
                                                        <div class="input-lomba">
                                                            <input type="radio" name="cabang" value="iot" required>
                                                        </div>
                                                        <div class="logo">
                                                            <img src="/image/icon-iot.png" alt="" width="70px">
                                                        </div>
                                                        <div class="nama-lomba">
                                                            Internet of Things
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pilih-lomba">
                                                    <div class="inside">
                                                        <div class="input-lomba">
                                                            <input type="radio" name="cabang" value="ux" required>
                                                        </div>
                                                        <div class="logo">
                                                            <img src="/image/icon-ux.png" alt="" width="70px">
                                                        </div>
                                                        <div class="nama-lomba">
                                                            User eXperience
                                                        </div>
                                                    </div>
                                                </div>
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
                </div>
            </main>
        </div>
    </div>
</body>

</html>