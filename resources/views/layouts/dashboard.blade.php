<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/assets/bootstrap-clearmin.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/assets/roboto.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css"  href="{{asset('css/form.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/assets/material-design.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/assets/small-n-flat.css')}}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/assets/font-awesome.min.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/assets/c3.min.css')}}">
         <script src="{{asset('js/assets/jquery-2.1.3.min.js')}}"></script>
        <script src="{{asset('js/assets/jquery.mousewheel.min.js')}}"></script>
        <script src="{{asset('js/assets/jquery.cookie.min.js')}}"></script>
        <script src="{{asset('js/assets/fastclick.min.js')}}"></script>
        <script src="{{asset('js/assets/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/assets/clearmin.min.js')}}"></script>
        <script src="{{asset('js/assets/d3.min.js')}}"></script>
        <script src="{{asset('js/assets/c3.min.js')}}"></script>
        <script src="{{asset('js/assets/dashboard.js')}}"></script>
         <script src="{{ asset('/js/jquery.min.js')}}"></script> 
            {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

        <script src="{{asset('js/assets/summernote.min.js')}}"></script>
        <script src="{{asset('js/assets/notepad.js')}}"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
         
        <script>
                $(document).ready(function() {
                    $('.summernote').summernote();
                });
        </script>

    
        <title>Dashboard.Litein Tea Factory</title>
    </head>
    <body class="cm-no-transition cm-2-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-success">
                <div class="cm-flex"><a href="index.html" class="" background-image: url({{url('/image/Notification.ico')}})></a></div>
                <div class="btn btn-success " data-toggle="" style="background-image: url({{asset('image/home.ico')}})"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            @if($user->role == 'user')
                            <li ><a href="{{ url('/')}}" class="sf-house" >Home</a></li>
                            <li class="active"><a href="/dashboard" class="sf-dashboard">Dashboard</a></li>
                            <li><a href="{{ route('report') }}" class="sf-brick">Reports</a></li>
                            <li><a href="/viewevents" class="sf-brick">Events</a></li>
                          
                            @else
                            <li ><a href="{{ url('/') }}" class="sf-house" >Home</a></li>
                            <li class="active"><a href="/dashboard" class="sf-dashboard"> Admin Dashboard</a></li>
                           
                            <li class="cm-submenu">
                                <a class="sf-window-layout" >Reports <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/admin/farmersreport">Farmers Report</a></li>
                                    <li><a href="/admin/teareport">Tea Report</a></li>
                                </ul>
                            </li>
                             <li class="cm-submenu">
                                <a class="sf-window-layout" >Manage Farmers <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/admin/upgradefarmer">Tea Number Allocation</a></li>
                                </ul>
                            </li>
                            @if($user->created_by = 'admin')
                            @else
                             <li class="cm-submenu">
                                <a class="sf-window-layout" > Manage Staff<span class="caret"></span></a>
                                <ul>
                                    <li><a href="/admin/addrole">Add/remove Admin</a></li>
                                </ul>
                            </li>
                            @endif
                            <li class="cm-submenu">
                                <a class="sf-window-layout">Events <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/admin/createevents">Create Event</a></li>
                                    <li><a href="/viewevents">View Events</a></li>
                                    <!-- <li><a href="layouts-tabs.html">2nd nav tabs</a></li> -->
                                </ul>
                            </li>
                            <li class="cm-submenu">
                                <a class="sf-window-layout" >Notifications <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/admin/createnotification">Create Notification</a></li>
                                    <li><a href="/viewnotifications">View Notifications</a></li>
                                </ul>
                            </li>
                           
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-success">
                <div class="btn btn-success  hidden-md hidden-lg" data-toggle="cm-menu" style="background-image: url({{asset('image/home.ico')}}); "></div>
                <div class="cm-flex"> 
                    <form id="cm-search" action="/search" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-success " data-toggle="cm-search" style="background-image: url({{url('/image/searchh.ico')}}) ;"></div>
                </div>
                @if($user->role == 'admin')
                <div class="dropdown pull-right">
                    <button class="btn btn-success"  style="background-image: url({{url('/image/Notification.ico')}}) ;" data-toggle="dropdown"> <span class="label label-danger">{{$notcount}}</span> </button>
                    <div class="popover cm-popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="list-group">
                                <a href="/notificationid" class="list-group-item">
                                    <h4 class="list-group-item-heading text-overflow">
                                         <i> <img src="{{ URL::to('image/Messages.ico') }}"></i> Nunc volutpat aliquet magna.
                                    </h4>
                                    <p class="list-group-item-text text-overflow">Pellentesque tincidunt mollis scelerisque. Praesent vel blandit quam.</p>
                                </a>
                                  <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading text-overflow">
                                         <i> <img src="{{ URL::to('image/Messages.ico') }}"></i> Nunc volutpat aliquet magna.
                                    </h4>
                                    <p class="list-group-item-text text-overflow">Pellentesque tincidunt mollis scelerisque. Praesent vel blandit quam.</p>
                                </a>
                            </div>
                            <div style="padding:10px"><a class="btn btn-success btn-block" href="/notification">Show me more...</a></div>
                        </div>
                    </div>
                </div>
                @else
                @endif
                <div class="dropdown pull-right">
                    <button class="btn btn-success " style="background-image: url({{url('/image/User.ico')}}) ;" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong>{{$user->f_name}}</strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/profile"> <i> <img src="{{ URL::to('image/Profile.ico') }}"></i> Profile</a>
                        </li>
                        {{-- <li>
                            <a href="#"><i> <img src="{{ URL::to('image/Setting.ico') }}"></i> Settings</a>
                        </li> --}}
                        <li>
                            <a href="{{ url('/logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i> <img src="{{ URL::to('image/Sign.ico') }}"></i>
                                Logout
                            </a>
                             <form id="logout-form" 
                                    action="{{ url('/logout') }}" 
                                method="POST" 
                                style="display: none;">
                                            {{ csrf_field() }}
                              </form>
                                                    {{-- <form method="GET" action="{{ route('logout') }}">
                                @csrf
                           <button type="submit"><i> <img src="{{ URL::to('image/Sign.ico') }}"></i> Logout</button> --}}
                </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
    </body>
    </html>
