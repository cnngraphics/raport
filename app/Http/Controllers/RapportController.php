<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rapport;
use \Carbon\Carbon;

class RapportController extends Controller
{

    protected $month='';
    protected $year='';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = $this->setMonth()->getMonth();
        $y = $this->setYear()->getYear();
      
      
        $data = Rapport::all();

  
        //$data = collect(['month'=>$m, 'year'=>$y]);
    //   dd($data);
        // return view('raport', $this->compact('data'));
        return view('rapport',[
            'rapports'=>$data,

            //this part is good
            'thisMonth'=> $this->getMonth(),
            'thisYear' => $this->getYear()
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'month' => $this-getMonth(),
            'year' => $this->getYear()
        ];

        return view('create-rapport', [
            'rapports'=>$data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year = null)
    {
        if($year != null){
            $this->year = $year;
        } else {
            $date = Carbon::today(); 
            $this->year = $date->year;
        }

        $date = Carbon::today();    
        $this->year = $date->year;
        
        return $this;
    }

    /**
     * Get the value of month
     */ 
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set the value of month
     *
     * @return  self
     */ 
    public function setMonth($month=null)
    {
        if($month!=null) {
            $this->month = $month;
        } else {
            $date = Carbon::today();    
            $this->month = $date->monthName;

        }
        
        return $this;
    }
}
