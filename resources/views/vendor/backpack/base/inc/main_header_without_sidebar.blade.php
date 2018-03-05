<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('admin.dashboard') }}" class="navbar-brand">{!! config('backpack.base.logo_lg') !!}</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            @include('backpack::inc.menu_without_sidebar')
        </div>
    </nav>
</header>