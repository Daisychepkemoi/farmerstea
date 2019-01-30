@extends('layouts.dashboard')
@section('content')
<div id="global">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
               
                <div class="end">

                    <p>
                        <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a>
                    </p>
                    <p class="report"><button class="btn-success"><a href="">Generate Report</a></button></p>
                </div>
            </div>
            
           @if($user->created_by='admin')
           @else
          
              <div class="panel-heading " id="panelhead">Create new Admin</div>
              <div class="panel-body">
                <form class="modal-content animate" action="/admin/addadmin" method="POST">
                     
                      @csrf
                 
                        <div class="container">

                          <div class="age">
              

                            <label for="firstname"><b>{{ __('First Name') }}</b></label> 
                            <input class="input" id="firstname" type="text" {{ $errors->has('firstname') ? ' is-invalid' : '' }} placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autofocus>
                            @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('firstname') }}</strong>
                            </span> 
                            @endif
                          </div>
                          <div class="ages">
                            {{-- <h1>nbvc</h1> --}}
                            <label for="lastname" ><b>{{ __('Lastname') }}</b></label>
                            <input class="input" id="lastname" type="text" {{ $errors->has('lastname') ? ' is-invalid' : '' }} placeholder="last Name" name="lastname" value="{{ old('lastname') }}" required autofocus>
                            @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                            @endif
                            <br>

                          </div>
                          <br>
                          <div class="age">
                            <label for="NationalID"><b>{{ __('National ID') }}</b></label>
                            <input class="input" id="NationalID" type="number" {{ $errors->has('national_id') ? ' is-invalid' : '' }} placeholder="National ID" name="national_id" value="{{ old('national_id') }}" required autofocus>
                            @if ($errors->has('national_id'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('national_id') }}</strong>
                            </span>
                            @endif
                          </div>
                          <div class="ages">
                            <label for="phone_no"><b>{{ __('Phone Number') }}</b></label>
                            <input class="input" id="phone_no" type="number" {{ $errors->has('phone_no') ? ' is-invalid' : '' }} placeholder="Phone Number" name="phone_no" value="{{ old('phone_no') }}" required autofocus>
                            @if ($errors->has('phone_no'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone_no') }}</strong>
                            </span>
                            @endif
                          </div>
                         
                         
                        <label for="email"><b>{{ __('Email') }}</b></label>
                        <input id="email" class="input" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }} placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        
                        <div class="age">
                          <label for="password"><b>{{ __('Password') }}</b></label>
                            <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                        </div>
                       
                        <button class="button" type="submit"> {{ __('Save') }}</button>
                      
                        <br> <br>
                      </div>
                      @if($errors->any())
                      <div class="row collapse">
                        <ul class="alert-box warning radius">
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      <input type="text" name="created_by" value="{{$user->f_name}}" readonly="" hidden="">

                    </form>


                    </div>

                        
                      {{-- </div> --}}
              </div>
              @endif
              
                <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Admins
                <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a>
              </div>
               <div class="panel-body">
                <table class="table table-bordered">
                     <thead>
                        <tr class="bg-success">
                            <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Created_On</th>
                          <th scope="col"> National_ID</th>
                          @if($user->created_by='admin')
                          @else
                          <th colspan="2">Edit</th>
                          @endif
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admins as $admin)
                       <tr>
                        <th scope="row">{{$admin->f_name}}{{$admin->l_name}}</th>
                        <td >{{$admin->email}}</td>
                        <td >{{$admin->updated_at}}</td>
                        <td >{{$admin->national_id}}</td>
                        @if($user->created_by='admin')
                          @else
                          
                        
                          <td scope="col"> <button class="btn-danger"><a class="adddelete" href="/admin/removepriviledge/{{$admin->id}}">Remove As Admin</a>  </button></td>
                          @endif

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        <td></td>
                        <td></td>
                         @if($user->created_by= 'admin')
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
               <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a></div>
               <div class="panel-body">
                <table class="table table-bordered">
                     <thead>
                        <tr class="bg-success">
                            <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col"> National_ID</th>
                           @if($user->created_by='admin')
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
                        <td >{{$denied->role}}</td>
                        <td >{{$denied->national_id}}</td>
                        @if($user->created_by = 'admin')
                        @else
                          <td scope="col"> <button class="btn-danger"><a class="adddelete" href="/admin/addpriviledge/{{$denied->id}}">Add To Admins</a>  </button></td>
                          @endif
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        <td></td>
                         <td></td>
                          @if($user->created_by= 'admin')
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
@endsection