@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="eventids">
         <h5 class="panel-heading" id="panelhead">Events</h5>
         <div class="panel panel-success" id="eventid">
         <h5><a href="/events/{{$event->id}}">{{$event->title}}</a></h5>
         <p>
            {{$event->body}}
          </p>
          <p>Created By{{$users->f_name}} {{$users->l_name}}</p>
          <p> Held On  {{\Carbon\Carbon::parse($event->held_at)->format('d M Y')}}</p>
          <p> Created :{{$event->created_at->diffForHumans()}}</p>


        </div>
      </div>
        <div class="panel-body" id="eventdate">
          <div class="panel-body" id="month">
           <h5 class="panel-heading" id="panelhead">Time</h5>
           <div class="time" >
            
          @include('layouts.sortperyear')
           
           {{--  <p><a href="">January</a></p>
            <p><a href="">February</a></p>
            <p><a href="">March</a></p>
            <p><a href="">April</a></p>
            <p><a href="">May</a></p>
            <p><a href="">January</a></p>
            <p><a href="">January</a></p>
            <p><a href="">January</a></p>
            <p><a href="">January</a></p>
            <p><a href="">January</a></p>
            <p><a href="">January</a></p> --}}
          </div>
        </div>
        <div class="panel-body" id="blog">
         <h5 class="panel-heading" id="panelhead">Latest News</h5>
         <div class="blogid" >
          <p>HELLO krnya</p>
          <p><small>blah blah blahhhhhhhhh</small></p>
        </div>
      </div>  

    </div>
  </div>
</div>
</div>
</div>
@endsection