<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;

class StaffHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::guard('staff')->check()){
        $id = Auth::id();
        $school = DB::table('staff')
                          ->select('school_id')
                          ->where('id','=', $id)
                          ->first();
        $school_id= $school->school_id;
        session(['school_id' => $school_id]);//to show this school events
                // $proxy = Request::create('/staffEvents','GET');
                // return \Route::dispatch($proxy);
        return view('home');
                }
    }
}
