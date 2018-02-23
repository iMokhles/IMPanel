@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            {{ trans('admin.analytics') }}<small>{{ $analyticsType }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">{{ trans('admin.analytics') }}</li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title"> {{trans('admin.table')}} </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ str_singular($analyticsType) }}</th>
                                <th>Unique Visitors</th>
                                <th>Page Views</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($analyticsTable as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$analyticsUnique}}</td>
                                    <td>{{$item->visits}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->

            </div>
        </div>
    </div>
@endsection
