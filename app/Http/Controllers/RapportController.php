<?php

namespace App\Http\Controllers;

use App\Mail\rapportSubmitted;
use Illuminate\Http\Request;
use \App\Rapport;
use \Carbon\Carbon;
use Auth;
use Mail;


class RapportController extends Controller
{

    protected $month='';
    protected $year='';


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->user()); // is currently logged in user

        Mail::to($request->user())->send(new rapportSubmitted());


        $user = Auth::user();
        // dd($user);

        $cuid= $user->id;

        $this->month = $this->setMonth();
        $this->month = $this->getMonth();

        // $this->year = getYear()->$this->setYear();
        $this->year = $this->setYear();
        $this->year = $this->getYear();
          

        $data = Rapport::all()->where('user_id', $cuid);

        return view('rapport',[
            'rapports'=>$data,
            'thisMonth'=> $this->getMonth(),
            'thisYear' => $this->getYear(),
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setMonth();
        $this->setYear();

        return view('create-rapport', [
            'thisMonth'=> $this->getMonth(),
            'thisYear' => $this->getYear(),
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
        
        return $this->year;
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
        
        return $this->month;
    }
}
