<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 22/01/2018
 * Time: 14:10
 */

namespace App\Http\Controllers\Admin\Api;


use App\Helpers\CrudHelper;
use App\Http\Controllers\Admin\Controller;
use App\Models\SideMenuItem;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin_api');
    }
    public function getRoutes(Request $request) {

        $searchTerm = $request->input('q');

//        return SideMenuItem::paginate(10);
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();

        $routesArray = [];
        foreach ($routeCollection as $value) {
            $uriValue = strtolower($value->uri);
            if (str_contains($uriValue, $searchTerm)) {
                $getPath = [
                    'path' => $uriValue
                ];
                if (in_array($getPath, $routesArray) == false) {
                    array_push($routesArray, $getPath);
                }
            }
        }
        return CrudHelper::paginate($routesArray, 20);

    }
}