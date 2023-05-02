@extends('auth.master')

@section('title', 'Sign In')

@section('auth_content')
    <div class="row">
        <div class="login-form">
            <div class="login-form-content">
                <h4 class="form-heading">Sign In</h4>
                <p class="form-description">Welcome to tennis Flights Dashboard</p>
                <form action="{{route('login')}}" method="post">
                    @csrf

                    <p class="email-label">Email address</p>
                    <div class="input-group mb-2 email-field">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{request()->old('email')}}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="alert text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <p class="password-label">Password</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fas fa-lock"></span></i></span>
                        </div>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="alert text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block mb-2">LOGIN</button>
                        </div>
                    </div>
                    <a href="{{ route('forget-password') }}" class="forgot-password">Forgot Password ?</a>
                </form>
            </div>
        </div>
    </div>
@endsection
