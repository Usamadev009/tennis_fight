<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

    <body>
        <div class="row">
            <div class="col-12 background-images">
                <img src="{{ asset('images/tenis.png') }}" class="tenis-image" alt="Background Image">
                <img src="{{ asset('images/logo.png') }}" class="logo" alt="Background Image">
                @yield('auth_content')
            </div>
        </div>
        @include('layouts.script')
    </body>
</html>
