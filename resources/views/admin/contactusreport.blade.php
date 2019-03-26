@extends('layouts.dashboard')
@section('title','ContactUs.Litein Tea Factory')
@section('head','Contact Us Report')

@section('content')
<div id="global" onclick="openhead() ">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading " id="panelhead">
              @if (session()->has('success'))
                     <div class="alert alert-success" id="alert" style="text-transform:normal; ">
                      {{ session('success') }}
                    </div>
                    @endif
              <form action="/admin/contactus/sort" method="GET">
                @csrf

                <h4>Period</h4>
                <div class="start">
                    <label for="startdate" >Month</label>
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
                    <label for="enddate" >Year</label>
                     <select  name="year" id="month" value="{{ old('month') }}">
                      <option>2019</option>
                      <option>2018</option>
                      <option>2017</option>
                      <option>2016</option>
                      <option>2015</option>
              
            </select>
                </div>
                <div class="end">

                   
                    <button type="submit" class="btn-success" style="height: 50px; width: 150px; ">Sort</button>
                </div>
              </form>
            </div>
            
            <div class="panel-body">
              <div class="panel-heading " id="panelhead">Contact Us Report</div>
              <div class="panel-body">
                <table class="table table-bordered " style="border-color: black !important;">
                 
                     <thead>
                        <tr class="bg-success">
                         
                          <th scope="col">Date Sent</th>
                          <th scope="col"> Email (Sender)</th>
                          
                          <th scope="col"> Title</th>
                          <th scope="col">Body</th>
                          <th scope="col">Status</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($contacts as $contact)
                       <tr>
                        <td>{{\Carbon\Carbon::parse($contact->created_at)->format('l   d M Y')}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($contact->title, 10,'...'))) !!}</td>
                        <td>{!! ucfirst(strip_tags(\Illuminate\Support\Str::words($contact->body, 10,'...'))) !!}</td>
                        <td><a href="/admin/contact/{{$contact->id}}"><BUTTON class="btn-success"  style="width: 100px">{{$contact->status}}</BUTTON></a></td>
                        <td><a href="/admin/contact/{{$contact->id}}" ><BUTTON class="btn-primary"  style="width: 100px">View</BUTTON></a></td>

                       </tr>
                       @endforeach
                     
                      
                    
                        </tbody>
                        </table>
                        
                        
              </div>
              

       </div>
   </div>
</div>
@endsection