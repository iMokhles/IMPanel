<!-- SideItem Type field -->
<!-- Used in SideMenuItem -->

<?php
    $field['options'] = ['page' => "Page", 'url' => "URL"];
    $field['allows_null'] = false;
    $page_model = $field['page_model'];
    $active_pages = $page_model::all();
?>

<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <div class="clearfix"></div>

    <div class="col-sm-3">
        <select
            id="page_or_link_select"
            name="{{ $field['name'] or 'type' }}"
            @include('crud::inc.field_attributes')
            >

            @if (isset($field['allows_null']) && $field['allows_null']==true)
                <option value="">-</option>
            @endif

                @if (count($field['options']))
                    @foreach ($field['options'] as $key => $value)
                        <option value="{{ $key }}"
                            @if (isset($field['value']) && $key==$field['value'])
                                 selected
                            @endif
                        >{{ $value }}</option>
                    @endforeach
                @endif
        </select>
    </div>
    <div class="col-sm-9">
          <!-- internal link input -->
          <div class="page_or_link_value <?php if (!isset($entry) || $entry->type != 'url') {
                echo 'hidden';
} ?>" id="page_or_link_url">
            <input
                type="text"
                class="form-control"
                name="path"
                placeholder="{{ trans('backpack::crud.internal_link_placeholder', ['path', url(config('backpack.base.route_prefix').'/page')]) }}"

                @if (!isset($entry) || $entry->type!='url')
                    disabled="disabled"
                  @endif

                @if (isset($entry) && $entry->type=='url' && isset($entry->path) && $entry->path!='')
                    value="{{ $entry->path }}"
                @endif
                >
          </div>
          <!-- page slug input -->
          <div class="page_or_link_value <?php if (isset($entry) && $entry->type != 'page') {
                echo 'hidden';
} ?>" id="page_or_link_page">
            <select
                class="form-control"
                name="page_slug"
                >
                @if (!count($active_pages))
                    <option value="">-</option>
                @else
                    @foreach ($active_pages as $key => $page)
                        <option value="{{ $page->slug }}"
                            @if (isset($entry) && isset($entry->path) && str_contains($entry->path, $page->slug))
                                 selected
                            @endif
                        >{{ $page->name }}</option>
                    @endforeach
                @endif

            </select>
          </div>
    </div>
    <div class="clearfix"></div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

</div>


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))

    {{-- FIELD CSS - will be loaded in the after_styles section --}}
    @push('crud_fields_styles')
    @endpush

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
            jQuery(document).ready(function($) {

                $("#page_or_link_select").change(function(e) {
                    $(".page_or_link_value input").attr('disabled', 'disabled');
                    $(".page_or_link_value select").attr('disabled', 'disabled');
                    $(".page_or_link_value").removeClass("hidden").addClass("hidden");


                    switch($(this).val()) {
                        case 'url':
                            $("#page_or_link_url input").removeAttr('disabled');
                            $("#page_or_link_url").removeClass('hidden');
                            break;

                        default: // page_link
                            $("#page_or_link_page select").removeAttr('disabled');
                            $("#page_or_link_page").removeClass('hidden');
                    }
                });

            });
        </script>
    @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
