@extends('layouts.dashboard')
@section('title','FarmersReport.Litein Tea Factory')
@section('head',' Famer`s Report')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
                 
            <div class="panel-body"  style="background:; height: 150px;">
               <section class="search-sec">
                <div class="container">
                    <form action="/farmersort" method="post" novalidate="novalidate">
                      @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-2 col-sm-12 p-0">
                                      <select class="form-control search-slt" id="exampleFormControlSelect1" name="location">
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
                                    
                                    <div class="col-lg-3 col-md-2 col-sm-12 p-0">
                                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="status" style="text-transform: initial;">
                                               <option>All</option>
                                               <option>verified</option>
                                               <option>notverified</option>
                                               <option>denied</option>
                                               <option>rejected</option>
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
                
            
            <div class="panel-body">
              <h5 class="panel-heading" id="panelhead">Farmers REPORT</h5>
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
                      {{-- <tr> --}}
                          {{-- <td class="label">Total produce to date</td>
                          <td class="detail">{{ $totalkg}} Kgs</td> --}}

                      {{-- </tr> --}}

                    


                    </tbody>
                </table>
              </div>
            </div>
              <div class="panel-heading " id="panelhead">Produce Summary</div>
              <div class="panel-body">
                <table class="table table-bordered">
                 
                     <thead>
                        <tr class="bg-success">
                         {{-- <th>#</th> --}}
                          <th scope="col">Farmer Name</th> 
                          <th scope="col">National Id</th>
                          
                          <th scope="col">Email </th>
                          <th  scope="col"> Verification</th>
                          <th scope="col">No. Acres </th>
{{--                           <th scope="col"> </th>
 --}}                          {{-- <th scope="col">Handle</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($farmers as $farm)
                       <tr>
                        {{-- <td></td> --}}
                        <td>{{$farm->f_name}}  {{$farm->l_name}}</td>
                        <td>{{$farm->national_id}}</td>
                        <td>{{$farm->email}}</td>
                        <td>{{$farm->verifiedadmin}}</td>
                        <td>{{$farm->no_acres}}</td>
                        {{-- <td> <a href="/admin/editfarmer/{{$farm->id}}" class="" > <button class="btn-primary"> View and edit Details</button></a></td> --}}
                        {{-- <td>{{$totalksh}}</td> --}}
                        {{-- <td>  {{$tea->no_acres}}</td> --}}
                        {{-- <td>{{$tea->no_of_fert}}</td> --}}

                       </tr>
                     
                      @endforeach
                      <tr>
                        <td colspan="3"></td>
                        <td>{{$farmers->links()}}</td>
                      </tr>
                    
                        </tbody>
                        </table>
                        
                        
              </div>
              

       </div>
   </div>
</div>
@endsection