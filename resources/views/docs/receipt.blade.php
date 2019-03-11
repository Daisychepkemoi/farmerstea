<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
     
        <title>Litein Tea Factory Receipt </title>
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
                        <h1>Litein Tea Factory  Daily ProduceReceipt</h1> 
                    <hr>
                        <div style="background:; border-width: 2px; border-style: groove" >
                        <table class="" style="width: 50%; margin: 20px;">
                     <thead>
                        <tr>
                          <th  style="height: 50px;background:;"></th>
                          <th > </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         
                       <tr>
                        <th >Receipt No :</th>
                        <td>{{$tea->receipt_no}}</td>

                       </tr>
                       <tr>
                        <th >Time Offered :</th>
                        <td>{{$tea->created_at}}</td>

                       </tr>
                       <tr>
                        <th >Agent Name:</th>
                        <td style="text-transform: capitalize;">{{$user->f_name}}</td>

                       </tr>
                       <tr>
                        <th >Tea Number :</th>
                        <td>{{$tea->tea_no}}</td>

                       </tr>
                       <tr>
                        <th >Farmer Name:</th>
                        <td>{{$username->f_name}}  {{$username->l_name}}</td>

                       </tr>
                       <tr>
                        <th >Gross _Weight:</th>
                        <td> {{$tea->gross_weight}} kg(s)</td>

                       </tr>
                        <tr>
                        <th >Deducted Weight:</th>
                        <td>1 kg</td>

                       </tr>
                        <tr>
                        <th >Net_Weight:</th>
                        <td>{{$tea->net_weight}} kg(s)</td>

                       </tr>
                        <tr>
                        <th >Total_as_at_today :</th>
                        <td>{{$tea->total_as_at_day}} kg(s)</td>

                       </tr>
                       
                      </tbody>
                    </table> 
                    </div>
                    <hr>
                    <H6 style="font-size: 16px; margin-left: 200px;" class="text-center" >Powered by Litein Tea Factory</H6>                  


                  </div>
                
              </div>  

            </div>
            </div>
            </div>
            </div>
            </div>
    </body>
</html>