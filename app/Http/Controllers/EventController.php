<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Events;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        if(Auth::guard('student')->check())
            $this->middleware('auth:student');
         if(Auth::guard('teacher')->check())
             $this->middleware('auth:teacher');
         if(Auth::guard('parent')->check())
             $this->middleware('auth:parent');
         if(Auth::guard('staff')->check())
         $this->middleware('auth:staff');
        
    }
    
    public function index()
    {
        //should put school_id in session in each user page, i put it only in student case
        //Added also in teacher and parent
        //reminder Staff and School admin
        $school_id = session('school_id');
        
        $school_events = DB::table('staff')
                          ->join('events', 'events.staff_id', '=', 'staff.id')
                          ->where(function ($query) use ($school_id) {
                            $query->where('school_id','=', $school_id);
                            })->get();
                
                        
        return view('Events.event',compact('school_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function insert(Request $request){
    // $addeventname = $request->input('addeventname');
    // $addeventtext = $request->input('addeventtext');
    // $addeventtime = $request->input('addeventtime');
    // $addeventloc = $request->input('addeventloc');
    // DB::insert('insert into events (Name,Description,staff_SSN,ID,Type,Location,Time) values(?,?,?,?,?,?,?)',[$addeventname,$addeventtext,'5656',1,'x',$addeventloc,$addeventtime]);
    // echo "Record inserted successfully.<br/>";
    // echo '<a href="/staffEvents">Click Here</a> to go back.';
    // }
    public function store(Events $request)
    {
        //
          $validated = $request->validated();
        $event = new Event;
        $event->Name = $request->input('eventname');
        $event->Location = $request->input('eventloc');
        $event->Type=$request->input('eventtype');
        $event->Description = $request->input('eventtext');
        $event->staff_id = Auth::id();
        $event->save();
        return view ('Success');
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
}
    