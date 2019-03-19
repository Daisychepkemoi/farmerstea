@extends('layouts.dashboard')
@section('title','Notification.Litein Tea Factory')
@section('head','View Notification')

@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="eventids">
         <h5 class="panel-heading" id="panelhead">Events</h5>
         <div class="panel panel-success" id="eventid">
         <h5><a href="">{{$notification->title}}</a></h5>
         <p>
            {!! nl2br(e($notification->body)) !!}
          </p>
          <p>Created By{{$users->f_name}} {{$users->l_name}}</p>
          {{-- <p> Held On{{$notification->held_at}}</p> --}}
          <p> Created at :{{$notification->created_at->diffForHumans()}}</p>

          <a href="/back" class="btn btn-success">Back</a>

        </div>
      </div>
        <div class="panel-body" id="eventdate">
          <div class="panel-body" id="month">
           <h5 class="panel-heading" id="panelhead">Time</h5>
           <div class="time" >
            @include('layouts.sortnotperdate')
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