@extends('layouts.master')
@section('title','ResetPassword.Litein Tea Factory')

@section('content')
<header id="header">
 <div class="landing-page">
  <div style=""></div>
  <div class="buttons-container" data-aos="slide-up" data-aos-duration="3000">
   <form class="modal-content animate" action="{{ route('password.update') }}" method="POST" >
    <style type="text/css">
        input{
            height: 50px;
        }
        button{
            height: 50px;
        }
    </style>
    <div class="imgcontainer">
      <h2>Register</h2>
    </div>
         @csrf
              <div class="container">

                        <input type="hidden" name="token" value="{{ $token }}">

                             <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
             </div>
        </form>
         </div>

            <img src="{{ URL::to('image/desk.jpg') }}">
    </div>
    
        </header>
               
@endsection
