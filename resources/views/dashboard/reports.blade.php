@extends('layouts.dashboard')
@section('title','Reports.Litein Tea Factory')
@section('head','Reports')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading " id="panelhead">
              <form action="/tea" method="GET">
                @csrf
                <h4>Period</h4>
                <div class="start">
                    <label for="startdate" >Start Date</label>
                     <select  name="month" id="month" value="">
                      <option>All</option>
                      <option>January</option>
                      <option>February </option>
                      <option>March</option>
                      <option>April</option>
                      <option>May</option>
                      <option>June</option>
                      <option>july</option>
                      <option>August</option>
                      <option>September</option>
                      <option>October</option>
                      <option>November</option>
                      <option>December</option>
                    </select>
                </div>
                <div class="start">
                    <label for="enddate" >EndDate</label>
                     <select  name="year" id="month" value="{{ old('month') }}">
                      <option>2019</option>
                      <option>2018</option>
                      <option>2017</option>
                      <option>2016</option>
                      <option>2015</option>
              
            </select>
                </div>
                <div class="end">

                   
                    <button type="submit" class="btn-success" style="height: 50px; ">Generate Report</button>
                </div>
              </form>
            </div>
            <div class="panel-body">
              <h5 class="panel-heading" id="panelhead">TEA REPORT
              </h5>
              <div class="panel-body" id="owner">
                   <table class="table borderless" id="table" style="background-color: ; float: left;">
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
                         <td class="detail">{{\Carbon\Carbon::parse(now())->format('l  d M Y ')}}</td>

                      </tr>


                    </tbody>
                      @endforeach
                        
                   
                </table>
                <style type="text/css">
                  #help{
                    display: block;
                    padding: 50px;

                  }
                  #help h4{
                    font-size: 22px;
                  }
                  #help li{
                    font-size: 20px;
                  }
                </style>
                <div id="help" style="float: right; width: 600px;height: 300px; background-color: ;">
                  <H4>How we make our Approximations In the Produce summary report below</H4>
                  <ul>
                    <li>Total Kg: Sum of all Net_weights.</li>
                    <li>Expected Bonus : NUmber Of Acres *  911 * 28.80,</li>
                    <i>911 = Mean Expected Kg per Acre Annually.</i>
                    <i>28.80 = Last Years Bonus pais Per Kg.</i>
                    <li>Number of ferterlizer bags : NUmber Of Acres * 8, </li>
                    <i>8 = Mean Expected Number of fertilizer bags to be used per Acre.</i>
                  
                  </ul>
              </div>
              </div>
            </div>
              <div class="panel-heading " id="panelhead">Produce Summary

              </div>
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
                          <th scope="row">No Of Fertelizer Bags/Yr</th>
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
              <div class="panel-heading " id="panelhead">Detailed Report</div>
                <div class="panel-heading " id="panelhead">

                <h4>Period</h4>
                <div class="start">
                    @include('sort.farmersort')
                </div>
                <div class="end">

                    <p>
                        {{-- <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a> --}}
                    </p>
                </div>
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
                        <td>{{\Carbon\Carbon::parse($teadetails->date_offered)->format('l   d M Y')}}</td>
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
                          <td colspan="3">Page No</td>
                        <td></td>
                        {{-- <td> {{$teadetail->links()}}</td> --}}
                        <td> {{ $teadetail->appends(request()->input())->links() }}</td>
                        
                        </tr>
                         
                          
                         
                        
                       

                        </tbody>
                        </table>
              </div>
            </div>

       </div>
   </div>
</div>
@endsection