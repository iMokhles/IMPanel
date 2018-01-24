{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 22/01/2018--}}
 {{--* Time: 08:18--}}
 {{--*/--}}
<div class="panel panel-danger">
    <div class="panel-heading">
        <strong>Disabled Items</strong>
    </div>

    <div class="panel-body clearfix">
        <ul class='draggable-menu draggable-menu-inactive'>
            @foreach(\App\Helpers\MenuHelper::disabledMenus($crud->model) as $menu)
                <li data-id='{{$menu->id}}' data-name='{{$menu->name}}'>
                    <div>
                        <i class='fa {{$menu->icon}}'></i> {{$menu->name}}
                        <span class='pull-right'>
                            @if ($crud->hasAccess('update'))
                                <a href="{{ url($crud->route.'/'.$menu->id.'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
                            @endif
                            @if ($crud->hasAccess('delete'))
                                <a href="{{ url($crud->route.'/'.$menu->id) }}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a>
                            @endif
                        </span>
                        <br/>
                        <em class="text-muted">
                            <small>
                                <i class="fa fa-users"></i>
                                &nbsp; @php $rolesArray = []; @endphp
                                @foreach($menu->roles()->get() as $role)
                                    @php array_push($rolesArray, $role->name) @endphp
                                @endforeach {{implode(', ', $rolesArray)}}
                            </small>
                        </em>
                    </div>
                    <ul>
                        @if($menu->children)
                            @foreach($menu->children as $child)
                                <li data-id='{{$child->id}}' data-name='{{$child->name}}'>
                                    <div>
                                        <i class='fa {{$child->icon}}'></i> {{$child->name}}
                                        <span class='pull-right'>
                                            @if ($crud->hasAccess('update'))
                                                <a href="{{ url($crud->route.'/'.$child->id.'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
                                            @endif
                                            @if ($crud->hasAccess('delete'))
                                                <a href="{{ url($crud->route.'/'.$child->id) }}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a>
                                            @endif
                                        </span>
                                        <br/>
                                        <em class="text-muted">
                                            <small>
                                                <i class="fa fa-users"></i>
                                                &nbsp; @php $rolesArray = []; @endphp
                                                @foreach($child->roles()->get() as $role)
                                                    @php array_push($rolesArray, $role->name) @endphp
                                                @endforeach {{implode(', ', $rolesArray)}}
                                            </small>
                                        </em>
                                    </div>
                                    <ul>
                                        @if($child->children)
                                            @foreach($child->children as $subChild)
                                                <li data-id='{{$subChild->id}}' data-name='{{$subChild->name}}'>
                                                    <div>
                                                        <i class='fa {{$subChild->icon}}'></i> {{$subChild->name}}
                                                        <span class='pull-right'>
                                                            @if ($crud->hasAccess('update'))
                                                                <a href="{{ url($crud->route.'/'.$subChild->id.'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
                                                            @endif
                                                            @if ($crud->hasAccess('delete'))
                                                                <a href="{{ url($crud->route.'/'.$subChild->id) }}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a>
                                                            @endif
                                                        </span>
                                                        <br/>
                                                        <em class="text-muted">
                                                            <small>
                                                                <i class="fa fa-ban"></i>
                                                                &nbsp; @php $rolesArray = []; @endphp
                                                                @foreach($subChild->roles()->get() as $role)
                                                                    @php array_push($rolesArray, $role->name) @endphp
                                                                @endforeach {{implode(', ', $rolesArray)}}
                                                            </small>
                                                        </em>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        </ul>

        @if(count(\App\Helpers\MenuHelper::disabledMenus($crud->model))==0)
            <div align="center" id='inactive_text' class='text-muted'>Disabled item is empty</div>
        @endif
    </div>
</div>