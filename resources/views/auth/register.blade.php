@extends('layouts.master')
@section('title','Register.Litein Tea Factory')


@section('content')
<header id="header">
 <div class="landing-page">
  <div style=""></div>
  <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000">
   <form class="modal-content animate" action="/register" method="POST" >
    <div class="imgcontainer">
     

      <h2>Register</h2>
    </div>
    @csrf
    <div class="container">

      <div class="age">

        <label for="firstname"><b>{{ __('First Name') }}</b></label> 
        <input class="input" id="firstname" type="text" {{ $errors->has('firstname') ? ' is-invalid' : '' }} placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autofocus>
        @if ($errors->has('firstname'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('firstname') }}</strong>
        </span> 
        @endif
      </div>
      <div class="ages">
        {{-- <h1>nbvc</h1> --}}
        <label for="lastname" ><b>{{ __('Lastname') }}</b></label>
        <input class="input" id="lastname" type="text" {{ $errors->has('lastname') ? ' is-invalid' : '' }} placeholder="last Name" name="lastname" value="{{ old('lastname') }}" required autofocus>
        @if ($errors->has('lastname'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('lastname') }}</strong>
        </span>
        @endif
        <br>

      </div>
      <br>
      <div class="age">
        <label for="NationalID"><b>{{ __('National ID') }}</b></label>
        <input class="input" id="national_id" type="number" {{ $errors->has('national_id') ? ' is-invalid' : '' }} placeholder="National ID" name="national_id" value="{{ old('national_id') }}" required autofocus>
        @if ($errors->has('national_id'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('national_id') }}</strong>
        </span>
        @endif
      </div>
      <div class="ages">
        <label for="phone_no"><b>{{ __('Phone Number') }}</b></label>
        <input class="input" id="phone_no" type="number" {{ $errors->has('phone_no') ? ' is-invalid' : '' }} placeholder="Phone Number" name="phone_no" value="{{ old('phone_no') }}" required autofocus>
        @if ($errors->has('phone_no'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('phone_no') }}</strong>
        </span>
        @endif
      </div>
      <div class="age">
        <label for="Location"><b>{{ __('Location') }}</b></label>
        <select class="input" id="Location" type="text" {{ $errors->has('Location') ? ' is-invalid' : '' }} placeholder="location" name="Location" value="{{ old('Location') }}" required autofocus>
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
      <div class="ages">
       <label for="No_Acres"><b>{{ __('No_Acres') }}</b></label>
       <input class="input" id="no_acres" type="number" {{ $errors->has('No_Acres') ? ' is-invalid' : '' }} placeholder="No_Acres" name="No_Acres" value="{{ old('No_Acres') }}" required autofocus>
       @if ($errors->has('No_Acres'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('No_Acres') }}</strong>
      </span>
      @endif
    </div>
    <label for="email"><b>{{ __('Email') }}</b></label>
    <input id="email" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }} placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    
    <div class="age">
      <label for="password"><b>{{ __('Password') }}</b></label>
        <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
    </div>
    <div class="ages">
       <label for="password-confirm"><b>{{ __('Confirm Password') }}</b></label>
         <input id="password_confirm" type="password" class="input" name="password_confirmation" required>
  </div>
    <button class="button" type="submit"> {{ __('Register') }}</button>
    <span><h6>Already have an account? <strong class="small"><a href="{{ route('login') }}">Login</a></strong></h6></span>
    <br> <br>
  </div>
  @if($errors->any())
  <div class="row collapse">
    <ul class="alert-box warning radius">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

</form>


</div>

<img src="{{ URL::to('image/desk.jpg') }}">
</div>
</header>

<script type="text/javascript">
function validatte()
{
    
        var firstname = document.form.firstname;
        var lastname = document.form.lastname;
        var national_id = document.form.national_id;
        var phone_no = document.form.phone_no;
        var location = document.form.location;
        var email = document.form.email;
        var password = document.form.password;
        var no_acres = document.form.no_acres;
        var password-confirm = document.form.password-confirm;
       
        var isnum = /^\d+$/.test(val);

       
   // if(!(ch>='a' && ch<='z') || (!(ch>='A' && ch<='Z'))){
            
   if((national_id||phone_no||no_acres)!==isnum){
alert("only a digit is required");
national_id.focus();
phone_no.focus();
no_acres.focus();
return false;
   }
   
}
   
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
     if (national_id.value.length < 7 )
    {
        window.alert("Please enter a national_id of more than 8 characters");
       national_id.focus();
        return false;
    }
    if (phone_no.value.length < 10 )
    {
        window.alert("Please enter a phone_no of more than 10 characters");
       phone_no.focus();
        return false;
    }
    if (no_acres.value.length >3 )
    {
        window.alert("Please enter a no_acres of more than 3 characters");
       no_acres.focus();
        return false;
    }
    if (password.value.length < 6 )
    {
        window.alert("Please enter a password of more than 6 characters");
       password.focus();
        return false;
    }
    if (firstname.value.indexOf("<", 0)>1){
        window.alert("Please enter a valid username address.");
    firstname.focus();
        return false;
    }
    if (lastname.value.indexOf("<", 0)>1){
        window.alert("Please enter a valid username address.");
    lastname.focus();
        return false;
    }
    
   return true;
  }


</script>
@endsection
