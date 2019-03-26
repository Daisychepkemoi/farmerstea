@extends('layouts.master')
@section('title','Login.Litein Tea Factory')


@section('content')
 <div class="landing-page">
              <div style=""></div>
              <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000">
                      @if (session()->has('warning'))
             <div class="alert alert-warning" id="alert">
              {{ session('warning') }}
            </div>
            @endif
            @if (session()->has('success'))
             <div class="alert alert-success" id="alert">
              {{ session('success') }}
            </div>
            @endif
               <form class="modal-content animate" action="{{ route('login') }}" method="POST">
    <div class="imgcontainer">
      
      <h2>Login</h2>
    </div>
     @csrf
    <div class="container">
      <label for="email"><b>{{ __('E-Mail Address') }}</b></label>
     <input id="email" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }} placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
       @if ($errors->has('email'))
         <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif

      <label for="passsword"><b>{{ __('Password') }}</b></label>
      <input type="password" placeholder="Enter Password"  name="password" required>
        
        
      <button type="submit"> {{ __('Login') }}</button>
      <label>
        <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <b>Remember me</b>
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
     
      
      @if (Route::has('password.request'))
         
                 <h6><a href="{{ route('register') }}">Register?</a><a href="{{ route('password.request') }}">Forgot your Password?</a></h6>
          
      @endif
    </div>
  </form>
         
        
                   </div>
                  
                  <img src="{{ URL::to('image/desk.jpg') }}">
    </div>

@endsection
