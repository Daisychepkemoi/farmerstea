@extends('layouts.master')
@section('title','Reset Password email LTF')
@section('content')
<header id="header">
 <div class="landing-page">
  <div style="background-color: rgba(0,0,0,0.8); height: 100%; width: 100%; position: absolute;"></div>
  <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000">
     @if (session('status'))
     <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form class="modal-content animate" action="{{ route('password.email') }}" method="POST">
        <div class="imgcontainer">

          <h2>{{ __('Reset Password') }}</h2>
      </div>
      @csrf
      

          <div class="container">
            {{-- <h1>kjhg</h1> --}}

                <label for="Email"><b>{{ __('E-Mail Address') }}</b></label> 
                <input class="input" id="email" type="text" {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span> 
              @endif
              <button type="submit" >
                {{ __('Send Password Reset Link') }}
            </button>
        {{-- <button type="submit"> {{ __('Register') }}</button> --}}
            </div>


      



  

    </form>

</div>

<img src="{{ URL::to('image/desk.jpg') }}">
</div>
</header>
@endsection


