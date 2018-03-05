<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head_without_sidebar')
</head>
<body class="hold-transition {{ config('backpack.base.skin') }} layout-top-nav">

<!-- Site wrapper -->
<div class="wrapper">
    @include('backpack::inc.main_header_without_sidebar')

    <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>

    @include('backpack::inc.footer')
</div>

@yield('before_scripts')

@include('backpack::inc.scripts_without_sidebar')

@include('backpack::inc.alerts')

@yield('after_scripts')

<!-- JavaScripts -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</body>
</html>
