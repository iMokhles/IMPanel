@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Widgets Sections Manager</span>
	    <small>{{ trans('backpack::crud.all') }} <span class="text-lowercase">Items</span> {{ trans('backpack::crud.in_the_database') }}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.list') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<!-- Default box -->
  <div class="row">

    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">
            <h3 class="box-title">Widgets Sections Manager</h3>
        </div>

        <div class="box-body">
            <div class="col-sm-4">
                @include('admin.statistics_manager.sections.inc.active_items', ['sectionId' => "1_active"])
                @include('admin.statistics_manager.sections.inc.disabled_items', ['sectionId' => "1_inactive"])
            </div>

            <div class="col-sm-8">
                <div class="panel panel-default">

                    <div class="panel-heading"> Add Section</div>

                    <div class="panel-body">
                        {!! Form::open(array('url' => $crud->route, 'method' => 'post', 'files'=>$crud->hasUploadFields('create'))) !!}
                        @if(view()->exists('admin.pages.crud.form_content_menu_manager'))
                            @include('admin.pages.crud.form_content_menu_manager', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
                        @endif
                        @include('crud::inc.form_save_buttons')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>



{{--<div class="row">--}}
    {{--<!-- THE ACTUAL CONTENT -->--}}

    {{--@foreach(\App\Helpers\StatisticHelper::allSections() as $section)--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="box">--}}
                {{--<div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">--}}
                    {{--<h3 class="box-title">{{$section->name}}</h3>--}}
                {{--</div>--}}

                {{--<div class="box-body">--}}
                    {{--<div>--}}
                        {{--@include('admin.statistics_manager.widgets.inc.active_items',--}}
                        {{--['activeMenus' => \App\Helpers\StatisticHelper::menuActiveForSection($section->id),--}}
                        {{--'sectionId' => $section->id."_active"])--}}
                        {{--@include('admin.statistics_manager.widgets.inc.disabled_items',--}}
                        {{--['disabledMenus' => \App\Helpers\StatisticHelper::menuDisabledForSection($section->id),--}}
                        {{--'sectionId' => $section->id."_inactive"])--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div><!-- /.box -->--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--</div>--}}
@endsection
