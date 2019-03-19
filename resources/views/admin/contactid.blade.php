@extends('layouts.dashboard')
@section('title','Contact.Litein Tea Factory')
@section('head','Contact Information Produce')

@section('content')
<div id="global"onclick="openhead() ">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body" id=" container" style="background: ; width: 100%;">
        <div class="panel-heading " id="panelhead">
               
                <div class="heading" style="height:;">
                   <div class="" style="margin-right: 10%;">
                    @if (session()->has('warning'))
                     <div class="alert alert-warning" id="alert" style="text-transform:normal; ">
                      {{ session('warning') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                     <div class="alert alert-success" id="alert">
                      {{ session('success') }}
                    </div>
                    @endif
                    <p class="report"><button class="btn-success" style="min-width: 300px;">Contact Information </button> <a href="/admin/contactus" style="float: right;"><button class="btn-primary">Back</button></a></p>
                </div>
                </div>
            </div>
        <div class="container"  id="contains" style="width: 70%; float: left; "  >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/pop.css')}}">
        <div  id="myForma">
          <style type="text/css">
            input, textarea{
              background-color: white !important;
            }
          </style>
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         <div class="well form-horizontal" style=" background-image:; background-size: cover;opacity: 0.9;color: white; min-height: 300px;">
                          {{-- @csrf --}}
                            <fieldset>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;"> Date Sent</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-user"></i></span>
                                      <input id="tea_no" name="tea_no" placeholder="Date Sent" class="form-control" required="true" value="{{\Carbon\Carbon::parse($contact->created_at)->format('l   d M Y')}}" type="text" style=" height: 50px;" readonly=""></div>
                                  </div>
                               </div>
      
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;">Email</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <input id="gross_weight" name="gross_weight" placeholder="Gross Weight" class="form-control" required="true" value="{{$contact->email}}" type="email" style=" height: 50px;"  readonly="">

                                     </div>
                                  </div>
                               </div>
                                
                                <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black"> Title</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <textarea id="" name="" placeholder="Net Weight" class="form-control" required="true"  type="text" style=" height: 50px;" readonly>{{$contact->title}} </textarea>

                                     </div>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;"> Message Body</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <textarea id="net_weight" name="net_weight" placeholder="Net Weight" class="form-control" required="true"  type="text" style=" min-height: 50px;" readonly>{{$contact->body}} </textarea>

                                     </div>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;"></label>

                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                       <button class="btn-primary" name="submit" style="width: 300px;margin-left: 20px; height: 50px;" onclick="openreply()">Reply</button>
                                       {{-- <button class="btn-danger"  style="width: 300px;margin-left: 20px; height: 70px;" onclick="closeForm()"">Close</button> --}}

                                     </div>
                                  </div>
                               </div>
                              
                            </fieldset>
                         </div>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        
        <div class="container"  id="contain" style="width: 29%;float: right; background: white" >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <div  id="myForma">
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         
                            <fieldset>
                              <h1 style="font-size: 24px; text-decoration: underline;">Unread Contact Us Messages</h1>
                            </fieldset>
                            <hr>
                            @foreach($contacts as $con)
                            <fieldset>
                               <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                     <div class="input-group" style=" height: ;">
                                      <p style="font-size: 16px; font-weight: bold; color: red;">
                                        <a href="" style="color: red !important;"> {!! ucfirst(strip_tags(\Illuminate\Support\Str::words($con->title, 10,'...'))) !!} </a>
                                      </p>
                                      <p>  {!! ucfirst(strip_tags(\Illuminate\Support\Str::words($con->body, 10,'...'))) !!}</p>
                                      <p>Sent : {{$con->created_at->diffForHumans()}} <b style="font-weight:normal; float:right; font-size: 16px;"></b></p>

                                     </div>
                                  </div>
                             </div>
                            </fieldset>
                            <hr>
                             <hr>
                             @endforeach
                            <fieldset>
                              <a href="/admin/contactus" class="btn btn-success" style="margin-left: 60px; width: 150px;"> View All</a>
                            </fieldset>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
        <style type="text/css">
          #reply{
            display: none;
          }
        </style>
          <div  id="reply" style="float: left;width: 70%;">
          <style type="text/css">
            input, textarea{
              background-color: white !important;
            }
          </style>
          <h1 class="text-center"><button class="btn-success" style="height: 50px;">Reply</button></h1>
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         <form class="well form-horizontal" method="POST" action="/admin/contactus/reply" style=" background-image:; background-size: cover;opacity: 0.9;color: white; min-height: 300px;">
                          @csrf
                            <fieldset>

                                <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black"> Title</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 150px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <textarea id="" name="title" placeholder="Net Weight" class="form-control" required="true"  type="text" style=" height: 150px; color: black;" > </textarea>

                                     </div>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;"> Message Body</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <textarea id="net_weight" name="body" placeholder="Net Weight" class="form-control" required="true"  type="text" style=" min-height: 300px; color: black;" > </textarea>

                                     </div>
                                  </div>
                               </div>
                               
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px; color: black;"></label>

                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                       <button class="btn-primary" name="submit" style="width: 300px;margin-left: 20px; height: 50px;" onclick="return confirm('Are You sure you would want to send this Reply?')">Reply</button>
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
        

    <hr>   
      </div>
   </div>
  </div>
</div>
</div>
<script type="text/javascript">
  
function openreply() {
 document.getElementById('reply').style.display= 'block';
 
}

</script>
@endsection