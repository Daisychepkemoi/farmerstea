@extends('layouts.dashboard')
@section('title','Profile.Litein Tea Factory')
@section('head','Profile ')
@section('content')
<div id="global" onclick="openhead() ">
  <div class="container-fluid">
    <div class="panel panel-default">


      <div class="panel-body">
        {{-- <h5 class="panel-heading" id="panelhead">TEA REPORT</h5> --}}
        <div class="panel-body" id="owner">
         <div class="image">
           <img src="{{ URL::to('image/profileimg.png') }}">
           <p>Daisy Chepkemoi</p>
          

         </div>
         <div class="profiledetails">
           <div class="profileone">
             <h5 class="panel-heading " id="panelhead">Profile Details</h5>
             <form method="POST" action="">
             	@csrf
             <table class="table table-borderless" id="table">

              <tbody>
                <tr>
                  <td  class="first">Name</td>
                  {{-- <td><button btn-primary><a href="/delete.php">delete</a></button></td> --}}
                  {{-- <td><button btn-danger>edit</button></td> --}}
                  <td class="detail"><input type="text" name="name" value="Daisy Chepkemoi" required=""></td>
                </tr>
                <tr>
                  <td  class="first">National Id</td>
                  <td class="detail" title="Not Editable" >1798565</td>     
                </tr>
                <tr>
                  <td  class="first">Phone Number</td>
                  <td class="detail"><input type="number" name="phone_No" value="01223355" required=""></td>

                </tr>
                <tr>
                  <td scope=" row" class="first">Tea Number</td>
                  <td class="detail" title="Not Editable" >452</td>     
                </tr>
                <tr>
                  <td scope=" row" class="first">Location</td>
                  <td class="detail" ><input type="text" name="location" value="Daisy Chepkemoi" required></td>     
                </tr>
                <tr>
                  <td scope="row" class="first">Email</td>
                  <td scope="row" class="detail" ><input type="email" name="email" value="Daisy Chepkemoi" required=""></td>     
                </tr>
                <tr>
                  <td scope="row" class="first">No Of Acres</td>
                  <td class="detail" title="Not Editable">20</td>
                </tr>

              </tbody>
            </table>
            <p><button class="btn-success" onclick="return confirm('Are You Sure?')" ><a href="/editprofile">Save</a> </button></p>
        </form>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>
@endsection