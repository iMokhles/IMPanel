<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">

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