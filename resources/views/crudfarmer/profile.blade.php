@extends('layouts.dashboard')
@section('title','Profile.Litein Tea Factory')
@section('head','Profile')

@section('content')
<div id="global" onclick="openhead() ">
  <div class="container-fluid">
    <div class="panel panel-default">


      <div class="panel-body">
        {{-- <h5 class="panel-heading" id="panelhead">TEA REPORT</h5> --}}
        <div class="panel-body" id="owner">
         <div class="image">
           <img src="{{ URL::to('image/profileimg.png') }}">
           <p>{{ $user->f_name}} {{$user->l_name}}</p>
           <p><button class="btn-default" ><a href="/profile/edit/{{$user->id}}" onclick="return confirm('Are You Sure You Want to Edit Profile?')"> Edit
  </a> </button></p>

         </div>
         <div class="profiledetails">
           <div class="profileone">
             <h5 class="panel-heading " id="panelhead">Profile Details</h5>
             <table class="table table-borderless" id="table">
                @foreach($tea as $teas)
              <tbody>
                 <tr>
                  <td  class="first">Name</td>
                  <td class="detail">{{ $user->f_name}} {{$user->l_name}}</td>
                </tr>
                <tr>
                  <td  class="first">National Id</td>
                  <td class="detail">{{ $user->national_id}}</td>     
                </tr>
                <tr>
                  <td  class="first">Phone Number</td>
                  <td class="detail">{{ $user->phone_no}}</td>

                </tr>
                @if($teas->tea_no == null)
                <tr>
                  <td scope=" row" class="first">Tea Number</td>
                  <td class="detail">Not yet allocated</td>     
                </tr>
                @else
                <tr>
                  <td scope=" row" class="first">Tea Number</td>
                  <td class="detail">{{ $user->tea_no}}</td>     
                </tr>
                @endif
                <tr>
                  <td scope=" row" class="first">Location</td>
                  <td class="detail">{{ $teas->location}}</td>     
                </tr>
                <tr>
                  <td scope="row" class="first">Email</td>
                  <td scope="row" class="detail">{{ $user->email}}</td>     
                </tr>
                <tr>
                  <td scope="row" class="first">No Of Acres</td>
                  <td class="detail">{{ $teas->no_acres}}</td>     
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>
@endsection