@extends('auth.master')

@section('title', 'Forget Password')

@section('auth_content')
    <div class="row">
        <div class="forget-password-form">
            <div class="forget-password-form-content">
                <h4 class="form-heading">Forgot Password ?</h4>
                <p class="form-description">Enter your email address to request new password.</p>
                <form action="{{route('forget-password')}}" method="post">
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
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block mb-2">Request New Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
