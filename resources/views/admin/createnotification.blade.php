@extends('layouts.dashboard')
@section('title','CreateNotification.Litein Tea Factory')
@section('head','Create Notification ')
@section('content')
<div id="global" onclick="openhead() ">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body">

        <div class="panel-heading " id="panelhead">
               
                <div class="heading" style="height:;">
                   <div class="" style="margin-right: 10%;">
                    <p class="report"><button class="btn-success" style="width: 300px;">Create new Notification </button></p>
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
                    <style type="text/css">
                      label{
                        font-weight: 800 !important;
                        font-size: 24px !important;
                      }
                    </style>
                      <td colspan="" class="" style="">
                         <form class="well form-horizontal" method="POST" action="/admin/createnotification" style=" background-image: url('{{asset('image/desk.jpg')}}'); background-size: cover;opacity: 0.9;color: white;">
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
                                  <label class="col-md-4 control-label" style=" height: 50px;"></label>

                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                       <button class="btn-success" name="submit" style="width: 300px;margin-left: 20px; height: 70px;" onclick="return confirm('Are You Sure You Want To save?')"> Post</button>
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
                              <h1>Recent notifications</h1>
                            </fieldset>
                            <hr>
                            @foreach($notifications as $notification)
                            <fieldset>
                               <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                     <div class="input-group" style=" height: ;">
                                      <p style="font-size: 16px; font-weight: bold; color: red;"><a href="/notification/{{$notification->id}}" style="color: red !important;">{!! strip_tags(\Illuminate\Support\Str::words($notification->title, 20,'')) !!}</a></p>
                                       <p>{!! strip_tags(\Illuminate\Support\Str::words($notification->body, 35,'...')) !!}<b>Created On {{$notification->created_at->diffForHumans()}}</b> </p>
                                     </div>
                                  </div>
                             </div>
                            </fieldset>
                            <hr>
                            @endforeach
                             <hr>
                            <fieldset>
                              <a href="/notifications" class="btn btn-success" style="margin-left: 60px; width: 150px;"> View More</a>
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