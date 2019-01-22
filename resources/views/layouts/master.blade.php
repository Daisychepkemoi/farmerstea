<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Litein Tea Factory</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/forms.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css"> --}}

    {{-- Stylesheet {{ asset('css/proposal.css') }} --}}
    ==================================================
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    #menu{
        /*background-color: green !important;*/
        color: white;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>
<body>
  
<!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
             <div class="logo">
              <img class="" src="{{ URL::to('image/oflogo.jpg') }}">
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
         
           </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
               @if (Route::has('login'))
               <div class="top-right links">
                @auth
                
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                {{-- @endauth --}}
            {{-- </div> --}}
        </li>
        
        @else
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#features" class="page-scroll">Features</a></li>
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#services" class="page-scroll">Services</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
                <li> <a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register')}}">Register</a></li>
                @endif
            </ul>
        </div>
        
        

        
        
    </div>
    @endif
    @endauth
</ul>
</div>
<!-- /.navbar-collapse --> 
</div>
</nav>
@yield('content')
</body>
</html>
