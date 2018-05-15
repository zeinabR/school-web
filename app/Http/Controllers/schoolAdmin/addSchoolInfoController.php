<?php

namespace App\Http\Controllers\schoolAdmin;
use Illuminate\Http\Request;
use  DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\school;
use App\Models\Users\school_admin;

use Illuminate\Support\Facades\Auth;
use View;

class addSchoolInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $school = school_admin::find(Auth::id())->school;
        if(!$school)
        {
            $tNumber=0;
            $staNumber=0;
            $stuNumber=0;
            $pNumber= 0;

        }
        else
        {

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

        }
        $s="y";
        return view('Add_School_info.add_School_info',compact('s','school','studentResults','pNumber','stuNumber','staNumber','tNumber'));
    }
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Add_School_Info.add_staff_info ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function guard()
    {
        return Auth::guard("admin");
    }
    public function store(Request $request)
    {

        $this->validate($request,[
            "name"=>'required|string|max:50',
            'inputPhone' => 'required|regex:/[0-9]/|max:11|min:8',
            'inputAddress' => 'required|string|min:3',
            'inputVision' => 'required|string|max:255',
            'inputMission' => 'required|string|max:255',
        ]);

    	$school=new school;
        $school->name=$request->name;
        $school->phone=$request->inputPhone;
        $school->address=$request->inputAddress ;
        $school->vision=$request->inputVision ;
        $school->mission=$request->inputMission;
        $school->admin_id=Auth::id();
        $school->save();
        return redirect('Add_School_Info/add_staff_info ')->with('school created successfully');

    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Add_School_info.add_School_info');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school= school::find($id);
        $school->name=Input::get('name');
        $school->phone=Input::get('inputPhone');
        $school->address=Input::get('inputAddress');
        $school->vision=Input::get('inputVision');
        $school->mission=Input::get('inputMission');
        $school->save();
        $var="u";
        return view ('Success',compact('var'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
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
