{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 04/03/2018--}}
 {{--* Time: 20:20--}}
 {{--*/--}}
@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            {{$page->name}}<small>  </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">{{$page->slug}}</li>
        </ol>
    </section>
@endsection


@section('content')
    @foreach(\App\Helpers\StatisticHelper::allSections() as $section)
        <div class="row">
            <div class="col-md-12">
                @foreach(\App\Helpers\StatisticHelper::menuActiveForSection($section->id) as $item)
                    <div class="col-md-{{$item->size}}">

                        @include('admin.statistics_manager.columns.'.$item->type, [
                        'widget' => $item
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection