@if (Auth::guard('admin')->check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
            {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
            <!-- ================================================ -->
                <!-- ==== Recommended place for admin menu items ==== -->
                <!-- ================================================ -->
{{--                <li class="header">{{ trans('backpack::base.package_name') }}</li>--}}
                <!-- SideMenu -->
                <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

                @foreach(\App\Helpers\MenuHelper::getSideMenu() as $key => $value)
                    <li class="header">{{ $key }}</li>
                    @foreach($value as $item)
                        <li class="{{(count($item->children))?"treeview":""}} {{ (\Request::is($item->path))?"active":""}}">
                            <a href="{{  url("{$item->path}") }}"><i class="fa {{$item->icon}}"></i><span>{{$item->name}}</span> @if(count($item->children))<i class="fa fa-angle-left pull-right"></i>@endif</a>
                            @if(count($item->children))
                                <ul class="treeview-menu">
                                    @foreach($item->children as $child)
                                        <li class="{{(count($child->children))?"treeview":""}} {{ (\Request::is($child->path))?"active":""}}">
                                            <a href="{{ url("{$child->path}") }}"><i class="fa {{$child->icon}}"></i><span>{{$child->name}}</span> @if(count($child->children))<i class="fa fa-angle-left pull-right"></i>@endif</a>
                                            @if(count($child->children))
                                                <ul class="treeview-menu">
                                                    @foreach($child->children as $subChild)
                                                        <li>
                                                            <a href="{{ url("{$subChild->path}") }}"><i class="fa {{$subChild->icon}}"></i><span>{{$subChild->name}}</span></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                @endforeach

                {{--<li><a href="{{  backpack_url('sidemenuitem') }}"><i class="fa fa-list-alt"></i> <span>SideMenu Items</span></a></li>--}}

                {{--<!-- Users, Roles Permissions -->--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/admin') }}"><i class="fa fa-user"></i> <span>Admins</span></a></li>--}}
                        {{--<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>--}}
                        {{--<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li><a href="{{  backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>--}}

                {{--<li><a href="{{  backpack_url('language') }}"><i class="fa fa-flag-o"></i> <span>Languages</span></a></li>--}}
                {{--<li><a href="{{ backpack_url( 'language/texts') }}"><i class="fa fa-language"></i> <span>Language Files</span></a></li>--}}

                <!-- ======================================= -->
                {{-- <li class="header">Other menus</li> --}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endif
