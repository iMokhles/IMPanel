<?php

namespace App\Http\Controllers\Admin\Requests;

use Backpack\CRUD\app\Http\Requests\CrudRequest;

class AdminUpdateCrudRequest extends CrudRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required',
            'name'     => 'required',
            'password' => 'confirmed',
        ];
    }
}
