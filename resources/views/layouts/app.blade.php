<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="robots" content="all,follow">--}}
    <title>{{ config('app.name', 'Boutique | Ecommerce bootstrap template') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   {{--  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('frontend/vendor/lightbox2/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel2/assets/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <livewire:styles/>
    @yield('styles')

</head>
<body>
    <div id="app" class="page-holder {{request()->routeIs('frontend.product')?'bg-light':null}}">
        @include('partials.frontend.header')
        {{--
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
        --}}
        <div class="container">
            @yield('content')
        </div>
        @include('partials.frontend.footer')
    </div>

    <!--  Modal -->

    @include('partials.frontend.model')
    <!-- Scripts -->
    <livewire:scripts/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />
   @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{asset('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('frontend/js/front.js')}}"></script>
    <script>

        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }

        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @yield('scripts')

</body>
</html>
