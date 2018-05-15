<?php

namespace App\Http\Controllers\schoolAdmin;
use App\Http\Controllers\Controller;
use App\Models\Users\Teacher;
use App\Models\Users\school_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;
use DB;
class viewTeacherInfoController extends Controller
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
        return view('Add_School_info.viewTeacherInfo',compact('s','tResults','stuNumber','pNumber','tNumber','staNumber','school'));
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
        $teacher=teacher::find($id);
        $name=$teacher->name;
        $teacher->delete();
        return view('Add_School_info.deletdSuccessfully',compact('name'));    
    }
}
