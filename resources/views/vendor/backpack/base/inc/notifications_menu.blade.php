{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 03/03/2018--}}
 {{--* Time: 22:50--}}
 {{--*/--}}
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">{{\App\Helpers\AdminHelper::unreadNotificationsCount()}}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{\App\Helpers\AdminHelper::unreadNotificationsCount()}} notifications</li>
        @if(\App\Helpers\AdminHelper::unreadNotificationsCount() > 0)
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach (\App\Helpers\AdminHelper::unreadNotifications() as $notification)
                        <li>
                            <a href="{{$notification->markAsRead()}}">
                                <i class="fa {{$notification['data']['icon']}} text-aqua"></i> {{$notification['data']['message']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        @endif
    </ul>
</li>