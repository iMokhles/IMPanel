{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 21/01/2018--}}
 {{--* Time: 16:09--}}
 {{--*/--}}

<footer class="p-front__footer">
    <ul class="nav">
        @foreach(\App\Helpers\FooterHelper::getFooterBtns() as $barBtn)
            <li class="nav-item active">
                <a class="nav-link active {{ (\Request::is($barBtn->path))?"active":""}}" href="{{url($barBtn->path)}}">{{$barBtn->name}}</a>
            </li>
        @endforeach
    </ul>
    <span>{{Config::get('settings.site_footer')}}</span>
</footer>