<?php

namespace App\Http\Controllers\schoolAdmin;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Models\Users\school_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;
use DB;
use App\Http\Requests\teacherRequest;
class addTeacherInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
       
    {  
    //      $adminID=Auth::id();
    //     $school_id=DB::table('schools')->where('admin_id',$adminID)->value('id');

    //     $stmt0 = DB::table('s_parents')->where('school_id' , $school_id);
    //     $pResults =$stmt0->get();

        
    //     $stmt1 = DB::table('staff')->where('school_id' , $school_id);
    //     $staffResults =$stmt1->get();

    //     $stmt2 = DB::table('teachers')->where('school_id' , $school_id);
    //     $tResults =$stmt2->get();

    //         $studentResults= DB::table('students')
    //     ->where(function($query)use($pResults){
    //         $query->where('parent_id','=','pResults.id');
    //     })->get();

    //   $stuNumber= count($studentResults);
    // $pNumber= count($pResults);
    // $staNumber=count($staffResults);
    // $tNumber= count($tResults);

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
              return view('Add_School_info.add_teacher_info',compact('pNumber','s','stuNumber','staNumber','tNumber','school'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Add_School_Info.add_teacher_info');    }

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
    public function store(teacherRequest $request)
    {

        $teacher=new Teacher;
        // $adminID=Auth::id();
        // $school_id=DB::table('schools')->where('admin_id',$adminID)->value('id');
         $school = school_admin::find(Auth::id())->school;
        $school_id=$school['id'];
        $teacher ->name = $request ->name;
        $teacher ->phone = $request ->inputPhone ;
        $teacher ->email = $request ->email ;
        $teacher ->password = Hash::make($request->input('password'));
        $teacher ->address = $request ->inputAddress;
        $teacher ->gender=$request ->Gender;
        $teacher ->school_id=$school_id;
        $teacher ->image='../images/defaultProfile.jpg';
        $teacher -> save();
        return redirect('Add_School_Info/add_teacher_info');
        
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
