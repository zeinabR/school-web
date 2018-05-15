<?php

namespace App\Http\Controllers;

use App\school;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mySchool = DB::table('schools')
                    ->get();
        return view('admins.index',compact('mySchool'));
    }

    public function delete($id)
    {
        $school = school::find($id);
        $schoolAdmin = $school->admin;
       
        $myStaff = $school->staff;
   
       $name=$school->name;
         $school->delete();//delete school
       $schoolAdmin->delete();//delete school admin
        $mySchool = DB::table('schools')
                    ->get();
        return view('Add_School_info.deletdSuccessfully',compact('name'));
       
    }
}
