@extends('layouts.dashboard')
@section('content')
<div id="global">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
                <h4>Period</h4>
                <div class="start">
                    <label for="startdate" >Start Date</label>
                    <input  type="text" name="startdate" placeholder="Start Date">
                </div>
                <div class="start">
                    <label for="enddate" >EndDate</label>
                    <input type="text"  name="enddate" placeholder="End Date">
                </div>
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
            
            <div class="panel-body">
              <h5 class="panel-heading" id="panelhead">TEA REPORT
               <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a></h5>
              <div class="panel-body" id="owner">
                   <table class="table borderless" id="table">
                      @foreach($tea as $teas)
                      <tbody>
                        <tr>
                          <td class="label">Name</td>
                          <td class="detail">{{ $user->f_name}} {{ $user->l_name}}</td>
                      </tr>
                      <tr>
                          <td class="label">National Id</td>
                          <td class="detail">{{ $user->national_id}}</td>     
                      </tr>
                      <tr>
                          <td class="label">Phone Number</td>
                          <td class="detail">{{ $user->phone_no}}</td>

                      </tr>
                      @if($teas->tea_no == null)
                      <tr>
                          <td class="label">Tea Number</td>
                          <td class="detail">Not yet allocated</td>     
                      </tr>
                     
                    @else


                      <tr>
                          <td class="label">Tea Number</td>
                          <td class="detail">{{$teas->tea_no}}</td>     
                      </tr>
                    
                    @endif
                      <tr>

                          <td class="label">Email</td>
                          <td class="detail">{{ $user->email}}</td>     
                      </tr>
                      <tr>
                          <td class="label">No Of Acres</td>
                          <td class="detail">{{$teas->no_acres}}</td>     
                      </tr>
                      <tr>
                          <td class="label">Date Of Processing</td>
                          <td class="detail">{{ $teas->created_at}}</td>     
                      </tr>


                    </tbody>
                      @endforeach
                        
                   
                </table>
              </div>
            </div>
              <div class="panel-heading " id="panelhead">Produce Summary
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
                          <th scope="col">Value</th>
                          <th scope="col"> Amount In ksh</th>
                          {{-- <th scope="col">Last</th> --}}
                          {{-- <th scope="col">Handle</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($tea as $teas)
                        {{-- @foreach($teadetail as $teadetails) --}}

                       <tr>
                        <th scope="row">Total Kg</th>
                        <td>{{$teadetaila}}</td>
                        <td>{{$teadetaila * 20 }}</td>

                       </tr>
                       <tr>
                        <th scope="row">Expected Bonus Ksh</th>
                        <td></td>
                        <td>{{$teas->bonus}}</td>
                      </tr>
                        <tr>
                          <th scope="row">No Of Fertelizer Bags</th>
                          <td>{{$teas->no_of_fert}}</td>
                          <td>{{$teas->no_of_fert * 1492}}</td>
                        </tr>
                        <tr>
                          <th scope="row">Expected_Produce kgs/yr</th>
                          <td>{{$teas->expected_produce}}</td>
                          <td>{{$teas->expected_produce * 20}}</td>
                        </tr>

                       {{--  <tr>
                          <th scope="row">Total</th>
                          <td ></td>
                          <td >{{($teadetaila * 20+ $teas->bonus)-($teas->no_of_fert * 1492) }}</td>
                         
                        </tr> --}}
                      </tbody>
                    </table>
                        {{-- @endforeach --}}
                        @endforeach
                        
                      </div>
              </div>
              <div class="panel panel-default">
              <div class="panel-heading " id="panelhead">Detailed Report
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
                          <th scope="col">Receipt Number</th>
                          <th scope="col">Time offered</th>
                          <th scope="col"> Gross Weight</th>
                          <th scope="col"> Net Weight</th>
                          <th scope="col"> Total as of that date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teadetail as $teadetails)
                       <tr>

                        
                        <td>{{$teadetails->receipt_no}}</td>
                        <td>{{$teadetails->date_offered}}</td>
                        <td>{{$teadetails->gross_weight}}</td>
                        <td>{{$teadetails->net_weight}}</td>
                        <td>{{$teadetails->total_as_at_day}}</td>
                        

                       </tr>
                       
                       @endforeach
                       <tr>
                       
                        <tr>
                          <td colspan="3">Total Kg</td>
                        <td>{{$teadetaila}}</td>
                        <td>{{$teadetaila}}</td>
                        
                        </tr>
                         <tr>
                          <td colspan="3">Go To Page</td>
                        <td></td>
                        <td> {{$teadetail->links()}}</td>
                        
                        </tr>
                         
                          
                         
                        
                       

                        </tbody>
                        </table>
              </div>
            </div>

       </div>
   </div>
</div>
@endsection