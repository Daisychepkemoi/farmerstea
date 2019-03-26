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
    /*background-color: #fff;*/
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
            @if (session()->has('success'))
                     <div class="alert alert-success" style="text-transform:normal; background: #356c37 !important; color:white ; ">
                      {{ session('success') }}
                    </div>
                    @endif
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                   
</div>
            </div>
            <div id="products" class="row list-group">
                    @auth
               @if(auth()->user()->f_name == $auth->created_by)
                <a href="/editpostview/{{$posts->id}}" style="float: right; margin-right: 20px; width: 150px;"><button class="btn-primary" onclick="return confirm('Are yOou sure you want to edit?')">Edit</button></a>
                <a href="/deletepost/{{$posts->id}}" style="float: right; margin-right: 20px; width: 150px;"><button class="btn-danger" onclick="return confirm('Are yOou sure you want to Delet?')">Delete</button></a>
                @endif
                @endauth
                <div class="item col-xs-8 col-lg-8" ">
                 
                <div class="thumbnail text-center">
                    <img class="group list-group-image" src="{{url('uploads/'.$posts->image)}}"  />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading text-justify">{{ ucfirst($posts->title) }}</h4>
                        <p class="mb-0" style="text-align: justify;">{!! nl2br(e(ucfirst($posts->body))) !!}</p>
                        <p>Written By : {{$auth->created_by}}</p>
                        {{-- <p class="group inner list-group-item-text">{!! Str::characters($posts->body, 9,'....')  !!}</p> --}}
                        <div class="row">
                            {{-- <div class="col-xs-12 col-md-6"> --}}
                                <p class="">Created {{ $posts->created_at->diffForHumans() }}</p>
                            </div>
                            <br><br><br>
                           
                            
                    </div>
                </div>
                 <div class="" style="background-color: ; height: 200px;">
                                <button class="btn-primary center-block" style="width:200px;">Comment</button>
                            <form class="" method="POST" action="/post/{{$posts->id}}/comment/">
                            @csrf  
                                <textarea class="form-control center-block" name="body" style="width: 650px; height:150px;">  </textarea>
                                <button class="btn-success center-block" style="width: 100px"> Post </button>
                            </form>   
                            </div>
                <br>
                <br>
                <br>
                <br>
                <div class="item col-xs-12 col-lg-12" ">
                <div class="thumbnail text-center">
                    <h1>Comment (s)</h1>
                    <style type="text/css">
                        #longpost{
                            display: none;
                        }
                        #shortpost {
                            display: block;
                        }
                    </style>
                   @foreach($comments as $comment)
                   
                   <div style="background-color: ; float: left; width: 30%">
                       <img src="{{ URL::to('image/profileimg.png') }}" style="width: 100px;height: 100px;border-radius: 50px !important; float: right">
                   </div>
                   <div class="caption" style="background-color: ">
                     <p class="" style="padding-left: 250px !important;text-align: left; font-weight: 800;">{{ $comment->f_name}} {{$comment->l_name}}</p>
                        <p class="mb-0 text-justify" id="shortpost">{!! ucfirst(nl2br(e(strip_tags(\Illuminate\Support\Str::words($comment->body, 100,'...'))))) !!} </p>
                        @if(str_word_count($comment->body) > 100)
                    <button class="btn-primary" onclick="openpost()"> Read More</button>
                        @else
                        @endif 
                        <p class="mb-0 text-justify" id="longpost" style=" padding-left: 340px; font-weight: 400" > {!! ucfirst(nl2br(e($comment->body))) !!} </p>
                        <div class="row">
                                <p class="text-right" style="margin-right: 100px; font-weight: 500;">Commented  {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                            </div>
                            
                    </div>
                    <hr>
                   @endforeach
                   <script type="text/javascript">
                       function openpost(){
                        document.getElementById('shortpost').style.display = 'block';
                        document.getElementById('longpost').style.display = 'none';
                       }
                   </script>

                </div>
            </div>
</div>

            </div>
        </div>
         
</div>
</body>
</html>

