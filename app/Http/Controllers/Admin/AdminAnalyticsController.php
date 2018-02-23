<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DBHelper;
use App\Helpers\TRKHelper;
use Illuminate\Http\Request;

class AdminAnalyticsController extends Controller
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application analytics page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

//        $this->data['browsersStatics'] = $this->getBrowsersStatics();
//        $this->data['countriesStatics'] = $this->getCountriesStatics();

        $analyticsType = basename($request->path());
        $this->data['analyticsType'] = ucfirst($analyticsType);

        $analyticsName = 'analytics_';
        $this->data['analyticsTable'] = DBHelper::allWithOrderAndLimit($analyticsName.$analyticsType, 'id', 30);
        $this->data['analyticsUnique'] = TRKHelper::getUniqueVisitors($analyticsName.$analyticsType);

        return view('admin.analytics', $this->data);
    }
}