{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 04/03/2018--}}
 {{--* Time: 23:30--}}
 {{--*/--}}

<!-- TABLE -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{$widget->name}}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                @php
                    $sqlQuery = \Illuminate\Support\Facades\DB::select(DB::raw($widget->sql));

                @endphp
                <tr>
                    @foreach($sqlQuery[0] as $key => $val)
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($sqlQuery as $row)
                    <tr>
                        @foreach($row as $key=>$val)
                            @if(in_array($key, \App\Helpers\StatisticHelper::booleanColumns()))
                                @if($val == true)
                                    <td><span class="label label-success">YES</span></td>
                                @else
                                    <td><span class="label label-danger">NO</span></td>
                                @endif
                            @else
                                <td>{{$val}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>