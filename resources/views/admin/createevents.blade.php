@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="event">
         <h5 class="panel-heading" id="panelhead"> Create Events</h5>
         {{-- <div class="eventid"> --}}
          <form method="POST" action="{{route('createevent')}}">
            @csrf
            <label for="title"><b>{{ __('Event Title') }}</b></label>
            <input class="input" id="title" type="text"  placeholder="Title" name="title"  required autofocus>
             <label for="body"><b>{{ __('Event Body') }}</b></label>
            <TEXTAREA class="input" id="body" type="text"  placeholder="Body" name="body"  required autofocus> </TEXTAREA>
            <label for="held_at"><b>{{ __('held_at') }}</b></label>
           <input class="input" id="title" type="date"  placeholder="held_at" name="held_at"  required autofocus>
           <label for="location"><b>{{ __('location') }}</b></label>
            <select class="input" id="Location" type="text"  placeholder="location" name="location"  required autofocus>
          <option>Kapkarin</option>
          <option>Cheborgei</option>
          <option>Chebwagan</option>
          <option>America</option>
          <option>Lalagin</option>
          <option>Kiptewit</option>
          <option>Kapsir</option>
          <option>Sosit</option>
        </select>
            <button class=" button btn-success" type="submit">Post</button>
       

          </form>
         
        </div>
      {{-- </div> --}}
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