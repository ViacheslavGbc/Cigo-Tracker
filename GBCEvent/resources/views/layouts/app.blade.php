<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--mine bootstrap--> <meta name="viewport" content="width=device-width, initial-scale=1">
 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GBCEvents') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  
     <!--mine fontawesome?--> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <!--mine fontawesome?--> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <!--mine fontawesome kit! --><script src="https://kit.fontawesome.com/bb250377d6.js" crossorigin="anonymous"></script>
  
    <script type="text/javascript"> 
     
  
        function display_c(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct()',refresh)
        }
        
        function display_ct() {
        var x = new Date()
        document.getElementById('ct').innerHTML = x;
        display_c();
         }
    </script>
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
     <!--mine bootstrap <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <style>
    input:read-only {
    background-color: #e9ecef;
    }
    body{
        background-color: #d4d8f9;
    }
    .navbar{
        background-color: #e0e3f9;
    }
    #stamp{
        font-size: 30px;
    }
    .new{
        border-radius: 50%;
        font-size: larger;
        font-weight: bold;
    }
    </style>

</head>

<body onload=display_ct();>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

              

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <table>
                     <th><td>    
           
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                 <!--               <div class="navbar_brand">
                                    </br>
                                   <a href="{{ url('/') }}"><img src="{{ URL::asset('images/Logo1.jpg') }}"/> 
                     </td><td>               
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="{{ URL::asset('images/KN95resized2.jpg') }}"/></a>
                                    </br>
                     </td><td>                
                                </div>  -->
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      <!--  @guest
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest  -->
                    </ul>
                     </td></th></table>
                    
                    </div>
                
            </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
