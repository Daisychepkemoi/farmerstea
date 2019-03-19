@extends('layouts.dashboard')
@section('title','TeaReport.Litein Tea Factory')
@section('head','Tea Report')

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
                         
                          <th scope="col">Farmer Name</th>
                          <th scope="col">Tea Number</th>
                          <th scope="col"> Total Kg</th>
                          
                          <th scope="col">Amount To Be earned(kg*20)</th>
                          {{-- <th scope="col">Handle</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                      {{-- @foreach($teasum as $tean) --}}
                       <tr>
                        <td>Hello</td>
                        <td>{{$tea_no}}</td>
                        <td>{{$teasum}}</td>
                        <td>{{$teasum * 20}}</td>

                       </tr>
                       {{-- @endforeach --}}
                     
                      
                    
                        </tbody>
                        </table>
                        
                        
              </div>
              

       </div>
   </div>
</div>
@endsection