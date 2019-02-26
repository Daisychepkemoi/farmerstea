@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="event">
         <h5 class="panel-heading" id="panelhead">Notifications</h5>
         @foreach($notification as $not)
         <div class="" style="padding-left: 30px; padding-right: 30px; min-height: 30px;">
          <p><a href="/notification/{{$not->id}}">{!! strip_tags(\Illuminate\Support\Str::words($not->title, 20,'...')) !!}</a></p>
          <p><small>{!! strip_tags(\Illuminate\Support\Str::words($not->body, 35,'...')) !!}</small></p>
          <p> Created on <b>{{$not->created_at->diffForHumans()}}</b></p>
        </div>
        <hr> 
        @endforeach
       
    </div>
    <div class="panel-body" id="eventdate">
      <div class="panel-body" id="month">
       <h5 class="panel-heading" id="panelhead">Time</h5>
       <div class="time" >
        <select>
          <option>2018</option>
          <option>2019</option>
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2018</option>
        </select>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
        <p><a href="">January</a></p>
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