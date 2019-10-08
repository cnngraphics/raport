<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use App\Charts\dashboardChartOverview;


class HomeController extends Controller
{
    public $monthArray = array();
    public $hoursArray = array();
    public $placementArray = array();
    public $videosArray = array();
    public $visitsArray = array();
    public $studiesArray = array();

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


        /**
         * CHART SECTION
         */

        $data = new \App\Rapport;
        $dataMonths = $data->All();

        foreach( $dataMonths as $k=>$v){

//          print($dataMonths[$k]->month);

            array_push($this->monthArray, $dataMonths[$k]->month );

            array_push($this->hoursArray,       $dataMonths[$k]->Hours );
            array_push($this->placementArray,   $dataMonths[$k]->Placements );
            array_push($this->videosArray,      $dataMonths[$k]->Videos );
            array_push($this->visitsArray,      $dataMonths[$k]->visits );
            array_push($this->studiesArray,     $dataMonths[$k]->studies );

        }
//        dd($this->hoursArray);

        $chart = new dashboardChartOverview();
        $chart->labels($this->monthArray);
        $chart->dataset("Hours per Month", 'line', $this->hoursArray);
        $chart->dataset('Videos', 'line', $this->videosArray);
        $chart->dataset('Placements', 'line', $this->placementArray);

//
//        $chart = new \App\Charts\dashboardChartOverview();
//        $chart->labels($this->monthArray);
//        $chart->title("Month Over Month Progress");
//        $chart->dataset('Months', 'line', $this->monthArray);



        // END CHART SECTION



        $date = Carbon::today();
        $thisMonth = $date->monthName;
        $thisYear = $date->year;
        
        return view('home', [
            'thisMonth'=> $thisMonth,
            'thisYear'=> $thisYear,
            'chart'=> $chart,
        ]);
    }

    public function chartMaker(){
        $data = new \App\Rapport;
        $dataMonths = $data->All();

        foreach( $dataMonths as $k=>$v){

//            print($dataMonths[$k]->month);

            array_push($this->monthArray, $dataMonths[$k]->month );
        }

        $chart = new \App\Charts\dashboardChartOverview();
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset', 'line', $this->monthArray);

        return view('home', compact('chart'));

    }
}
