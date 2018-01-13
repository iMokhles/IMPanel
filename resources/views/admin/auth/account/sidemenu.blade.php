<div class="box">
    <div class="box-body box-profile">
	    <img class="profile-user-img img-responsive img-circle" src="{{ backpack_avatar_url(Auth::guard('admin')->user()) }}">
	    <h3 class="profile-username text-center">{{ Auth::guard('admin')->user()->name }}</h3>
	</div>

	<hr class="m-t-0 m-b-0">

	<ul class="nav nav-pills nav-stacked">

	  <li role="presentation"
		@if (Request::route()->getName() == 'admin.account.info')
	  	class="active"
	  	@endif
	  	><a href="{{ route('admin.account.info') }}">{{ trans('backpack::base.update_account_info') }}</a></li>

	  <li role="presentation"
		@if (Request::route()->getName() == 'admin.account.password')
	  	class="active"
	  	@endif
	  	><a href="{{ route('admin.account.password') }}">{{ trans('backpack::base.change_password') }}</a></li>

	</ul>
</div>
