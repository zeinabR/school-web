<?php

namespace App\Http\Controllers\Teacher;
use App\Models\Users\teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Grade;
use DB;
use App\Http\Controllers\Controller;


class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    
	protected function index()
    {	
        $classes = [];
    	$id = Auth::id();
    	$teacher= teacher::find($id);
    	session(['TeacherId' => $id]);
    	//get teacher's courses
     	$CoursesAndClasses = DB::table('teach')
	                        ->join('courses', 'teach.course_id', '=', 'courses.id')
	                        ->where(function ($query) use ($id) {
	                        $query->where('teacher_id','=', $id);
	                        })->get();
        $Courses = $CoursesAndClasses->groupBy('course_id');
       
        foreach ($Courses as $onecourse) {
        	foreach ($onecourse as $class) {
        		$classID=$class->class_id;
	        	$OneClasse = DB::table('classes')
	        				->where(function ($query) use ($classID) {
	                        $query->where('id','=', $classID);
	                        })->get();
	            $classes[] = $OneClasse;

                $courseId = $class->course_id;
                $CourseExs = DB::table('exercises')
                            ->where(function ($query) use ($courseId) {
                            $query->where('course_id','=', $courseId);
                            })->get();
                $CoursesExs [$courseId] = $CourseExs;
        	}	
        }
	    // secion schedual
	    $days=['saturday','sunday','monday','tuesday','wednesday','thursday'];
	    for($i = 0; $i < 6; $i++){
	        $day=$days[$i];    
	        $oneday_courses=$CoursesAndClasses->where('teach_day','=', $day)
	                                ->sortBy('teach_period');

	        $j=1;
	        foreach ($oneday_courses as $onecourse) {
	            while ( $onecourse->teach_period!=$j) {
		            $day_course[] = '---';
		            $j++;
	            }

	            $day_course[] = $onecourse->name;
	            $j++;
	        }
	        while ($j!=8) {
	            $day_course[] = '---';
	            $j++;
	        }
	        // $schedule []=$day_course;
	        unset($day_course); // $day_course is gone
	    } 

        $school = DB::table('teachers')
                          ->select('school_id')
                          ->where('id','=', $id)
                          ->first();
        $school_id= $school->school_id;
        session(['school_id' => $school_id]);//to show this school events

        session(['CoursesAndClasses' => $CoursesAndClasses]);

        $schedule = $teacher->schedule;
	      return view('Teacher/teacher',compact('teacher','schedule','CoursesAndClasses','Courses','classes','CoursesExs'));
    }

    protected function AddGrades($classID,$courseID)
    {
    	$ClassStudents = DB::table('students')
                            ->where(function ($query) use ($classID) {
                            $query->where('class_id','=', $classID);
                            })->get();

        $course = DB::table('courses')
            				->select('name')
                            ->where(function ($query) use ($courseID) {
                            $query->where('id','=', $courseID);
                            })->first();

        $class = DB::table('classes')
                            ->where(function ($query) use ($classID) {
                            $query->where('id','=', $classID);
                            })->first();              
		session(['ClassStudents' => $ClassStudents]);
		session(['courseID' => $courseID]);
		return view('Teacher/AddGrades',compact('ClassStudents','class','course'));
    }

    public function store(Request $request)
    {
    	$ClassStudents = session('ClassStudents');
    	$courseID = session('courseID');
    	$TeacherId = session('TeacherId');

    	foreach ($ClassStudents as $student) {
            $Sid=$student->id;
            $grade = $request->input("$Sid");        
            if ($grade!=null){
                $answer = DB::table('add_grades')
                            ->where(function ($query) use ($courseID,$Sid) {
                            $query->where([['course_id','=', $courseID],['student_id','=', $Sid]]);
                            })->doesntExist(); 
                if($answer){
        			DB::table('add_grades')->insert(
    	    	    ['teacher_id' => $TeacherId, 'course_id' => $courseID, 'student_id' => $Sid, 'grade' => $grade]);
                }
                else{
                    DB::table('add_grades')
                        ->where(function ($query) use ($TeacherId,$courseID,$Sid) {
                            $query->where([
                                ['teacher_id', '=', $TeacherId],
                                ['course_id', '=', $courseID],
                                ['student_id', '=', $Sid]
                            ]);
                        })->update(['grade' => $grade]);
                 }             
    		}
	    }
        $var="insert";
    	return view("Success",compact('var'));
    }

    public function upload(Request $request)
    {   
        $ClassStudents = session('ClassStudents');
        $TeacherId = session('TeacherId');

        $Classes = session('CoursesAndClasses');
        if (is_array($Classes) || is_object($Classes))
        {
            foreach ($Classes as $course) {           
                
                $course_id=$course->id;
                $course_name=$course->name;
                $file = $request->file("$course_id");
                $ExName1 = $request->input("$course_name");
                if($ExName1==null) 
                    $ExName1="sheet";
                if ($file!=null){
                    $filtered = $Classes->where('course_id',  $course_id);
                    $file =$request->$course_id->storeAs('public',$course->name.'_'.$ExName1.'.pdf');

                    foreach ($filtered as $oneclass) {  
                       DB::table('exercises')->insert(
                        ['course_id' => $course_id, 'EX' => $file, 'name' => $ExName1]);
                    }         
                    $var="insert";
                    return view("Success",compact('var'));
                }
            }
        }
        return "File wasn't added to database";
    }
}