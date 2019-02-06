@extends('layouts.dashboard')
@section('content')
<div id="global">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
                <div class="panel-body" id="text">Chart Representation Report
                    <div class="end">

                    <p>
                        <a href="{{ route('generate',['download'=>'pdf']) }}" download >
                            <i> 
                                <img src="{{ URL::to('image/Downloads.ico') }}" title="Download">
                            </i>

                        </a>
                    </p>
                   
                </div>
               
            </div>
            
                <div id="app">
                    <div id="left">
                        {!! $adminratio->container() !!}
                        <p>Ratio Of Admins</p>
                    </div>
                    <div id="right">
                        {!! $verifiedfarmer->container() !!}
                        <p>Ration Of Farmer Verification</p>
                    </div>
                    
                </div>
               <hr>
                 <p class="more">
                     
                     <form method="POST" action="/admin/netperday">
              @csrf
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
             <button class="btn-success" type="submit">Search</button>
            </form>

                 </p>

                 <div id="app" class="chart">
                    {!! $totalperday->container() !!}


                    <p>Total As Per day</p>
                    
                </div>
              
                <hr>
                <div id="app" class="chart">
                     <p class="more">
                     
                     <form method="POST" action="/admin/netpermonth">
              @csrf
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
             <button class="btn-success" type="submit">Search</button>
            </form>
        </p>


                    {!! $totalpermonth->container() !!}
                    <p>Total As Per Month</p>
                    
                </div>
                <hr>
               
                <div id="app" class="chart">
                    {!! $totalperyear->container() !!}
                    <p>Total Over The years</p>
                </div>
                 <p class="more"><button class="btn-success"><a href="/admin/farmersreport">View Detailed Report</a></button></p>

                 <hr>
               
            </div>
            </div>
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
        <!-- // <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> -->
        {!! $totalperyear->script() !!}
        {!! $totalperday->script() !!}
        {!! $totalpermonth->script() !!}
        {!! $adminratio->script() !!}
        {!! $verifiedfarmer->script() !!}
    
@endsection