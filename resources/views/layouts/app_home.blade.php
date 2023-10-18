<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layoutHome.css') }}" rel="stylesheet">
    @yield('styles')
    
</head>

<body>
  
    <div id="app">
      
        <nav class="navbar navbar-expand-md   sticky-top navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <ul class="nav navbar-nav">
                                <li class="nav-item active"><a class="nav-link" href="#">{{__('lang.labels.all.homepage')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#About">{{__('lang.labels.home.about')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#contact">{{__('lang.labels.home.contact')}}</a></li>
                          </ul>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('cars.index')}}">{{__('lang.labels.home.main')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main>
            @yield('content')
        </main>
        <footer class="bg-light">
            
          <div class="container contactBlock">
            <div class="row">
                        <div class="col-md-6 col-sm-12"> 
                            <h4 class="text-center">{{__('lang.labels.home.findus')}}</h4>
                            <div class="row"> 
                                <div class="col-md-6 col-sm-6  text-center my-2" data-aos="zoom-in" data-aos-duration="2000">
                                    <a href="https://www.facebook.com" target="_blank">Facebook <i class="fa-brands fa-facebook fa-2xl"></i></a>
                                </div>
                                <div class="col-md-6 col-sm-6  text-center my-2" data-aos="zoom-in" data-aos-duration="2000">
                                    <a href="https://www.youtube.com" target="_blank">YouTube <i class="fa-brands fa-youtube fa-2xl"></i></a>
                                </div>
                                <div class="col-md-6 col-sm-6  text-center my-2" data-aos="zoom-in" data-aos-duration="2000">
                                    <a href="https://www.twitter.com" target="_blank">Twitter <i class="fab fa-twitter-square fa-2xl"></i></a>
                                </div>
                                <div class="col-md-6 col-sm-6  text-center my-2" data-aos="zoom-in" data-aos-duration="2000">
                                    <a href="https://www.instagram.com" target="_blank">Instagram <i class="fa-brands fa-instagram fa-2xl"></i></a>
                                </div>
                            </div>
                        </div>
                        <div id='contact' class="col-md-6 col-sm-12 kontakt text-right text-sm-center">
                            <h4 class="text-center">{{__('lang.labels.home.contact')}}</h4>
                            {{__('lang.labels.home.phonenr')}}:<br> 123 123 123<br>
                            {{__('lang.labels.home.email')}}:<br> napisz@gmail.com<br>
                        </div>
                </div>
        
        </div>
        
        </footer>
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
    <script type="text/javascript">
        @yield('javascript') 
        
    </script>
    @yield('js-files')
</body>

</html>