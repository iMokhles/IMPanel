{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: imokhles--}}
 {{--* Date: 22/01/2018--}}
 {{--* Time: 08:18--}}
 {{--*/--}}
<div class="panel panel-success">
    <div class="panel-heading">
        <strong>Active Items</strong>
        <span id='menu-saved-info_sectionId_{{$sectionId}}' style="display:none" class='pull-right text-success'>
                            <i class='fa fa-check'></i> Item Saved
                        </span>
    </div>

    <div class="panel-body clearfix">
        <ul class='draggable-menu draggable-menu-active' id="sectionId_{{$sectionId}}">
            @foreach(\App\Helpers\MenuHelper::activeMenus($crud->model) as $menu)
                <li data-id='{{$menu->id}}' data-name='{{$menu->name}}' data-section="{{$sectionId}}">
                    <div>
                        {{$menu->name}}
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
                                <i class="fa fa-ban"></i>
                                &nbsp; @php $rolesArray = []; @endphp
                                @foreach($menu->roles()->get() as $role)
                                    @php array_push($rolesArray, $role->name) @endphp
                                @endforeach {{implode(', ', $rolesArray)}}
                            </small>
                        </em>
                        <br/>
                    </div>
                </li>
            @endforeach
        </ul>

        @if(count(\App\Helpers\MenuHelper::activeMenus($crud->model))==0)
            <div align="center" id="empty_active_text_sectionId_{{$sectionId}}">Active items is empty, please add new item</div>
        @endif
    </div>

</div>