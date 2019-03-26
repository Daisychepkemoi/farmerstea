@extends('layouts.dashboard')
@section('title','CreateStaff.Litein Tea Factory')
@section('head','Add Admin')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
               
                <div class="heading" style="height:;">

                    @if (session()->has('success'))
                     <div class="alert alert-success" id="alert">
                      {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                               @endif
                   <div class="end">
                    <p class="report"><button class="btn-success" onclick="openForm()">Create new Admin </button></p>
                </div>
                </div>
            </div>
            
           @if($user->created_by =='admin')
           @else
        <link rel="stylesheet" type="text/css" href="{{asset('css/pop.css')}}">
<div class="container"  >
  <div class="popup" id="myForm">
       <table class="table table-striped" >
          <tbody>
             <tr>
              <style type="text/css">
                      label{
                        font-weight: 800 !important;
                        font-size: 24px !important;
                      }
                    </style>
                <td colspan="" class="backg" style="">
                   <form class="well form-horizontal" method="POST" action="/admin/addadmin" style=" background-image: url('{{asset('image/desk.jpg')}}'); background-size: cover;opacity: 0.9;color: white;">
                    @csrf
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">First Name</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-user"></i></span><input id="firstName" name="f_name" placeholder="First Name" class="form-control" required="true" value="" type="text" style=" height: 50px;"></div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">Last Name</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group" style=" height: 50px;"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="lastName" name="l_name" placeholder="Last Name" class="form-control" required="true" value="" type="text" style=" height: 50px;"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">National Id</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine1" name="national_id" placeholder="National ID" class="form-control" required="true" value="" type="Number" style=" height: 50px;"></div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">Phone Number</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-earphone"></i></span><input id="phoneNumber" name="phone_no" placeholder="Phone Number" class="form-control" required="true" value="" type="number" style=" height: 50px;"></div>
                            </div>
                         </div>
                        
                         
                         <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">Role</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                  <select name="function" class="selectpicker form-control" style=" height: 50px;">
                                    <option>Admin</option>
                                    <option>Agent</option>
                                    <option>Blogger</option>
                                    </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">Email</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group">
                                <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="email" style=" height: 50px;"></div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;">Password</label>
                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-lock"></i></span><input id="password" name="password" placeholder="" class="form-control" required="true" value="" type="password" style=" height: 50px;"></div>
                            </div>
                         </div>
                          
                         <div class="form-group">
                            <label class="col-md-4 control-label" style=" height: 50px;"></label>

                            <div class="col-md-6 inputGroupContainer">
                               <div class="input-group">
                                 <button class="btn-success" name="submit" style="width: 300px;margin-left: 20px; height: 70px;" onclick="return confirm('Are You Sure you want to save?')"> Submit</button>
                                 <button class="btn-danger"  style="width: 300px;margin-left: 20px; height: 70px;" onclick="closeForm()">Close</button>

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
    <hr>   
           @endif
              <div class="container" style="width: 100%; ">
                <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Admins
                {{-- <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a> --}}
              </div>
               <div class="panel-body">
                <table class="table table-bordered">
                     <thead>
                        <tr class="bg-success">
                            <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Created_On</th>
                          <th scope="col">function</th>
                          <th scope="col"> National_ID</th>
                          @if($user->created_by=='admin')
                          @else
                          <th colspan="2">Edit</th>
                          @endif
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admins as $admin)
                       <tr>
                        <th scope="row">{{$admin->f_name}}  {{$admin->l_name}}</th>
                        <td >{{$admin->email}}</td>
                        <td >{{\Carbon\Carbon::parse($admin->updated_at)->format('l   d M Y')}}</td>
                        <td >{{$admin->function}}</td>
                        <td >{{$admin->national_id}}</td>
                        @if($user->created_by=='admin')
                          @else
                          
                        
                          <td scope="col"> <button class="btn-danger"><a class="adddelete" href="/admin/removepriviledge/{{$admin->id}}" onclick="return confirm('Are You Sure you want to remove as admin?')">Remove As Admin</a>  </button></td>
                          @endif

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        <td></td>
                        <td></td>
                        <td></td>
                         @if($user->created_by== 'admin')
                          @else
                         
                        <td></td>
                        @endif
                        {{-- <td></td> --}}
                        <th scope="row">{{$admins->links()}}</th>
                        

                       </tr>
                     
                       

                        </tbody>
                        </table>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Denied Priviledge As admin
              {{--  <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a> --}}</div>
               <div class="panel-body">
                <table class="table table-bordered">
                     <thead>
                        <tr class="bg-success">
                            <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Updated_at</th>
                          <th scope="col">Function</th>
                          <th scope="col"> National_ID</th>
                           @if($user->created_by=='admin')
                          @else
                          <th colspan="2">Edit</th>
                          @endif
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admindenied as $denied)
                       <tr>
                        <th scope="row">{{$denied->f_name}}{{$denied->l_name}}</th>
                        <td >{{$denied->email}}</td>
                        <td>{{\Carbon\Carbon::parse($denied->updated_at)->format('l   d M Y')}}</td>
                        <td >{{$denied->function}}</td>
                        <td >{{$denied->national_id}}</td>
                        @if($user->created_by == 'admin')
                        @else
                          <td scope="col"> <button class="btn-danger"><a class="adddelete" href="/admin/addpriviledge/{{$denied->id}}" onclick="return confirm('Are You Sure? you want to readd as admin')">ReAdd To Admins</a>  </button></td>
                          @endif
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        <td></td>
                         <td></td>
                         {{-- <td></td> --}}
                          @if($user->created_by== 'admin')
                          @else

                        <td></td>
                        @endif
                        {{-- <td></td> --}}
                        <th scope="row">{{$admindenied->links()}}</th>
                        

                       </tr>
                     
                       

                        </tbody>
                        </table>
              </div>
            </div>
           
          </div>
       </div>
   </div>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
@endsection