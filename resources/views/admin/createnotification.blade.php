@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-body" id="event">
         <h5 class="panel-heading" id="panelhead">Notifications</h5>
         
     <form method="POST" action="/admin/createnotification">
            @csrf
            <label for="title"><b>{{ __('Notification Title') }}</b></label>
            <input class="input" id="title" type="text"  placeholder="Title" name="title"  required autofocus>
             <label for="body"><b>{{ __('Notification Body') }}</b></label>
            {{-- <TEXTAREA class="input" id="body" type="text"  placeholder="Body" name="body"  required autofocus> </TEXTAREA> --}}
             <textarea name="body"   class="summernote" required autofocus=""></textarea>
           
          
            <button class=" button btn-success" type="submit">Create</button>
       

          </form>
         

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