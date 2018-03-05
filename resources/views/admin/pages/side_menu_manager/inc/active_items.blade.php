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
            @foreach($activeMenus as $menu)
                <li data-id='{{$menu->id}}' data-name='{{$menu->name}}' data-section="{{$sectionId}}">
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
                                <i class="fa fa-ban"></i>
                                &nbsp; @php $rolesArray = []; @endphp
                                @foreach($menu->roles()->get() as $role)
                                    @php array_push($rolesArray, $role->name) @endphp
                                @endforeach {{implode(', ', $rolesArray)}}
                            </small>
                        </em>
                        <br/>
                        <em class="text-muted">
                            <small>
                                <i class="fa fa-list"></i>
                                &nbsp; {{$menu->section()->first()->name}}
                            </small>
                        </em>
                    </div>
                    <ul id="sectionId_{{$sectionId}}">
                        @if($menu->children)
                            @foreach($menu->children as $child)
                                <li data-id='{{$child->id}}' data-name='{{$child->name}}' data-section="{{$sectionId}}">
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
                                                <i class="fa fa-ban"></i>
                                                &nbsp; @php $rolesArray = []; @endphp
                                                @foreach($child->roles()->get() as $role)
                                                    @php array_push($rolesArray, $role->name) @endphp
                                                @endforeach {{implode(', ', $rolesArray)}}
                                            </small>
                                        </em>
                                    </div>
                                    <ul id="sectionId_{{$sectionId}}">
                                        @if($child->children)
                                            @foreach($child->children as $subChild)
                                                <li data-id='{{$subChild->id}}' data-name='{{$subChild->name}}' data-section="{{$sectionId}}">
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

        @if(count($activeMenus)==0)
            <div align="center" id="empty_active_text_sectionId_{{$sectionId}}">Active items is empty, please add new item</div>
        @endif
    </div>

</div>