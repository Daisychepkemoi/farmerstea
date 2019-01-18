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
              <h5 class="panel-heading" id="panelhead">TEA REPORT</h5>
              <div class="panel-body" id="owner">
                   <table class="table borderless" id="table">

                      <tbody>
                        <tr>
                          <td class="label">Name</td>
                          <td class="detail">Daisy Chepkemoi</td>
                      </tr>
                      <tr>
                          <td class="label">National Id</td>
                          <td class="detail">Mark</td>     
                      </tr>
                      <tr>
                          <td class="label">Phone Number</td>
                          <td class="detail">Mark</td>

                      </tr>
                      <tr>
                          <td class="label">Tea Number</td>
                          <td class="detail">Mark</td>     
                      </tr>
                      <tr>
                          <td class="label">Email</td>
                          <td class="detail">Mark</td>     
                      </tr>
                      <tr>
                          <td class="label">No Of Acres</td>
                          <td class="detail">20</td>     
                      </tr>
                      <tr>
                          <td class="label">Date Of Processing</td>
                          <td class="detail">Mark</td>     
                      </tr>


                    </tbody>
                </table>
              </div>
            </div>
              <div class="panel-heading " id="panelhead">Produce Summary</div>
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
                       <tr>
                        <th scope="row">Total Kg</th>
                        <td>200</td>
                        <td>2000</td>

                       </tr>
                       <tr>
                        <th scope="row">Expected Bonus</th>
                        <td></td>
                        <td>4000</td>
                      </tr>
                        <tr>
                          <th scope="row">No Of Fertelizer Bags</th>
                          <td>9</td>
                          <td>-8100.00</td>
                        </tr>

                        <tr>
                          <th scope="row">Total</th>
                          <td ></td>
                          <td >10000</td>
                         
                        </tr>
                        </tbody>
                        </table>
              </div>
              <div class="panel-heading " id="panelhead">Detailed Report</div>
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
                       <tr>
                        
                        <td>200</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>

                       </tr>
                       <tr>
                       <td>200</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                      </tr>
                        <td>200</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>

                        <tr>
                          <td>200</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                        <td>2000</td>
                        </tr>
                        <tr>
                          <td colspan="4">Total Kg</td>
                        <td>2000</td>
                        
                        </tr>
                        </tbody>
                        </table>
              </div>

       </div>
   </div>
</div>
@endsection