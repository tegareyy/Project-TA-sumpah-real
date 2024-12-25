<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body class="hold-transition sidebar-mini">

    {{-- wrapper --}}
    <div class="wrapper">

        @include('includes.navbar')
        @include('includes.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('includes.footer')

    </div>

    @include('includes.script')
</body>

</html>
