@extends('layouts.frontend_error_layout')

@section('page_title', 'Error '.$error_code)

@section('content')
  <div class="page-content">

    <div class="container-fluid p-error-page p-error-page--403">
      <div class="p-error-page__wrap">
        <div class="p-error-page__error">
          <h3 class="p-error-page__code">{{$error_code}}</h3>
            @php
              $default_error_message = \Illuminate\Http\Response::$statusTexts[$error_code];
            @endphp
          <div class="p-error-page__desc">{{$default_error_message }}</div>
          <a href="/" class="btn btn-info p-error-page__home-link">Main page</a>
        </div>
        <div class="p-error-page__image-container">
          <img src="{{asset('panel_assets')}}/img/robot.png" alt="" class="p-error-page__image embed-responsive">
        </div>
      </div>
    </div>
  </div>
@stop