@extends('layouts.dashboard')
@section('title','VerifyFarmer.Litein Tea Factory')
@section('head',' Verify Farmers Details')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
               
                <div class="end">

                   {{--  <p>
                        <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a>
                    </p> --}}
                    <p class="report"><button class="btn-success"><a href="/farmers">Generate Report</a></button></p>
                </div>
            </div>
            
           
          
              <div class="panel-heading " id="panelhead">Unverified Farmers
                {{--  <a href="{{ route('generate',['download'=>'pdf']) }}" download >
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
                          <th scope="col">tea_no</th>
                          <th scope="col"> National_ID</th>
                          <th colspan="2">Edit</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         
                        @foreach($farmers as $farmer)
                       <tr>
                        <th scope="row">{{$farmer->f_name}}{{$farmer->l_name}}</th>
                        <td >{{$farmer->email}}</td>
                        <td >{{$farmer->tea_no}}</td>
                        <td >{{$farmer->national_id}}</td>
                        <td scope="col"> <a class="adddelete" href="/admin/editfarmer/{{$farmer->id}}" onclick="return confirm('Are You Sure you want to edit farmer details?')"> <button class="btn-info" > View Farmer's Details  </button> </a></td>
                         <td scope="col"> <a class="adddelete" href="/admin/verifyfarmer/{{$farmer->id}}" onclick="return confirm('Are You Sure You want to assign Tea Number?')"><button class="btn-primary">Asign Tea Number</button></a></td>
                          <td scope="col"><a class="adddelete" href="/admin/notverifyfarmer/{{$farmer->id}}" onclick="return confirm('Are You Sure you want to deny Tea Number?')"> <button class="btn-danger">Deny Tea Number  </button> </a></td>
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        {{-- <td></td> --}}
                        <th colspan="6">{{$farmers->links()}}</th>
                        

                       </tr>
                     
                       
                      </tbody>
                    </table>
                        {{-- @endforeach --}}
                       
                        
                      </div>
              </div>
              <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Verified Farmers
                {{--  <a href="{{ route('generate',['download'=>'pdf']) }}" download >
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
                          <th scope="col">Tea No</th>
                          <th scope="col"> National_ID</th>
                          <th colspan="2">Edit</th>
                          {{-- <th colspan="1">Ed</th> --}}
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($farmerver as $farmerv)
                       <tr>
                        <th scope="row">{{$farmerv->f_name}}  {{$farmerv->l_name}}</th>
                        <td >{{$farmerv->email}}</td>
                        {{-- <td >{{$farmerv->tea_no}}</td> --}}
                        <td >{{$farmerv->tea_no}}</td>
                        <td >{{$farmerv->national_id}}</td>
                       
                          <td scope="col"> <a class="adddelete" href="/admin/revokefarmer/{{$farmerv->id}}" onclick="return confirm('Are You Sure you want to revoke tea_no?')"> <button class="btn-danger"> Revoke Tea Number</button></a>  </td>

                          <td scope="col"> <a class="adddelete" href="/admin/editfarmer/{{$farmerv->id}}" onclick="return confirm('Are You Sure you want to edit farmer details?')"> <button class="btn-info"  style="background-color:  ">  View Farmer's Details  </button> </a></td>
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        <th colspan="6">{{$farmerver->links()}}</th>
                        

                       </tr>
                     
                       

                        </tbody>
                        </table>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading " id="panelhead"> rejected Farmers
                {{--  <a href="{{ route('generate',['download'=>'pdf']) }}" download >
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
                          <th scope="col">tea_no</th>
                          <th scope="col"> National_ID</th>
                          <th colspan="2">Edit</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($rejected as $rejects)
                       <tr>
                        <th scope="row">{{$rejects->f_name}}{{$rejects->l_name}}</th>
                        <td >{{$rejects->email}}</td>
                        <td >{{$rejects->tea_no}}</td>
                        <td >{{$rejects->national_id}}</td>
                        <td scope="col"> <a class="adddelete" href="/admin/editfarmer/{{$rejects->id}}" onclick="return confirm('Are You Sure you want to edit farmer details?')"> <button class="btn-info" >  View Farmer's Details  </button> </a></td>
                         <td scope="col"><a class="adddelete" href="/admin/verifyfarmer/{{$rejects->id}}" onclick="return confirm('Are You Sure You want to assign Tea Number?')"> <button class="btn-danger" style="">Asign Tea Number</button></a></td>
                          {{-- <td scope="col"><a class="adddelete" href="/admin/notverifyfarmer/{{$rejects->id}}" onclick="return confirm('Are You Sure?')"> <button class="btn-danger">Deny Tea Number</button></a>  </td> --}}
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        <th colspan="4">{{$rejected->links()}}</th>
                        

                       </tr>
                     
                       

                        </tbody>
                        </table>
              </div>
            </div>
             <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Revoked Farmers
                {{--  <a href="{{ route('generate',['download'=>'pdf']) }}" download >
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
                          <th scope="col">tea_no</th>
                          <th scope="col"> National_ID</th>
                          <th colspan="1">Edit</th>
                          <th colspan="1"></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($revokedfarmer as $revoked)
                       <tr>
                        <th scope="row">{{$revoked->f_name}}  {{$revoked->l_name}}</th>
                        <td >{{$revoked->email}}</td>
                        <td >{{$revoked->tea_no}}</td>
                        <td >{{$revoked->national_id}}</td>
                        <td scope="col"> <a class="adddelete" href="/admin/editfarmer/{{$revoked->id}}" onclick="return confirm('Are You Sure you want to edit farmer details?')"> <button class="btn-info" >  View Farmer's Details  </button> </a></td>
                       
                          <td scope="col"><a class="adddelete" href="/admin/unrevokefarmer/{{$revoked->id}}"onclick="return confirm('Are You Sure You want to Unrevoke Farmer?')" ><button class="btn-danger">Unrevoke Tea Number</button></a>  </td>
                        

                       </tr>
                       @endforeach
                       <tr>
                        <td>Go To Page</td>
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        {{-- <td></td> --}}
                        <th colspan="5">{{$revokedfarmer->links()}}</th>
                        

                       </tr>
                     
                       

                        </tbody>
                        </table>
              </div>
            </div>

       </div>
   </div>
</div>
@endsection