<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        {{-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/assets/bootstrap-clearmin.min.css')}}"> --}}
       
        <title>Litein Tea Factory Tea Produce Report </title>
        <style type="text/css">
            h1{
                /*float: left;*/
                /*margin-left: 20px;*/
            }
            img {
                margin-left: 40%;
            }
            table tr>th{
                height: 40px;
                font-size: 20px;
                margin-left: 100px;
                font-weight: normal;
            }
            td{
                margin-left: 40%;
                font-size: 20px;
            }
        </style>
    </head>
    <body class="cm-no-transition cm-1-navbar" >
       <div id="global" style="width: 80%; background:;">
              <div class="container-fluid">
                <div class="panel panel-default" >
                  <div class="panel-body">
                    <div class="panel-body" id="receipt" style="background:; border-width: 2px; border-style: groove">
                                           {{-- <a href="/"> <BUTTON style="margin-top: 20px;float: right;margin-right: 50px;">Print</BUTTON></a> --}}

                        <h1> Litein Tea Factory  Tea Report</h1> 
                    <hr>
                        <div style="background:; border-width: 2px; border-style: groove" >
                            <table>
                              <thead>
                                <th>Name</th>
                                <th>Value</th>
                              </thead>
                              <tbody>
                                <tr>
                        <th >Total Number of Tea Numbers</th>
                        <td>{{$teano}}</td>

                       </tr>
                        <tr>
                        <th >Period : </th>
                        @if($montha == 'All')
                        <td> The whole of 2019</td>
                        @else 
                        <td> {{$montha}} {{$yr}}</td>
                        @endif

                       </tr>
                        <tr>
                        <th >Regions :</th>
                        <td>All {{$location}} locations</td>

                       </tr>
                       
                        
                       <tr style="border-bottom-width: 1px;border-bottom-style: groove; border-top-width: 1px;border-top-style: groove;">
                        <th >Total Number of Kg(s) Produced :</th>
                        <td>{{$total}} kg(s)</td>

                       </tr >

                              </tbody>
                            </table>
                        {{-- <table class="" style="width: 50%; margin:20px; margin-bottom: 100px; ">
                     <thead>
                        <tr class="table-bordered" style="border-bottom-width: 1px; border-bottom-style: groove;">
                          <th  style="height: 50px;background:; font-weight: : bold; "> Name</th>
                          <th style="font-weight: normal;"> Value</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         
                       <tr>
                        <th >Total Number of Tea Numbers</th>
                        <td>{{$teano}}</td>

                       </tr>
                        <tr>
                        <th >Period : </th>
                        @if($montha == 'All')
                        <td> The whole of 2019</td>
                        @else 
                        <td> {{$montha}} {{$yr}}</td>
                        @endif

                       </tr>
                        <tr>
                        <th >Regions :</th>
                        <td>All {{$location}} locations</td>

                       </tr>
                       
                        
                       <tr style="border-bottom-width: 1px;border-bottom-style: groove; border-top-width: 1px;border-top-style: groove;">
                        <th >Total Number of Kg(s) Produced :</th>
                        <td>{{$total}} kg(s)</td>

                       </tr >
 --}}
                       
                     
                    </div>
                    <hr>
                    <p style=" margin-left:;" class="text-center"> Requested by : Name: {{$user->f_name}},  Email:{{$user->email}}</p>
                    {{-- <br> --}}
                    <H6 class="text-center" style=" font-size: 16px; margin-left: ;">Powered by Litein Tea Factory</H6>                  


                  </div>
                
              </div>  

            </div>
            </div>
            </div>
            </div>
            </div>
       
      
    </body>
</html>