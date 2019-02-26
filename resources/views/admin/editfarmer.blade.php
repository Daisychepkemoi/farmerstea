@extends('layouts.dashboard')
@section('content')
<div id="global">
  <div class="container-fluid">
    <div class="panel panel-default">


      <div class="panel-body">
        {{-- <h5 class="panel-heading" id="panelhead">TEA REPORT</h5> --}}
        <div class="panel-body" id="owner">
         <div class="image">
           <img src="{{ URL::to('image/profileimg.png') }}">
           <p>{{ $farmer->f_name}} {{$farmer->l_name}}</p>
          

         </div>
         <div class="profiledetails">
           <div class="profileone">
             <h5 class="panel-heading " id="panelhead">Farmers details Details</h5>
             <form method="POST" action="/admin/editfarmer/{{ $farmer->id}}">
              @csrf
             <table class="table table-borderless" id="table">
                {{-- @foreach($tea as $) --}}
              <tbody>
                <tr>
                  <td  class="first">Name</td>
                  {{-- <td><button btn-primary><a href="/delete.php">delete</a></button></td> --}}
                  {{-- <td><button btn-danger>edit</button></td> --}}
                  <td class="detail"><input type="text" name="firstname" value="{{ $farmer->f_name}}" required=""><input type="text" name="lastname" value="{{$farmer->l_name}}" required=""></td>
                </tr>
                <tr>
                  <td  class="first">National Id</td>
                  <td class="detail" title="Not Editable" ><input type="text" name="national_id" value="{{ $farmer->national_id}}" required="" ></td>     
                </tr>
                <tr>
                 <td  class="first">Phone Number</td>
                  <td class="detail"><input type="number" name="phone_no" value="{{ $farmer->phone_no}}" required=""></td>

                </tr>
                  @if($tea->tea_no == null)
                <tr>
                  <td scope=" row" class="first">Tea Number</td>
                  <td class="detail" title="Not Editable" ><input type="text" name="tea_no" value="not yet allocated" required readonly=""></td>     
                </tr>
                @else 
                 <tr>
                  <td scope=" row" class="first">Tea Number</td>
                  <td class="detail" title="Not Editable" ><input type="number" name="tea_no" value="{{ $tea->tea_no}}" required="" readonly=""></td>     
                </tr>
                @endif
                <tr>
                  <td scope=" row" class="first">Location</td>
                  <td class="detail" > <select class="detail" id="email" name="location">
                    <option>{{ $tea->location}}</option>
                    <option>Kapsir</option>
                    <option>America</option>
                    <option>America</option>
                    <option>America</option>
                    </select>
                  </td>     
                </tr>
                <tr>
                  <td scope="row" class="first">Email</td>
                  <td scope="row" class="detail" ><input type="email" id="email" name="email" value="{{ $farmer->email}}" required=""></td>     
                </tr>
                <tr>
                  <td scope="row" class="first">No Of Acres</td>
                  <td class="detail" title="Not Editable"><input type="number" name="no_acres" value="{{ $tea->no_acres}}" required="" ></td>
                </tr>
                  {{-- @endforeach --}}
              </tbody>
            </table>
            <p><button class="btn-success" type="submit" ><a href="">Save</a></button></p>
        </form>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>
@endsection