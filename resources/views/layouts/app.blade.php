<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layoutApp.css') }}" rel="stylesheet">
    @yield('styles')


</head>

<body>
    <button class="openbtn" onclick="openNav()">&#x27B2;</button>
    <div id="app">

        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="{{route('home.index')}}">{{__('lang.labels.all.homepage')}}</a>
            <a href="{{route('cars.index')}}">{{__('lang.cars.all.title')}}</a>
            @can('isAdmin')
            <a href="{{route('users.index')}}">{{__('lang.users.all.title')}}</a>
            @endcan
            <a href="{{route('cars.searchForm')}}">{{__('lang.labels.all.search')}}</a>

            <div class="bottom-info"> 
                <a href="" onclick="return false;">{{ strtoupper(Auth::user()->name) }}</a>
                <i class="font-weight-light text-secondary">{{ strtoupper(Auth::user()->role) }}</i>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
          </div>

        <main class="py-4">
            @yield('content')
        </main>

        
    </div>

    

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        }
        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        }
      </script>
    <script type="text/javascript">
        @yield('javascript') 
        
    </script>
    @yield('js-files')
</body>

</html>