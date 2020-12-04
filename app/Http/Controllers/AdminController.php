<?php

namespace App\Http\Controllers;

use App\AppDownload;
use App\Customer;
use Carbon\Carbon;
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
            return date( 'd',strtotime($customer->date));
        })->toJson();

        $seriesC = $customers->map(function ($customer) {
            return $customer->count;
        });
        $series = $seriesC->toJson();
        $seriesSorted = $seriesC->sort();
        $serieSmallest = round($seriesSorted->first() * 0.5);
        $serieBiggest = round($seriesSorted->last() * 1.2);

        $appDownloads = AppDownload::lastYear()->countByDate()->get();
        $downloadLabels = $appDownloads->map(function ($appDownload) {
            return date( 'd',strtotime($appDownload->date));
        })->toJson();

        $downloadS = $appDownloads->map(function ($appDownload) {
            return $appDownload->count;
        });

        $downloadSeries = $downloadS->toJson();
        $downloadSeriesSorted  = $downloadS->sort();
        $downloadSerieSmallest = round($downloadSeriesSorted->first() * 0.5);
        $downloadSerieBiggest = round($downloadSeriesSorted->last() * 1.2);



        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::create(Carbon::now()->subDays(60),now()));
        $analyticsLabels = [];
        $analyticsSeriesPageViews = [];
        $analyticsSeriesvisitors= [];
        $analyticsSerieSmallest = 100000000;
        $analyticsSerieBiggest = 0;
        foreach ($analyticsData as $analyticsRow) {
            if($analyticsRow['pageViews'] || $analyticsRow['visitors']) {
                $analyticsLabels[] = $analyticsRow['date']->format('d');
                $analyticsSeriesPageViews[] = $analyticsRow['pageViews'];
                $analyticsSeriesvisitors[] = $analyticsRow['visitors'];
                if($analyticsRow['visitors'] < $analyticsSerieSmallest) $analyticsSerieSmallest = $analyticsRow['visitors'];
                if($analyticsRow['pageViews'] > $analyticsSerieBiggest) $analyticsSerieBiggest = $analyticsRow['pageViews'];
            }
        }
        if($analyticsSerieBiggest !== 0) {
            $analyticsSerieBiggest = round($analyticsSerieBiggest * 1.2);
            $analyticsSerieSmallest = round($analyticsSerieSmallest * 0.5);
        } else {
            $analyticsSerieSmallest = 0;
            $analyticsSerieBiggest = 100;
        }
        $analyticsLabels = json_encode($analyticsLabels);
        $analyticsSeries = json_encode([$analyticsSeriesPageViews,$analyticsSeriesvisitors]);


        return view('admin.dashboard',compact(
            'labels','series',
            'analyticsLabels','analyticsSeries',
            'serieSmallest','serieBiggest',
            'analyticsSerieSmallest','analyticsSerieBiggest',
            'downloadLabels', 'downloadSeries',
            'downloadSerieSmallest','downloadSerieBiggest'
        ));
    }


}
