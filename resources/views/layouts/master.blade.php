<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','placeholder')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
        <script src="{{ asset('js/app.js') }}" defer></script>

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
        /*color: white;*/
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



.collapse ul ul li
{
    position:relative;
    margin:0;
    padding:0
}





.collapse ul ul ul
{
    display:none;
  position:absolute; 
    top:100%;
    left:0;
  background:green; 
    padding:0
}

.collapse ul ul ul li
{
/*  float:none; */
    min-width:100px;
    color: white;
    margin-left: 20px;
    font-size: 16px;
    margin-top: 10px;
    /*font-*/
    text-transform: uppercase;

}
.collapse ul ul ul li a
{
/*  float:none; */
    min-width:100px;
    color: white;
    margin-left: 20px;
    font-size: 16px;
    margin-top: 10px;
    /*font-*/
    text-transform: uppercase;

}
/*.collapse ul ul ul li a:hover >li{
    border-bottom-style: groove;
    border-bottom-width: 1px;
    border-bottom-color:white;
}*/




.collapse ul ul li:hover > ul
{
    display:block;
    /*text-decoration: underline;*/
    color: white;
    font-weight: 5px;
    /*height: 80px;*/
    border-bottom-style: groove;
    border-bottom-width: 1px;
    border-bottom-color:white;
    /*background-color: */


}

</style>
</head>
<body>
  
<!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top" style="background-color:green !important; color:white !important" >
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
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="color: white !important;">
                        <li><a href="/home" class="page-scroll" style="color: white !important;">Home</a></li>
                        <li><a href="#about" class="page-scroll" style="color: white !important;">About</a></li>
                       <li><a href="#features" class="page-scroll" style="color: white !important;">services</a></li>

                        {{-- <li><a href="#services" class="page-scroll" style="color: white !important;">Services</a></li> --}}
                        <li><a href="#contact" class="page-scroll" style="color: white !important;">Contact</a></li>
                        <li><a href="/blog" class="page-scroll" style="color: white !important;">Blog</a></li>
                       <li><a href="/viewevents" class="page-scroll" style="color: white !important;">Events</a></li>

                        @if(auth()->user()->verifiedadmin == 'verified') 
                        {{-- a verified user --}}
                        <li><a href="/dashboard" style="color: white !important;">Dashboard</a></li>  
                        @elseif(auth()->user()->verifiedadmin == 'notverified' &&auth()->user()->role == 'admin' && auth()->user()->created_by == 'user' )
                        {{-- an main admin --}}
                          <li><a href="/dashboard" style="color: white !important;">Dashboard</a></li> 
                         @elseif(auth()->user()->verifiedadmin == 'notverified' &&auth()->user()->role == 'admin' && auth()->user()->created_by == 'admin' )
                         {{-- other admins --}}
                          <li><a href="/dashboard" style="color: white !important;">Dashboard</a></li> 
                        @else

                        @endif
                        <li><a style="color: white!important;" >
                                    {{ Auth::user()->f_name }} <span class="caret"></span>
                                </a>
                            <ul>
                               
                                <li>
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="color: white;font-weight:800; font-style: Arial;">
                                    {{ __('Logout') }}
                                </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </li>
                            </ul>
                        </li>
                     
                     
                    {{--  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white !important;">
                                    {{ Auth::user()->f_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="color: white !important;">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                        <li>
                     <form action="/search" method="POST" >
                        @csrf
                  <div class="searchbar">
                                        <input class="search_input" type="text" name="q" placeholder="Search...">
                        <a href="/search" class="search_icon"><i class="" style="background-image:url({{url('/image/Searcha.ico')}}); background-size: ; background-repeat: no-repeat; color: #353b48; ">d</i></a>
                        <button type="submit" style="display: none;"></button>

                    </div>
                    
                </form>
                </li>
                      
                       
         </ul>
     </div>
        
        
        @else
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/home" class="page-scroll" style="color: white !important;">Home</a></li>
                <li><a href="#about" class="page-scroll" style="color: white !important;">About</a></li>
                <li><a href="#features" class="page-scroll" style="color: white !important;">Services</a></li>

                {{-- <li><a href="#services" class="page-scroll" style="color: white !important;">Services</a></li> --}}
                <li><a href="#contact" class="page-scroll" style="color: white !important;">Contact</a></li>
                <li><a href="/blog" class="page-scroll" style="color: white !important;">Blog</a></li>
                 <li><a href="/viewevents" class="page-scroll" style="color: white !important;">Events</a></li>

                <li> <a href="{{ route('login') }}" style="color: white !important;">Login</a></li>
                <li> <a href="{{ route('register') }}" style="color: white !important;">Register</a></li>
                 <li>
                     <form action="/search" method="POST" >
                        @csrf
                  <div class="searchbar">
                                        <input class="search_input" type="text" name="q" placeholder="Search...">
                        <a href="/search" class="search_icon"><i class="" style="background-image:url({{url('/image/Searcha.ico')}}); background-size: ; background-repeat: no-repeat; color: #353b48; ">d</i></a>
                        <button type="submit" style="display: none;"></button>

                    </div>
                    
                </form>
                </li>
           
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
<!-- Font Awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Roboto Webfont -->
{{-- <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'> --}}
  
<!-- Search Link -->
<style type="text/css">
    /* Basic Style */
body{
  font-size: 20px;
  /*font-family: Roboto;*/
  font-weight: 300;
}

.post{
  color: #FC2121;
  text-decoration: none;
  /*border: 4px solid #FC2121;*/
  padding: 10px 15px;
  line-height: 3;
  -webkit-transition: all .3s ease;
       -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
         -o-transition: all .3s ease;
                  transition: all .3s ease;
}

.post:hover{
  color: #FFF;
  background: #FC2121;
  -webkit-transition: all .3s ease;
       -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
         -o-transition: all .3s ease;
                  transition: all .3s ease;  
}
    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding-left:40px;
    padding-right:10px;
    padding-top: 10px;
    padding-bottom:5px;
    /*width: 40px;*/

    }

    .search_input{
    color: white;
    font-size:20px;
    border: 0;
    outline: 0;
    background: none;
    width: 5px;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 20px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    /*background: white;*/
    color: #e74c3c;
    }

    .search_icon{
    /*height: 40px;*/
    /*width: 60px;*/
    float: right;
    margin-right: 2px;
    display: flex;
    justify-content: center;
    align-items: center;
    /*border-radius: 50%;*/
    color:white;
    }
    .search_icon i{
        width:40px;
        /*height: 0%;*/
    }


/* Search Style */ 

</style>



  


@yield('content')
@include('layouts.footer')
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
    $('a[href="#search"]').on('click', function(event) {                    
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });            
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });            
});

</script>