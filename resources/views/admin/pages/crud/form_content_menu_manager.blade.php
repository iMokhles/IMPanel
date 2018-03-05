@if ($crud->model->translationEnabled())
<input type="hidden" name="locale" value={{ $crud->request->input('locale')?$crud->request->input('locale'):App::getLocale() }}>
@endif

{{-- See if we're using tabs --}}
@if ($crud->tabsEnabled())
    @include('crud::inc.show_tabbed_fields')
@else
    @include('crud::inc.show_fields', ['fields' => $fields])
@endif

{{-- Define blade stacks so css and js can be pushed from the fields to these sections. --}}

@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/'.$action.'.css') }}">

    <style type="text/css">
        body.dragging, body.dragging * {
            cursor: move !important;
        }

        .dragged {
            position: absolute;
            opacity: 0.7;
            z-index: 2000;
        }

        .draggable-menu {
            padding: 0 0 0 0;
            margin:0 0 0 0;
        }

        .draggable-menu li ul {
            margin-top:6px;
        }

        .draggable-menu li div {
            padding:5px;
            border:1px solid #cccccc;
            background:#eeeeee;
            cursor: move;
        }

        .draggable-menu li .is-dashboard {
            background: #fff6e0;
        }

        .draggable-menu li .icon-is-dashboard {
            color: #ffb600;
        }

        .draggable-menu li {
            list-style-type:none;
            margin-bottom:4px;
            min-height: 35px;
        }

        .draggable-menu li.placeholder {
            position: relative;
            border:1px dashed #b7042c;
            background:#ffffff;
            /** More li styles **/
        }
        .draggable-menu li.placeholder:before {
            position: absolute;
            /** Define arrowhead **/
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/list.css') }}">
    <!-- CRUD FORM CONTENT - crud_fields_styles stack -->
    @stack('crud_fields_styles')
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/'.$action.'.js') }}"></script>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    @stack('crud_fields_scripts')

    <script>
    jQuery('document').ready(function($){

      // Save button has multiple actions: save and exit, save and edit, save and new
      var saveActions = $('#saveActions'),
      crudForm        = saveActions.parents('form'),
      saveActionField = $('[name="save_action"]');

      saveActions.on('click', '.dropdown-menu a', function(){
          var saveAction = $(this).data('value');
          saveActionField.val( saveAction );
          crudForm.submit();
      });

      // Ctrl+S and Cmd+S trigger Save button click
      $(document).keydown(function(e) {
          if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
          {
              e.preventDefault();
              // alert("Ctrl-s pressed");
              $("button[type=submit]").trigger('click');
              return false;
          }
          return true;
      });

      // Place the focus on the first element in the form
      @if( $crud->autoFocusOnFirstField )
        @php
          $focusField = array_first($fields, function($field) {
              return isset($field['auto_focus']) && $field['auto_focus'] == true;
          });
        @endphp

        @if ($focusField)
          window.focusField = $('[name="{{ $focusField['name'] }}"]').eq(0),
        @else
          var focusField = $('form').find('input, textarea, select').not('[type="hidden"]').eq(0),
        @endif

        fieldOffset = focusField.offset().top,
        scrollTolerance = $(window).height() / 2;

        focusField.trigger('focus');

        if( fieldOffset > scrollTolerance ){
            $('html, body').animate({scrollTop: (fieldOffset - 30)});
        }
      @endif

      // Add inline errors to the DOM
      @if ($crud->inlineErrorsEnabled() && $errors->any())

        window.errors = {!! json_encode($errors->messages()) !!};
        // console.error(window.errors);

        $.each(errors, function(property, messages){

            var normalizedProperty = property.split('.').map(function(item, index){
                    return index === 0 ? item : '['+item+']';
                }).join('');

            var field = $('[name="' + normalizedProperty + '[]"]').length ? $('[name="' + normalizedProperty + '[]"]') :
                        $('[name="' + normalizedProperty + '"]'),
                        container = field.parents('.form-group');

            container.addClass('has-error');

            $.each(messages, function(key, msg){
                // highlight the input that errored
                var row = $('<div class="help-block">' + msg + '</div>');
                row.appendTo(container);

                // highlight its parent tab
                @if ($crud->tabsEnabled())
                var tab_id = $(container).parent().attr('id');
                $("#form_tabs [aria-controls="+tab_id+"]").addClass('text-red');
                @endif
            });
        });

      @endif

      });
    </script>
    <script src='{{asset("js")}}/jquery/jquery-sortable.js'></script>
    <script type="text/javascript">
        $(function () {

            var sortactive = $(".draggable-menu").sortable({
                group: '.draggable-menu',
                delay: 200,
                isValidTarget: function ($item, container) {
                    var depth = 1, // Start with a depth of one (the element itself)
                        maxDepth = 3,
                        children = $item.find('ul').first().find('li');

                    // Add the amount of parents to the depth
                    depth += container.el.parents('ul').length;

                    // Increment the depth for each time a child
                    while (children.length) {
                        depth++;
                        children = children.find('ul').first().find('li');
                    }

                    return depth <= maxDepth;
                },
                onDrop: function ($item, container, _super) {

                    var sectionId = '';
                    var isActive = 0;
                    var data = '';
                    var jsonString = '';
                    if ($item.parents('ul').hasClass('draggable-menu-active')) {
                        sectionId = $item.parents('ul').attr('id');
                        isActive = 1;
                        data = $('#'+sectionId).sortable("serialize").get();
                        jsonString = JSON.stringify(data, null, ' ');
                        $('#empty_active_text_'+sectionId).remove();

                    } else {
                        sectionId = $item.parents('ul').attr('id');
                        isActive = 0;
                        data = $('#'+sectionId).sortable("serialize").get();
                        jsonString = JSON.stringify(data, null, ' ');
                        $('#inactive_text_'+sectionId).remove();
                    }

                    sectionId = $item.parents('ul').attr('id');

                    $.post("@if($crud->model instanceof \App\Models\SideMenuItem) \
                            {{route('admin.save.menu.item')}} \
                            @elseif($crud->model instanceof \App\Models\SideMenuSection) \
                            {{route('admin.save.section.item')}} \
                            @elseif($crud->model instanceof \App\Models\NavbarBtn) \
                            {{route('admin.save.navbar.btn')}} \
                            @elseif($crud->model instanceof \App\Models\FooterBtn) \
                            {{route('admin.save.footer.btn')}} \
                            @elseif($crud->model instanceof \App\Models\StatisticsSection) \
                            {{route('admin.save.statistic.widget.section')}} \
                            @elseif($crud->model instanceof \App\Models\StatisticsWidget) \
                            {{route('admin.save.statistic.widget')}} @endif", {
                        menus: jsonString,
                        isActive: isActive,
                        section: sectionId
                    }, function (resp) {
                        $('#menu-saved-info_'+sectionId).fadeIn('fast').delay(1000).fadeOut('fast');
                    });


                    _super($item, container);

                }
            });

            $("[data-button-type=delete]").unbind('click');
            // CRUD Delete
            // ask for confirmation before deleting an item
            $("[data-button-type=delete]").click(function(e) {
                e.preventDefault();
                var delete_button = $(this);
                var delete_url = $(this).attr('href');

                if (confirm("{{ trans('backpack::crud.delete_confirm') }}") == true) {
                    $.ajax({
                        url: delete_url,
                        type: 'DELETE',
                        success: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('backpack::crud.delete_confirmation_title') }}",
                                text: "{{ trans('backpack::crud.delete_confirmation_message') }}",
                                type: "success"
                            });
                            // delete the row from the table
                            delete_button.parentsUntil('li').parent().remove();
                        },
                        error: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('backpack::crud.delete_confirmation_not_title') }}",
                                text: "{{ trans('backpack::crud.delete_confirmation_not_message') }}",
                                type: "warning"
                            });
                        }
                    });
                } else {
                    new PNotify({
                        title: "{{ trans('backpack::crud.delete_confirmation_not_deleted_title') }}",
                        text: "{{ trans('backpack::crud.delete_confirmation_not_deleted_message') }}",
                        type: "info"
                    });
                }
            });

        });
    </script>
@endsection
