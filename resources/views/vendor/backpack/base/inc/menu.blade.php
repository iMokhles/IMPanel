<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- ========================================================= -->
        <!-- ========== Top menu right items (ordered left) ========== -->
        <!-- ========================================================= -->

        {{-- Notifications Menu --}}
        @include('backpack::inc.notifications_menu')

        @if (Auth::guard('admin')->check())
            <li>
                <a href="{{ route('admin.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a>
            </li>
        @endif
    <!-- ========== End of top menu right items ========== -->
    </ul>
</div>