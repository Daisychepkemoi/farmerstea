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
                    <p class="report"><button class="btn-success"><a href="/report">View Detailed Report</a></button></p>
                   
                </div>
               
            </div>
            
                <div id="app" class="chart">
                     {!! $perdayproduce->container() !!}
                    <p>Daily produce</p>
                    <!-- <p class="report"><button class="btn-success"><a href="">Generate Report</a></button></p> -->

                </div>
               <hr>
                   
                <div id="app" class="chart">
                    {!! $permonthproduce->container() !!}
                    <p>Total As Per Month</p>
                    <!-- <p class="report"><button class="btn-success"><a href="">Generate Report</a></button></p> -->

                    
                </div>
               <hr>
                <div id="app" class="chart">
                     {!! $peryearproduce->container() !!}
                    <p>Total Over The years</p>


                </div>
              <p class="more"><button class="btn-success"><a href="/report">View Detailed Report</a></button></p>
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
        {!! $perdayproduce->script() !!}
        {!! $permonthproduce->script() !!}
        {!! $peryearproduce->script() !!}
        
    
@endsection