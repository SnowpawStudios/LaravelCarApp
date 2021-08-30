<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ABC CarFleets</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ABC CarFleets
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                            
                            @auth
                            <li><a href="/info" class="nav-link{{ Request::is('info') ? ' active' : ''}}">My Profile</a></li>
                            @endauth                           
                            <li><a href="/car" class="nav-link{{ Request::is('car') ? ' active' : ''}}">Cars</a></li>
                            
                            @if (Auth::user() && auth()->user()->role !=null)
                                <li ><a href="/admin" class="nav-link">Admin</a></li>
                            @endif
                            
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- MESSAGES ON FRONTEND--}}
        @yield('messages')

        {{-- MAIN CONTENT --}}
        <main class="main" style="">
            
            @yield('content')
        </main>
        <!-- Footer -->
        <footer id="footer" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col text-center py-4">
                        <h3>ABC CARFLEETS </h3>
                        <p>Copyright &copy; <span><?php echo date("Y") ?></span></p>
                        <p>Designed by Sayan Meath: <span><a href="">sayan@gg.com</a></span></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>    
</body>
</html>
