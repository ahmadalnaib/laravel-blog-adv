<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

               @if(Auth::user())
               @if(Auth::user()->admin)

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"href="{{route('posts.create')}}">
                            {{__('CreatePost')}}
                            </a>
                            <a class="dropdown-item"href="{{route('home')}}">
                                {{__('Dashbored')}}
                            </a>
                            <a class="dropdown-item"href="{{route('posts.index')}}">
                            {{__('ShowPosts')}}
                            </a>
                            <a class="dropdown-item"href="{{route('category.create')}}">
                            {{__('CreateCategory')}}
                            </a>
                            <a class="dropdown-item"href="{{route('category.index')}}">
                            {{__('Categories')}}
                            </a>
                            <a class="dropdown-item"href="{{route('tags.create')}}">
                            {{__('CreateTags')}}
                            </a>
                            <a class="dropdown-item"href="{{route('tags.index')}}">
                            {{__('Tags')}}
                            </a>
                            <a class="dropdown-item"href="{{route('users.index')}}">
                            {{__('Users')}}
                            </a>
                            <a class="dropdown-item"href="{{route('users.create')}}">
                            {{__('CreateUser')}}
                            </a>
                            <a class="dropdown-item"href="{{route('settings.index')}}">
                            {{__('Settings')}}
                            </a>
                            <a class="dropdown-item"href="{{route('posts.trashed')}}">
                            {{__('TrashedPosts')}}
                            </a>

                        </div>
                    </li>

                </ul>

   @endif
                @endif








                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
{{--                admin--}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                                    {{ Auth::user()->name }}
                                </a>


                                {{--------------------}}
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

        <main >


                @yield('content')



        </main>
    </div>
</body>
</html>
