<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')

    <body class="hold-transition sidebar-mini pace-purple" >
        <div class="wrapper" >

            @include('layouts.navbar')

            @include('layouts.sidebar')

            <div class="content-wrapper" id="app">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>

        @include('layouts.script')
        @stack('scripts')
    </body>
</html>
