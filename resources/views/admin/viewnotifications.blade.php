@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="event">
         <h5 class="panel-heading" id="panelhead">Notifications</h5>
           @foreach($notification as $notify)
          <p><a href="/admin/viewnotification/{{$notify->id}}">{{$notify->title}}</a></p>
          <p><small>{!! str_limit($notify->body, $limit = 150, $end = '....') !!}</small></p>
          <a href="/admin/viewnotification/{{$notify->id}}" class="btn btn-success"> Read More </a>
        @foreach($createdby as $created)
          {{-- <p> Created By <strong>{{$created->f_name}} {{$created->l_name}}</strong>  On <strong>{{$notify->created_at->diffForHumans()}}</strong> </p> --}}
         
          @endforeach
          @endforeach
           <p> {{$notification->links()}}</p>
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