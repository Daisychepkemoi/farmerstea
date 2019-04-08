@extends('layouts.dashboard')
@section('title','TeaReport.Litein Tea Factory')
@section('head','Tea Produce Report')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
            <hr>
            <div class="panel-body"  style="background:; min-height: 150px;">
               <section class="search-sec">
                <div class="container">
                    <form action="/admin/teareport/sort" method="post" novalidate="novalidate">
                      @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                
                                  <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                        <input type="text" class="form-control search-slt" placeholder="Tea Number" id="select1" name="tea_no">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                      <select class="form-control search-slt" id="select2" name="location">
                                            <option>All Regions</option>
                                              <option>Kapkarin</option>
                                                <option>Cheborgei</option>
                                                <option>Chebwagan</option>
                                                <option>America</option>
                                                <option>Lalagin</option>
                                                <option>Kiptewit</option>
                                                <option>Kapsir</option>
                                                <option>Sosit</option>
                                        </select>
                                    </div>
                            <script type="text/javascript">
                            
                          $('#select1').on('input', function() {

                             if($(this).val().length)
                                $('#select2').prop('disabled', true);
                             else
                                $('#select2').prop('disabled', false);
                          });
                          </script>
                                    <div class="col-lg-3 col-md-2 col-sm-12 p-0">
                                       <select class="form-control search-slt" id="exampleFormControlSelect1" name="year">
                                               <option>2019</option>
                                               <option>2018</option>
                                               <option>2017</option>
                                               <option>2016</option>
                                               <option>2015</option>
                                               
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-12 p-0">
                                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="month">
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
                                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                        <button name="submit" type="submit" id="wrn-btn" class="btn btn-danger search-salt">Sort</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>     
            </div>
            <hr>
            
              <div class="panel-heading " id="panelhead">

                Summary for  {{$day}}    
                        
                  </div>
              <div class="panel-body">
                <table class="table table-bordered">
                 
                     <thead>
                        <tr class="bg-success">
                         
                          <th scope="col">Tea Number</th>
                          <th scope="col">Date Offered</th>
                          <th scope="col">Agent Name</th>
                          <th scope="col"> Receipt Number</th>
                          <th scope="col"> Gross Weight (Kg)</th>
                          <th scope="col"> Net Weight (kg) </th>
                          <th scope="col"> Total as of today (kg) </th>
                          {{-- <th scope="col">  </th> --}}
                         
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($teaproduce as $tean)
                       <tr>
                        {{-- <td>{{$tean->id}}</td> --}}
                        <td>{{$tean->tea_no}}</td>
                        <td>{{\Carbon\Carbon::parse($tean->created_at)->format('l   d M Y')}}</td>
                        <td>{{$tean->offered_by}}</td>
                        <td>{{$tean->receipt_no}}</td>
                        <td>{{$tean->gross_weight}}</td>
                        <td>{{$tean->net_weight}}</td>
                        <td>{{$tean->total_as_at_day}}</td>
                        

                       </tr>
                       @endforeach
                        <tr>
                          {{-- <td colspan="5" style="" hidden>hey</td> --}}
                          <td colspan="1">Total Kg</td>
                        <td colspan="7" >{{$totalkg}}</td>
                        
                        </tr>
                     
                      
                    
                        </tbody>
                        </table>
                        

              </div>


       </div>
   </div>
</div>
@endsection