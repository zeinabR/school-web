<?php
namespace App\Http\Controllers;
use Auth;
use App\ClassModel;
use App\teacher;
use App\Course;
use App\teach;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TeacherScheduleController extends Controller
{
    //protected $teachid;
     public function __construct()
    {
        $this->middleware('auth:staff');
     //   $this->teachid=-1;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staff=Auth::user();
        $school=$staff->school_id;
     //   $classes= DB::table('classes')->get();
        $teachers=DB::table('teachers') ->where(function ($query) use ( $school) {
                        $query->where('school_id','=',  $school);
                        })->get();
    //    $courses=DB::table('courses')->get();
        return view('Staff.staffTeachers',compact('teachers'));
    }
     public function indexSchedule($id)
    {
        $staff=Auth::user();
         $school=$staff->school_id;
        //
         //return $school;

     //   $this->teachid=$id;
       $classes= DB::table('classes') ->where(function ($query) use ( $school) {
                        $query->where('school_id','=',  $school);
                        })->get();
     //  $teachers=DB::table('teachers')->get();
         $courses= DB::table('staff')//->get(); 
                        ->join('courses','staff.id', '=','courses.staff_id')
                        ->where(function ($query) use ($school) {
                        $query->where('staff.school_id','=', $school);
                        })->get(); 
        // return $classes;
        $teacher=teacher::Find($id);
        return view('Staff.staffTeacherSchedule',compact('classes','courses','teacher'));
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
    public function store(Request $request,$id)
    {
        $check=0;
        $teacher= teacher::find($id);
        //echo $id;
        $file = $request->file('schedule');
        if ($file != null)
        {
            $check=1;
         $destinationPath = '../public/images/schedule/teacher';
        $file->move($destinationPath,$file->getClientOriginalName());
        $destinationPath = '../images/schedule/teacher';
        $teacher->schedule=$destinationPath.'/'.$file->getClientOriginalName();
        $teacher->save();
        }
        echo $check;
//         $classes= $request->input('classes');
//         if ($classes != null){
//             $check=1;
//             $c=count($classes);
//         for ($i=0; $i<$c;$i++)
//         {
//            try {
//   // ...
//              $teach = new teach;
//         $teach->class_id= $classes[$i];
//         $k=$classes[$i]-1;
//         $j='course_'.$k;
//         $teach->teacher_id=$id;
//         $teach->course_id=$request->$j;
//         $teach->save();

// } catch (\Illuminate\Database\QueryException $e) {
  //  return Redirect::back()->withErrors(['Please Enter a Valid Course and Class!']);
    
   // return var_dump($e->errorInfo);
// }
//         }
//         if ($check=='1')
//         $var="insert";
//         return view ('Success',compact('var'));
//         }
//             return Redirect::back()->withErrors(['Add at Least a Schedule or a Class To Continue!']);
        // for($i =0; $i<48;$i++){
        // $class_id=$request->Class.$i;
        // $course_id=$request->Course.$i;
        // $teacher_id=$teach_id;
        // $teach=DB::table('teach')
        //                // ->where(function ($query) use ($classyear) {
        //              //   $query->where('year','=', $classyear);
        //                 ->where(function ($query) use ($class_id) {
        //                 $query->where('class_id','=', $class_id);
        //                 ->where(function ($query) use ($course_id) {
        //                 $query->where('course_id','=', $course_id);
        //                 ->where(function ($query) use ($teacher_id) {
        //                 $query->where('teacher_id','=', $teacher_id);
        //                 })->get();

        // }
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
       // $teacher=
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
