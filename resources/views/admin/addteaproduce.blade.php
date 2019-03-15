@extends('layouts.dashboard')
@section('title','ProduceEntry.Litein Tea Factory')
@section('head','Add Daily Produce')
@section('content')
<div id="global" onclick="openhead() ">
  <div class="container-fluid">
    <div class="panel panel-default" >
      <div class="panel-body" id=" container" style="background: ; width: 100%;">
        <div class="panel-heading " id="panelhead">
               
                <div class="heading" style="height:;">
                   <div class="" style="margin-right: 10%;">
                    @if (session()->has('warning'))
                     <div class="alert alert-warning" id="alert" style="text-transform:normal; ">
                      {{ session('warning') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                     <div class="alert alert-success" id="alert">
                      {{ session('success') }}
                    </div>
                    @endif
                    <p class="report"><button class="btn-success" style="min-width: 300px;">Enter Daily Produce Details </button></p>
                </div>
                </div>
            </div>
        <div class="container"  id="contains" style="width: 70%; float: left; "  >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/pop.css')}}">
        <div  id="myForma">
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         <form class="well form-horizontal" method="POST" action="/addteaproduce" style=" background-image: url('{{asset('image/desk.jpg')}}'); background-size: cover;opacity: 0.9;color: white; height: 500px;">
                          @csrf
                            <fieldset>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;"> Tea Number</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group"><span class="input-group-addon" style=" height: 50px;"><i class="glyphicon glyphicon-user"></i></span>
                                      <input id="tea_no" name="tea_no" placeholder="Tea Number" class="form-control" required="true" value="" type="number" style=" height: 50px;"></div>
                                  </div>
                               </div>
      
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;">Gross Weight</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <input id="gross_weight" name="gross_weight" placeholder="Gross Weight" class="form-control" required="true" value="" type="number" style=" height: 50px;" onmouseout="calculate()" onmouseenter="calculate()">

                                     </div>
                                  </div>
                               </div>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;">Net Weight</label>
                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%; height: 50px;"><i class="glyphicon glyphicon-list"></i></span>
                                      <input id="net_weight" name="net_weight" placeholder="Net Weight" class="form-control" required="true" value="" type="name" style=" height: 50px;" readonly="">

                                     </div>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label" style=" height: 50px;"></label>

                                  <div class="col-md-6 inputGroupContainer">
                                     <div class="input-group">
                                       <button class="btn-success" name="submit" style="width: 300px;margin-left: 20px; height: 70px;" onclick="return confirm('Are You Sure?')">Save</button>
                                       {{-- <button class="btn-danger"  style="width: 300px;margin-left: 20px; height: 70px;" onclick="closeForm()"">Close</button> --}}

                                     </div>
                                  </div>
                               </div>
                              
                            </fieldset>
                         </form>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
        <div class="container"  id="contain" style="width: 29%;float: right; background: white" >
          {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <div  id="myForma">
             <table class="table table-striped" >
                <tbody>
                   <tr>
                      <td colspan="" class="" style="">
                         
                            <fieldset>
                              <h1 style="font-size: 24px; text-decoration: underline;">Todays Produce Records</h1>
                            </fieldset>
                            <hr>
                            @foreach($teadetails as $tea)
                            <fieldset>
                               <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                     <div class="input-group" style=" height: ;">
                                      <p style="font-size: 16px; font-weight: bold; color: red;">
                                        <a href="" style="color: red !important;"> Tea Number : {{ $tea->tea_no}} </a>
                                      </p>
                                      <p>  Gross Weight : {{$tea->gross_weight}}, Net_Weight :  {{$tea->net_weight}}, Total as_at Today: {{$tea->total_as_at_day}}</p>
                                      <p>Saved : {{$tea->created_at->diffForHumans()}} <b style="font-weight:normal; float:right; font-size: 16px;"><a href="addteaproduce/edit/{{$tea->id}}"> Edit</a></b></p>

                                     </div>
                                  </div>
                             </div>
                            </fieldset>
                            <hr>
                             <hr>
                             @endforeach
                            <fieldset>
                              <a href="/viewdailyproducereport" class="btn btn-success" style="margin-left: 60px; width: 150px;"> View All</a>
                            </fieldset>

                      </td>
                      
                   </tr>
                </tbody>
                <hr style=" width: 100%;">
             </table>
          </div>  
        </div>
    <hr>   
      </div>
   </div>
  </div>
</div>
</div>
<script type="text/javascript">
  
function calculate() {
  var gross = document.getElementById('gross_weight').value;
  var one = 1;
  var net = gross - one;
 return  document.getElementById('net_weight').value = net;
}

</script>
@endsection