@extends('layouts.dashboard')
@section('title','Notification.Litein Tea Factory')
@section('head','Notification')

@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="eventids">
         <h5 class="panel-heading" id="panelhead">Events</h5>
         <div class="panel panel-success" id="" style="min-height: 20px; padding: 40px;">
         <h5><a href="/notification/{{$notification->id}}" style="text-transform: uppercase; color: green; font-size: 20px; font-weight: bold;" >{{$notification->title}}</a></h5>
         <p style="font-size: 16px; ">
            {!! strip_tags($notification->body) !!}
          </p>
          <p style="float: right;">{{$notification->created_at->diffForHumans()}}</p>
          <p style="float: right; margin-right: 40px;"> Posted by : <span style="font-style: italic;">{{$username->f_name}} </span> </p>
          <br>
          <br>
          <a class="btn-primary" style="width:200px; height: 50px; color: white; text-align: center;padding-top: 15px; float: left; margin-left: 100px;   "> Back</a>

        </div>
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