<?php

namespace App\Http\Controllers\schoolAdmin;
use Illuminate\Http\Request;
use  DB;
use App\Http\Controllers\Controller;
use App\Models\Users\s_parent;
use App\Models\Users\school_admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use View;

class addParentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $school = school_admin::find(Auth::id())->school;
        $classes = $school->classes;
    
        $students = array();       
        foreach ($classes as $class) {
            $students[] = $class->students;
        }
        
        $stuNumber=0;
        foreach($students as $student)
        {
            for($j=0;$j<40;$j++)
            {
                if(empty($student[$j]))
                    break;
                else
                    $stuNumber++;

            }

        }

        $pResults =$school->parents;
        $pNumber= count($pResults);


    

        $staffResults =$school->staff;
        $staNumber=count($staffResults);


        $tResults =$school->teachers;
        $tNumber= count($tResults);

        $s="n";


        return view('Add_School_info.addParentInfo',compact('pNumber','s','stuNumber','staNumber','tNumber','school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              return view('Add_School_info.addParentInfo');
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $parent=new s_parent;
          $this->validate($request,[
            "name"=>'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:s_parents',
            'password' => 'required|string|min:6',
            'inputPhone' => 'required|regex:/[0-9]/|max:11|min:8',
            'inputAddress' => 'required|string|min:3',
            "jobName"=>'required|string|max:50',
            'jobPhone' => 'required|regex:/[0-9]/|max:11|min:8',
            'jobAddress' => 'required|string|min:3',

        ]);
        // $adminID=Auth::id();
        // $school_id=DB::table('schools')->where('admin_id',$adminID)->value('id');
        $school = school_admin::find(Auth::id())->school;
        $school_id=$school['id'];
        $parent ->name = $request ->name;
        $parent ->phone = $request ->inputPhone ;
        $parent ->email = $request ->email ;
        $parent ->password = Hash::make($request->input('password'));
        $parent ->address = $request ->inputAddress;
        $parent ->j_name = $request ->jobName;
        $parent ->j_address = $request ->jobAddress;
        $parent ->j_phone = $request ->jobPhone;
        $parent->image='../images/defaultProfile.jpg';
        $parent ->school_id=$school_id;;


        $parent -> save();
        return redirect('Add_School_Info/addParentInfo');
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
