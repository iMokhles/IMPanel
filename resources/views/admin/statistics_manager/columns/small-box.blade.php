{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 04/03/2018--}}
 {{--* Time: 23:30--}}
 {{--*/--}}

<!-- Small box -->
<div class="small-box bg-aqua">
    <div class="inner">
        <h3>{{reset(\Illuminate\Support\Facades\DB::select(DB::raw($widget->sql))[0])}}</h3>

        <p>{{$widget->name}}</p>
    </div>
    <div class="icon">
        <i class="fa {{$widget->icon}}"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>