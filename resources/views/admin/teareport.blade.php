@extends('layouts.dashboard')
@section('content')
<div id="global">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
                <h4>Period</h4>
                <div class="start">
                    <label for="startdate" >Start Date</label>
                    <input  type="date" name="startdate" placeholder="Start Date">
                </div>
                <div class="start">
                    <label for="enddate" >EndDate</label>
                    <input type="date"  name="enddate" placeholder="End Date">
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
                          <td class="label">Total No Of Farmers</td>
                          <td class="detail">{{$farmer }}</td>
                      </tr>
                      <tr>
                          <td class="label">Regions</td>
                          <td class="detail">Kapkarin, America,Kapkarin,Cheborgei,Sosit
                          </td>     
                      </tr>
                       <tr>
                          <td class="label"><a href=""></a></td>
                          <td class="detail">Chebwagan,America, Lalagin,Kiptewit, Kapsir
                          </td>     
                      </tr>
                      <tr>
                          <td class="label">Total produce to date</td>
                          <td class="detail">{{ $totalkg}} Kgs</td>

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
                         
                          <th scope="col">Tea Number</th>
                          <th scope="col"> Total Kg</th>
                          
                          {{-- <th scope="col"> </th> --}}
                          {{-- <th scope="col"></th> --}}
                          {{-- <th scope="col">Handle</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($teasum as $tean)
                       <tr>
                        <td>{{$tean->tea_no}}</td>
                        <td>{{$tean->net_weight}}</td>

                       </tr>
                       @endforeach
                     
                      
                    
                        </tbody>
                        </table>
                        
                        
              </div>
              

       </div>
   </div>
</div>
@endsection