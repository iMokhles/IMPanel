@extends('backpack::layout')

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@section('header')
    <section class="content-header">

        <h1>
            {{ trans('backpack::base.my_account') }}
        </h1>

        <ol class="breadcrumb">

            <li>
                <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            </li>

            <li>
                <a href="{{ route('admin.account.info') }}">{{ trans('backpack::base.my_account') }}</a>
            </li>

            <li class="active">
                {{ trans('backpack::base.update_account_info') }}
            </li>

        </ol>

    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.auth.account.sidemenu')
        </div>
        <div class="col-md-9">

            <form class="form" action="{{ route('admin.account.info') }}" method="post">

                {!! csrf_field() !!}

                <div class="box">

                    <div class="box-body backpack-profile-form">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->count())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            @php
                                $label = trans('backpack::base.name');
                                $field = 'name';
                            @endphp
                            <label class="required">{{ $label }}</label>
                            <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                        </div>

                        <div class="form-group">
                            @php
                                $label = trans('backpack::base.email_address');
                                $field = 'email';
                            @endphp
                            <label class="required">{{ $label }}</label>
                            <input required class="form-control" type="email" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                        </div>

                    </div>

                    <div class="box-footer">

                        <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</span></button>
                        <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>

                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
