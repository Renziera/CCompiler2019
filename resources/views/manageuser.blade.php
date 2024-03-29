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
    <link rel="stylesheet" href="/css/manageuser.css">
    <!--    <link rel="stylesheet" href="/css/viewmemb.css">-->
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
                            <div class="card">
                                <div class="card-header">Manage User</div>

                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                            <th>Upgrade</th>
                                        </tr>
                                        @foreach($data as $user)
                                        <tr>
                                            <td>{{$user['name']}}</td>
                                            <td>{{$user['username']}}</td>
                                            <td>{{$user['role']}}</td>
                                            <td>{{$user['status']}}</td>
                                            <td>
                                                @if($user['role'] == 'Peserta')
                                                <form action="/admin/viewmembers" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{$user['username']}}">
                                                    <input type="submit" value="Members" class="btn btn-outline-info">
                                                </form>
                                                @else
                                                none
                                                @endif
                                            </td>
                                            <td>
                                                @if($user['role'] == 'Peserta')
                                                @if($user['status'] == 'New')
                                                <form action="/admin/rejectpeserta" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{$user['username']}}">
                                                    <input type="submit" value="Reject" class="btn btn-outline-danger" style="margin-top: 30px; width : 80.98px;">
                                                </form>
                                                @endif
                                                @if($user['status'] == 'Approved')
                                                none
                                                @else
                                                <form action="/admin/approvepeserta" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{$user['username']}}">
                                                    <input type="submit" value="Approve" class="btn btn-outline-success" style="margin-top: 10px; margin-bottom: 25px;">
                                                </form>
                                                @endif
                                                @else
                                                none
                                                @endif
                                            </td>
                                            <td>
                                                @if($user['role'] == 'Peserta')
                                                <form action="/admin/approve" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{$user['username']}}">
                                                    <input type="submit" value="Upgrade" class="btn btn-outline-primary">
                                                </form>
                                                @elseif($user['role'] == 'Reviewer')
                                                Upgraded
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
            </main>
        </div>
    </div>
</body>

</html>