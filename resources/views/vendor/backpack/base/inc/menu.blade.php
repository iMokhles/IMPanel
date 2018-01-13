<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

    <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- ========================================================= -->
        <!-- ========== Top menu right items (ordered left) ========== -->
        <!-- ========================================================= -->

    <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
        @if (config('backpack.base.setup_auth_routes'))
            @if (Auth::guard('admin')->guest())
                <li><a href="{{ route('admin.login') }}">{{ trans('backpack::base.login') }}</a></li>
                @if (config('backpack.base.registration_open'))
                    <li><a href="{{ route('admin.register') }}">{{ trans('backpack::base.register') }}</a></li>
                @endif
            @else
                <li><a href="{{ route('admin.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li>
        @endif
    @endif
    <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
