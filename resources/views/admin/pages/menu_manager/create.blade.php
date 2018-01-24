@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">MenuManager</span>
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
            <h3 class="box-title">Menu Manager</h3>
        </div>

        <div class="box-body">
            <div class="col-sm-4">
                @include('admin.pages.menu_manager.inc.active_items')
                @include('admin.pages.menu_manager.inc.disabled_items')
            </div>

            <div class="col-sm-8">
                <div class="panel panel-default">

                    <div class="panel-heading"> Add Menu</div>

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
@endsection
