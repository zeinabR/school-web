<?php

namespace App\Http\Controllers\schoolAdmin;
use App\Http\Controllers\Controller;
use App\student;
use App\Models\Users\school_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;
use DB;

class addStudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $school = school_admin::find(Auth::id())->school;
        $classes = $school->classes;  //lazem 2b3t.hom 34an yzharo fel form
    
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

        $pResults =$school->parents;//lazem 2b3t.hom 34an yzharo fel form
        $pNumber= count($pResults);

        $staffResults =$school->staff;
        $staNumber=count($staffResults);


        $tResults =$school->teachers;
        $tNumber= count($tResults);        
        $s="n";
         return view('Add_School_info.addStudentInfo',compact('s','pResults','classes',
            'stuNumber','pNumber','staNumber','tNumber','school'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              return view('Add_School_info.addStudentInfo');
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
        // $parent_id=DB::table('s_parents')->where('name',$request ->fatherName)->value('id');
        $student=new student;
        $this->validate($request,[
            'Name'=>'required|string|max:50',
            'Email' => 'required|string|email|max:255|unique:students',
            'Password' => 'required|string|min:6',
            'Phone' => 'required|regex:/[0-9]/|max:11|min:8',
            'fatherName'=>'required|string|max:50',
            ]);
        $student ->name = $request ->Name;
        $student ->phone = $request ->Phone ;
        $student ->email = $request ->Email ;
        $student ->password = Hash::make($request->input('Password'));
        $student ->fees=$request->Fees;
        $student ->gender=$request ->Gender;
        $student ->DOB=$request ->DOB;
        $student->image='../images/defaultProfile.jpg';
        $student ->parent_id = $request->fatherName;
        $student ->class_id = $request ->Class;
        $student->save();
        return redirect('Add_School_Info/addStudentInfo');   
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
