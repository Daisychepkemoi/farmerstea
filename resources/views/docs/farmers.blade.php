<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
      
        <title>Litein Tea Factory Farmers report </title>
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
                        <h1 style="margin-left: 200px;"> Litein Tea Factory  Farmers Report</h1> 
                    <hr>
                        <div style="background:; border-width: 2px; border-style: groove" >
                        <table class="" style="width: 80%; margin:20px; margin-bottom: 100px; ">
                     <thead>
                        <tr>
                          <th  style="height: 50px;background:; font-weight: : bold; "> Name</th>
                          <th style="font-weight: normal;"> Value(Farmers)</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         
                       <tr>
                        <th >Number oF locations :</th>
                        <td>{{$locations}}</td>
                        {{-- <td>{{$tea->receipt_no}}</td> --}}

                       </tr>
                       {{-- <hr> --}}
                        <tr>
                        <th >Number of Verified Farmers :</th>
                        <td>{{$verified}}</td>
                        {{-- <td>{{$tea->receipt_no}}</td> --}}

                       </tr>
                        <tr>
                        <th >Number oF Not Verified Farmers :</th>
                        <td>{{$notverified}}</td>
                        {{-- <td>{{$tea->receipt_no}}</td> --}}

                       </tr>
                        <tr>
                        <th >Number oF Revoked Farmers :</th>
                        <td>{{$revoked}}</td>
                        {{-- <td>{{$tea->receipt_no}}</td> --}}

                       </tr>
                        <tr>
                        <th >Number oF Denied Farmers :</th>
                        <td>{{$denied}}</td>
                        {{-- <td>{{$tea->receipt_no}}</td> --}}

                       </tr>
                       <tr style="border-bottom-width: 1px;border-bottom-style: groove; border-top-width: 1px;border-top-style: groove;">
                        <th >Total NUmber Of Farmers :</th>
                        <td>{{$all}}</td>

                       </tr >

                       
                      </tbody>
                    </table> 
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
       
       <!--  <script src="assets/js/lib/jquery-2.1.3.min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery.cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin.min.js"></script>
        <script src="assets/js/demo/home.js"></script> -->
    </body>
</html>