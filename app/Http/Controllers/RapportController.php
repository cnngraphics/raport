<?php

namespace App\Http\Controllers;

use App\Mail\rapportSubmitted;
use Illuminate\Http\Request;
use \App\Rapport;
use \Carbon\Carbon;
use Auth;
use Exception;
use Mail;



class RapportController extends Controller
{

    protected $month='';
    protected $year='';


    public function __construct()
    {
        $this->middleware('auth');

        $this->month = $this->setMonth();
        $this->year = $this->setYear();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(request()->headers->get('referer')); // is currently logged in user

        $user = Auth::user();
        $cuid= $user->id;
        
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

        // dd($request->input());
        // return redirect('/rapport');
        // Form action target for saving
        
            // Month	Year	Hours	Placements	Videos	Visits	Studies	Comments
            $rapport = new \App\Rapport;
            
            $last = Rapport::find(\DB::table('rapports')->max('id'));
            // dd($last->id);

            $rapport->user_id = $request->user()->id;
            // $rapport->id = $last->id+1;
            $rapport->month = $request->input('Month');
            $rapport->year = $request->input('Year');
            $rapport->Hours = $request->input('Hours');
            $rapport->Placements = $request->input('Placements');
            $rapport->Videos = $request->input('videos');
            $rapport->Visits = $request->input('Visits');
            $rapport->Studies = $request->input('Studies');
            $rapport->Comments = $request->input('Comments');

            // dd($rapport);
            
            try {
                $rapport->push();
                // Submission was successful - send email to admin
                Mail::to($request->user())->send(new rapportSubmitted());
                return redirect('/rapport');
            } catch( Exception $e) {
                dd($e);
                Mail::to($request->user())->send(new rapportSubmissionError());    
        }

        
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
