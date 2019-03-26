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
          
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                   
</div>
            </div>
            <div id="products" class="row list-group">
               
                <div class="item col-xs-8 col-lg-8" ">
                 
                <div class="thumbnail text-center">
                    <img class="group list-group-image" src=""  />
                    <div class="caption text-justify">
                        <h4 class="group inner list-group-item-heading text-justify" style="text-transform: uppercase; text-align: center;">Litein tea Factory</h4>
                        <p>
                       Litein Tea Factory was founded by James Finlay and its foundation was laid on 9th April, 1965 by the then Minister of Home Affairs (Hon. Daniel T. Arap Moi). The Factory was commissioned a year later by the then Vice President (Hon. Oginga Odinga) in 11th March, 1966 with a design capacity of 5 million kilograms annually. The factory has since been expanded to the current capacity of 15 million kilograms.
                   </p>
                   <p>
Tea was first grown in the catchment in 1948 but most of the farms were established in later years around 1964. Types of clones grown include - TN 14/3, 31/8, SFS/150, 6/8, 303/577, BB35, S15/10, PMC 51, 301/4 and 301/5. The Factory serves 8,849 Tea growers who double as the company’s shareholders. The total tea bushes in the factory’s catchment are 13,740,056 as per the 2014/15 tea census report.
</p>
    <p>
KTDA took over the management of Litein Tea Factory in 1976 as one of its managed factories falling within KTDA administrative function of Region V. the first manager under KTDA management was Mr. Kenduiywo. As one of the KTDA managed Factory Company, the Factory’s Vision is to be the leading producer of high quality tea and safe tea products and services in the world.
</p>
<p>
The Factory’s Mission is to provide efficient and effective management services to the smallholder tea farmers in production, leaf collection and processing of high quality and safe teas for the benefit of the shareholders and other stakeholders. Litein is in Kericho County, Bureti sub - county, and Litein Location. The factory is situated 32 Km from Kericho town off the Kericho – Kisii highway, 267 Kilometers West of Nairobi through Narok – Bomet route and 294 kilometers through Nakuru – Kericho route. Geographically the factory lies between 0º and 1º south latitude and 0º and 35 º east longitudes.
</p>
<p>
Some of the natural features are forests (Mau), Rivers, Short and Long rainfalls. The main rivers are Chemosit and Kipsonoi rivers. The area Climate is Bimodal Rainfall and receives Short rains in August to November. Long rains are received in March to May. The Factory’s’ tea catchment’s altitude ranges between 1950 to 2200 meters above sea level. The quality of our products and services reflects the power and heritage of Litein Factory —the pride we take in what we do and what we make possible. We are passionate about people, process, and product and service excellence.
</p><p>
The factory is determined to serve customers through innovation, continuous improvement, an intense focus on customer needs and a dedication to meet those needs with a sense of urgency. Excellence is not only a value; it is a discipline and a means for making the world a better place.The Red Volcanic soils, conducive weather patterns, well distributed rainfall all year round coupled with good manufacturing practices, combine to form a unique feature contributing to special unique characteristics in Litein teas. Hence Litein teas are naturally colourly and creamy with special Mellow and flavoury Aroma.
</p>
<p>
 

The Factory produces 97.5 % of primary grades and 2.5 % of secondary grades. The primary grades produced are distributed into five different particle sizes and graded as;
</p>
<ul style="list-style-type: decimal; font-weight: bold;font-size: 16px; margin-left: 60px;">
    <li>BP1 – Broken Pekoe one</li>
    <li>PF1 – Pekoe Fannings one</li>
    <li>PD – Pekoe Dust</li>
    <li>D1 – Dust One</li>
    <li>Whereas the secondary grades are graded as</li>
    <li>F1 – Fannings one and</li>
    <li>Dust</li>
</ul>
<p>Courtesy of : <a href="https://www.ktdateas.com/index.php/factories-regions/177-litein-tea-factory-company-limited.html" target="_blank">Litein Tea Factory</a></p>











                            
                            
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
               
</div>

            </div>
        </div>
         
</div>
</body>
</html>

