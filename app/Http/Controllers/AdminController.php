<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $customers = Customer::lastYear()->countByDate()->get();

        $labels = $customers->map(function ($customer) {
            return date( 'm/d',strtotime($customer->date));
        })->toJson();

        $series = $customers->map(function ($customer) {
            return $customer->count;
        })->toJson();

        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(365));


        $analyticsLabels = [];
        $analyticsSeriesPageViews = [];
        $analyticsSeriesvisitors= [];
        foreach ($analyticsData as $analyticsRow) {
            if($analyticsRow['pageViews'] || $analyticsRow['visitors']) {
                $analyticsLabels[] = $analyticsRow['date']->format('m/d');
                $analyticsSeriesPageViews[] = $analyticsRow['pageViews'];
                $analyticsSeriesvisitors[] = $analyticsRow['visitors'];
            }
        }
        $analyticsLabels = json_encode($analyticsLabels);
        $analyticsSeries = json_encode([$analyticsSeriesPageViews,$analyticsSeriesvisitors]);
        return view('admin.dashboard',compact('labels','series','analyticsLabels','analyticsSeries'));
    }


}
