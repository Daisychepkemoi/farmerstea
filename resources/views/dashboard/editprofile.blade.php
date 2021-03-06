@extends('layouts.dashboard')
@section('title','EditProfile.Litein Tea Factory')
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
          

         </div>
         <div class="profiledetails">
           <div class="profileone">
             <h5 class="panel-heading " id="panelhead">Profile Details</h5>
             <form method="POST" action="/profile/editsave/{{ $user->id}}">
             	@csrf
             <table class="table table-borderless" id="table">
              <tbody>
                <tr>
                  <td  class="first">Name</td>
                  {{-- <td><button btn-primary><a href="/delete.php">delete</a></button></td> --}}
                  {{-- <td><button btn-danger>edit</button></td> --}}
                  <td class="detail"><input type="text" name="f_name" value="{{ $user->f_name}}" required=""  pattern="[A-Za-z]{3,}" title="First Name"><input type="text" name="l_name"  pattern="[A-Za-z]{3,}" title="First Name" value="{{$user->l_name}}" required=""></td>
                </tr>
                <tr>
                  <td  class="first">National Id</td>
                  <td class="detail" title="Not Editable" ><input type="text" name="national_id" value="{{ $user->national_id}}" required="" readonly=""></td>     
                </tr>
                <tr>
                  <td  class="first">Phone Number</td>
                  <td class="detail"><input type="tel" pattern="\d{4}\d{3}\d{3}" title=" 'Phone Number(Formart: 0712345678) '" maxlength="10" name="phone_no" value="{{ $user->phone_no}}" required=""></td>

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
                    <option>Sosit</option>
                    <option>Kiptweit</option>
                    </select>
                  </td>     
                </tr>
                <tr>
                  <td scope="row" class="first">Email</td>
                  <td scope="row" class="detail" ><input type="email" id="email" name="email" value="{{ $user->email}}" required="" readonly></td>     
                </tr>
                <tr>
                  <td scope="row" class="first">No Of Acres</td>
                  @if($user->role == 'admin')
                  <td class="detail" title="Not Editable"><input type="number" name="no_acres" value="{{ $tea->no_acres}}" required="" ></td>
                  @else
                   <td class="detail" title="Not Editable"><input type="number" name="no_acres" value="{{ $tea->no_acres}}" required="" ></td>

                  @endif
                </tr>
              </tbody>
            </table>
             @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <p><button class="btn-success" type="submit" >Save</button></p>
        </form>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>
@endsection