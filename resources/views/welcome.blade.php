@extends('layouts.master')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Litein Tea Factory</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}

    <!-- Bootstrap -->
            <link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">

        <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" type="text/css"  href="{{asset('css/bootstrap.css')}}">
   
    

    <!-- Styles -->
  <style type="text/css">
     
     #blog {
margin-top: 150px;  
width: 75%;    }
      #menu {
    padding:0px 5px 5px 0px;
        background: green;

    transition: all 0.8s;
}
#menu .navbar-success {
    background-color: #fff;
    /*background-color: red;*/

    border-color: rgba(231, 231, 231, 0);
    box-shadow: 0 0 10px rgba(0,0,0,0.15)
}
#menu a.navbar-brand {
    font-family: 'Raleway', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: #333;
    /*color: white;*/
    text-transform: uppercase;
}
#bs-example-navbar-collapse-1 li a{
    color: white !important;
}
.navbar-default .navbar-nav > .active > a:after, .navbar-default .navbar-nav > .active > a:hover:after, .navbar-default .navbar-nav > .active > a:focus:after {
    display: block !important;
    position: absolute !important;
    left: 0 !important;
    bottom: -1px !important;
    width: 100% !important;
    height: 2px !important;
    background: linear-gradient(to right, white 0%, white 100%) !important;
    content: "" !important;
    transition: width 0.2s !important;
}
.caption p{
    font-size: 16px !important;
    font-weight: 5px !important;
    font-family: arial;
}
  

  </style>  
{{-- </style> --}}
</head>
<body>
  
<!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-success navbar-fixed-top ">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
             <div class="logo">
              <img class="" src="{{ URL::to('image/logo.jpg') }}">
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       
           </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right" id="navi">
               @if (Route::has('login'))
               <div class="top-right links">
                @auth
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" id="navi">
                        <li><a href="#features" class="page-scroll">Features</a></li>
                        <li><a href="#about" class="page-scroll">About</a></li>
                        <li><a href="#services" class="page-scroll">Services</a></li>
                        <li><a href="#contact" class="page-scroll">Contact</a></li>
                        <li><a href="/welcome" class="page-scroll">Blog</a></li>
                        <li><a href="/dashboard">Dashboard</a></li>                        
                     <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->f_name }} <span class="caret"></span>
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
                      
                       
         </ul>
     </div>
        
        
        @else
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-success navbar-right" id="navi" >
                <li><a href="#features" class="page-scroll">Features</a></li>
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#services" class="page-scroll">Services</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
                <li><a href="/welcome" class="page-scroll">Blog</a></li>
                <li> <a href="{{ route('login') }}">Login</a></li>
                <li> <a href="{{ route('register') }}">Register</a></li>
                {{-- @if (Route::has('register')) --}}
           
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

    {{-- <body> --}}
{{-- @section('content') --}}

        <div class="container" id="blog">
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                      {{-- <p></p> --}}
                          {{-- <a class="btn btn-success" href="#">Read More</a> --}}

                {{-- <div class="alert alert-danger" role="alert" v-if="error"> --}}
    {{-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> --}}
</div>
            </div>
            <div id="products" class="row list-group">
                                    @foreach($posts as $post)

                <div class="item col-xs-4 col-lg-4" ">
    <div class="thumbnail text-center">
        <img class="group list-group-image" src="{{$post->image}}" />
        <div class="caption">
            {{-- <h4 class="group inner list-group-item-heading">@{{ post.title }}</h4> --}}
            <p class="mb-0">{{  str_limit($post->body, 70, '....')}}</p>
            {{-- <p class="group inner list-group-item-text">{!! Str::characters($post->body, 9,'....')  !!}</p> --}}
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="">Created {{ $post->created_at->diffForHumans() }}</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success" href="/post/{{$post->id}}">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach

            </div>
        </div>
            {{$posts->links()}}

        {{-- # resources/views/books/insert.blade.php --}}

    {{-- </body> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script> --}}
{{-- <script src="/js/app.js"></script> --}}
{{-- </html> --}}
{{-- @endsection --}}
</div>
</body>
</html>

