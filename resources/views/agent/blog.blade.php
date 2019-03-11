@extends('layouts.dashboard')
@section('title','Blog.Litein Tea Factory')
@section('head','Blog')

@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-heading " id="panelhead">
               
                <div class="heading" style="height:;">
                   <div class="" style="margin-right: 10%;">
                    <p class="report"><button class="btn-success" style="width: 300px;">Create new Post </button></p>
                </div>
                </div>
        </div>
    <div class="container"  id="contains" style="width: 70%; float: left; "  >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/pop.css')}}">
        <div  id="myForma">
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         <form class="well form-horizontal" method="POST" action="/postcreate" style=" background-image: url('{{asset('image/desk.jpg')}}'); background-size: cover;opacity: 0.9;color: white;" enctype="multipart/form-data">
                          @csrf
                            <fieldset>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;"> Title</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-user"></i></span>
                                      <input id="title" name="title" placeholder="Title" class="form-control" required="true" value="" type="text" style=" height: 50px;"></div>
                                  </div>
                               </div>
      
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;">Body</label> <br> <br>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group"><span class="input-group-addon" style=" height: 300px;"><i class="glyphicon glyphicon-text-height"></i></span><textarea id="fullName" name="body" placeholder="body" class=" form-control" required="true" value="" type="text" style=" height: 300px !important;"></textarea></div>
                                  </div>
                               </div>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;">Image</label> <br> <br>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group"><span class="input-group-addon" style=" height: 50px; margin-left: 40%;"><i class="glyphicon glyphicon-text-height"></i></span><input id="image" name="image" placeholder="image" class="form-control" required="true" value="" type="file" style=" height: 50px;"></div>
                                  </div>
                               </div>
                               
                               
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;"></label>

                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                       <button class="btn-success" name="submit" style="width: 300px;margin-left: 20px; height: 70px;"> Post</button>
                                       {{-- <button class="btn-danger"  style="width: 300px;margin-left: 20px; height: 70px;" onclick="closeForm()"">Close</button> --}}

                                     </div>
                                  </div>
                               </div>
                              
                            </fieldset>
                         </form>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
        <div class="container"  id="contain" style="width: 29%;float: right; background: white" >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <div  id="myForma">
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         
                            <fieldset>
                              <h1>Recent blog posts</h1>
                            </fieldset>
                            <hr>
                            {{-- @foreach($posts as $post) --}}
                            <fieldset>
                               <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                     <div class="card">
                                          @foreach($posts as $post)
                                          <img class="card-img-top" src="{{url('uploads/'.$post->image)}}" alt="{{$post->image}}" style="height: 100px; width: 100%;">
                                          <div class="card-body">
                                              <p class="card-text">
                                                  <h4 style="height: 100px; background:;">    {{$post->title}}</h4>
                                                  <p>{!! strip_tags(\Illuminate\Support\Str::words($post->body, 25,'...')) !!}<b>Created On {{$post->created_at->diffForHumans()}}</b> </p>
                                              </p>
                                          </div>
                                      </div>
                                    {{--  <div class="input-group" style=" height: ;">
                                          <img class="card-img-top" src="{{url('uploads/'.$post->image)}}" alt="{{$post->image}}" style="width: 100px; height: 100px;">


                                      <p style="font-size: 16px; font-weight: bold; color: red;"><a href="/events/{{$post->id}}" style="color: red !important;">{{$post->title}}l</a></p>
                                       <p>{!! strip_tags(\Illuminate\Support\Str::words($post->body, 35,'...')) !!}<b>Created On {{$post->created_at->diffForHumans()}}</b> </p>
                                     </div> --}}
                                  </div>
                             </div>
                            </fieldset>
                            <hr>
                            @endforeach

                             <hr>
                            <fieldset>
                              <a href="/blog" class="btn btn-success" style="margin-left: 60px; width: 150px;"> View More</a>
                            </fieldset>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
    <hr> 
      

      </div>
    </div>
  </div>
 </div>
</div>
@endsection