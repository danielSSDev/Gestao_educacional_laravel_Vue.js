<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('admin/js/admin.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <style type="text/css">
        @media print{
            .hidden-print{
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="margin-bottom: 30px;background-color: #32373b !important ">
            <div class="container">
                <a class="navbar-brand" style="color: #eeee;" href="{{ url('/admin/users') }}">
                    {{ config('app.name', 'SONDaniel') }}
                </a>

                <div class="btn-group" role="group" aria-label="Button group with nested ">
                    <div class="btn-group" role="group">
                        <a id="btnGroupDrop1" type="button" style="color: #eeee;background-color:rgb(50, 55, 59);margin-left: 10px;"href="{{ route('admin.users.index') }}" class="nav-link" aria-haspopup="true" aria-expanded="false">
                            Usuario
                        </a>
                    </div>

                    <div class="btn-group" role="group">
                        <a id="btnGroupDrop1" type="button" style="color: #eeee;background-color:rgb(50, 55, 59);margin-left: 10px;" href="{{ route('admin.disciplina.index') }}" class="nav-link" aria-haspopup="true" aria-expanded="false">
                            Disciplina
                        </a>
                    </div>

                    <div class="btn-group" role="group">
                        <a id="btnGroupDrop1" type="button" style="color: #eeee;background-color:rgb(50, 55, 59);margin-left: 10px;" href="{{ route('admin.turma.index') }}" class="nav-link" aria-haspopup="true" aria-expanded="false">
                            Turma
                        </a>
                    </div>
                </div>

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
                                <a class="nav-link"  style="color: #eeee;" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: #eeee;" href="{{ route('register') }}">{{ __('Cadastra-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: #eeee;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
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

        <main class="col-12">
            @if(Session::has('mensagem'))
                <div class="container hidden-print">
                    <div class="alert  {{ Session::get('mensagem')['class'] }}">
                        {{ Session::get('mensagem')['msg'] }}
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
