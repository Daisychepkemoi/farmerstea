@extends('layouts.dashboard')
@section('content')
<div id="global">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
              <div class="heading" style="height:;">
                   <p><a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a>
                      </p>
                </div>
                <div class="panel-body" id="text">Graphical Representation of the Tea Report
                  
               
            </div>
            
                <div id="app">
                   <div id="left">
                    <p style="color: black; text-transform: initial; font-weight: normal; text-decoration: underline;"> 
                    <p>Daily produce</p>
                                        {!! $perdayproduce->container() !!}


                       

                    </div>
                    
                    <div id="right">
                        <div class="heading" style="height:;">
                          <P style="text-transform: none !important; color: black; font-size:20px; font-weight:normal !important;  padding-top: 40px; padding-bottom: 5px;"> Hello {{$user->f_name}}, <br>The line graph on your left represents the total of <br> your daily produce  per day for the last <br> 30 days. <br></P>
                          
                       <hr>
                    </div>

                    </div>
                </div>
               <hr>
                 <p class="more">
                    <div class="heading" style="height:;">
                       <p style="color: black; text-transform: initial; font-weight: normal; text-decoration: underline;"> Total Produce Per month Bar Graph</p>
                          <P style="text-transform: none !important; color: black; font-size:20px; font-weight:normal !important;  padding-top: 40px; padding-bottom: 5px; margin-left: 100px; text-align: left;">Below is a Bar Graph showing the total produce per month for the year 2019.{{--  <br></P>
                           <P style="text-transform: none !important; color: black; font-size:20px; font-weight:normal !important;  margin-left: 100px; padding-bottom: 20px; text-align: left"> --}}To get the total for a specific year, <br>   please select <b>Year</b> and <b> Month</b> and click <b>  Search</b> from the inputs below  <br></P>
                           <br>
                         
                    </div>
                     
                     <form method="POST" action="/admin/netperday">
              @csrf
              <label for="year" style="padding-right: 10px; text-transform: none; color: black;">Year </label>
              <select name="year">
              <option>2019</option>
              <option>2018</option>
              <option>2017</option>
              <option>2016</option>
              <option>2015</option>
              <option>2014</option>
              <option>2013</option>
              <option>2012</option>
              <option>2011</option>
          </select>
          <label for="Month" style="padding-right: 10px; text-transform: none; color: black;">Month </label>
             <select name="month">
              <option>January</option>
              <option>February 1</option>
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
             <button class="btn-success" style="margin-left:30px; width: 150px; height: 50px; color: black;" type="submit">Search</button>
            </form>

                 </p>

                 <div id="app" class="chart">

                    {!! $permonthproduce->container() !!}


                    <p style="color: black; text-transform: none; font-weight: normal;">Total produce Per day</p>
                    
                </div>
              
                <hr>
                  <div class="heading" style="height:;">
                       <p style="color: black; text-transform: initial; font-weight: normal; text-decoration: underline;"> Total Yearly Produce Per Year Bar Graph </p>
                          <P style="text-transform: none !important; color: black; font-size:20px; font-weight:normal !important;  padding-top: 40px; padding-bottom: 5px; margin-left: 100px; text-align: left;">Below is a Bar Graph showing your total Yearly produce to date.{{--  <br></P>
                           <P style="text-transform: none !important; color: black; font-size:20px; font-weight:normal !important;  margin-left: 100px; padding-bottom: 20px; text-align: left"> --}}To get the total yearly produce, <br> for a specific year,  please select <b>Year</b>  click <b>  Search</b> from the input below  <br></P>
                           <br>
                         
                    </div>
                  <div id="app" class="chart">

                     <p class="more">
                     
                     <form method="POST" action="/admin/netpermonth">
              @csrf
              <select name="year">
              <option>Please Select Year</option>
              <option>2019</option>
              <option>2018</option>
              <option>2017</option>
              <option>2016</option>
              <option>2015</option>
              <option>2014</option>
              <option>2013</option>
              <option>2012</option>
              <option>2011</option>
         </select>
             <button class="btn-success" type="submit">Search</button>
            </form>
        </p>


                    {!! $peryearproduce->container() !!}
                    <p style="color: black; text-transform: none; font-weight: normal;">Total Yearly produce Per Year</p>
                    <hr>
                </div>
                <hr>
              
                 <p class="more" style="color: black; text-transform: none; font-weight: normal;"> Please click here to   <a href="/admin/farmersreport"><b>  </b>  View Detailed Report</a></p>

                 
               
            </div>
            </div>
            <hr>
        </div>
    </div>
</div>
       
         <script src="https://unpkg.com/vue"></script>
        <script>
            // var app = new Vue({
            //     el: '#app',
            // });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $peryearproduce->script() !!}
        {!! $permonthproduce->script() !!}
        {!! $perdayproduce->script() !!}
        {{-- {!! $verifiedfarmer->script() !!} --}}
    
@endsection