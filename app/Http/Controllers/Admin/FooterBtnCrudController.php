<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Models\FooterBtn;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FooterBtnRequest as StoreRequest;
use App\Http\Requests\FooterBtnRequest as UpdateRequest;

class FooterBtnCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\FooterBtn');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/footerbtn');
        $this->crud->setEntityNameStrings('footerbtn', 'footer_btns');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setListView('admin.pages.footer_btns_manager.create');
        $this->crud->setCreateView('admin.pages.footer_btns_manager.create');

        $this->crud->enableAjaxTable();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields([
            [
                'name' => "name",
                'label' => "Name",
                'type' => "text",
            ],
            [
                // 1-n relationship
                'label' => "Path", // Table column heading
                'type' => 'view',
                'name' => 'path',
                'attribute' => 'path',
                'view' => "admin/pages/crud/select2_from_ajax_without_model",
                'data_source' => backpack_url("api/routes?api_token=".AdminHelper::apiToken()), // url to controller search function (with /{id} should return model)
                'placeholder' => "Select a route", // placeholder for the select
                'minimum_input_length' => 2, // minimum characters to type before querying results
            ],
            [
                'name' => "icon",
                'label' => "Icon",
                'type' => 'icon_picker',
                'iconset'=> 'fontawesome'
            ],
            [
                'name'  => 'is_active',
                'label' => "Active",
                'type' => "checkbox",
            ]
        ], 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        $this->crud->addColumns([
            [
                'name' => "name",
                'label' => "Name",
                'type' => "text",
            ],
            [
                'name' => "path",
                'label' => "Path",
                'type' => "text",
            ],
            [
                'name' => "sort",
                'label' => "Sort",
                'type' => "number",
            ],
            [
                'name' => "icon",
                'label' => "Icon",
                'type' => 'model_function',
                'function_name' => 'getIcon',
            ],
            [
                'name'  => 'is_active',
                'label' => "is Active",
                'type' => "model_function",
                'function_name' => 'getActiveStatus',
            ],
            [
                'label' => "Parent",
                'name' => "parent_id",
                'model' => FooterBtn::class,
                'entity' => "parent",
                'attribute' => "name",
                'type' => "select",
            ]
        ]); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function saveFooterBtn(UpdateRequest $request) {
        $post = $request->input('menus');
        $isActive =  $request->input('isActive');
        $post = json_decode($post,true);

        $savedArray = [];
        $i = 1;
        foreach($post[0] as $ro) {

            $pid = $ro['id'];
            if(isset($ro['children'])) {
                $ci = 1;
                foreach($ro['children'][0] as $c) {
                    $cpid = $c['id'];
                    if(isset($c['children'][0])) {
                        $subCi = 1;
                        foreach($c['children'][0] as $subC) {
                            $id = $subC['id'];
                            FooterBtn::where('id',$id)->update(['sort'=>$subCi,'parent_id'=>$cpid,'is_active'=>$isActive]);
                            $subCi++;
                        }
                    }
                    $id = $c['id'];
                    FooterBtn::where('id',$id)->update(['sort'=>$ci,'parent_id'=>$pid,'is_active'=>$isActive]);
                    $ci++;
                }
            }
            array_push($savedArray, $ro);

            FooterBtn::where('id',$pid)->update(['sort'=>$i,'parent_id'=>0,'is_active'=>$isActive]);
            $i++;
        }
        return response()->json(['success'=>true, 'list' => $savedArray]);
    }
}
