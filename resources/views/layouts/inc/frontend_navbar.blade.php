{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 21/01/2018--}}
 {{--* Time: 15:54--}}
 {{--*/--}}
<div class="navbar navbar-light navbar-expand-lg p-front__navbar"> <!-- is-dark -->
    <a class="navbar-brand" href="/">{!! config('backpack.base.logo_lg') !!}</a>
    <a class="navbar-brand-sm" href="/">{!! config('backpack.base.logo_mini') !!}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="iconfont iconfont-navbar-open navbar-toggler__open"></span>
        <span class="iconfont iconfont-alert-close navbar-toggler__close"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-collapse">
        <div class="p-front__navbar-collapse">
            <div class="navbar-nav">
                @foreach(\App\Helpers\NavBarHelper::getNonRoundedNavBarBtns() as $barBtn)
                    <a class="nav-item nav-link {{ (\Request::is($barBtn->path))?"active":""}}" href="{{url($barBtn->path)}}">{{$barBtn->name}}</a>
                @endforeach
            </div>
            @foreach(\App\Helpers\NavBarHelper::getRoundedNavBarBtns() as $barBtn)
                <form class="form-inline">
                    <a class="btn btn-info btn-rounded" style="margin-right: 5px" href="{{url($barBtn->path)}}">{{$barBtn->name}}</a>
                </form>
            @endforeach
        </div>
    </div>
</div>