@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="event">
         <h5 class="panel-heading" id="panelhead">Events</h5>
         <div class="">
          
          <p>Sorry you have no event for this period</p>
          
        </div>
        <hr>


    </div>
    <div class="panel-body" id="eventdate">
      <div class="panel-body" id="month">
       <h5 class="panel-heading" id="panelhead">Time</h5>
       <div class="time" >
       @include('layouts.sortperyear')
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