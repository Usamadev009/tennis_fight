@extends('auth.master')

@section('title', 'Change Password')

@section('auth_content')
    <div class="row">
        <div class="change-password-form">
            <div class="change-password-form-content">
                <h4 class="form-heading">Create New Password</h4>
                <p class="form-description">Create new password that contain at least 8 character, uppercase, lowercase, special character and at least on digit.</p>
                <form action="{{route('change-password')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <p class="password-label">Password</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fas fa-lock"></span></i></span>
                        </div>
                        <input name="password" type="password" id="password" class="form-control" placeholder="Password" autofocus>
                    </div>
                    @if ($errors->has('password'))
                        <span class="alert text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <p class="password-label">Repeat Password</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fas fa-lock"></span></i></span>
                        </div>
                        <input name="password_confirmation" id="password-confirm" type="password" class="form-control" placeholder="Password" autofocus>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="alert text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block mb-2">Create Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
