<?php

namespace App\Http\Controllers\student;
use Illuminate\Support\Facades\Storage;

use App\ClassModel;
use App\Http\Controllers\Controller;
use App\Models\Users\student;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StudentController extends Controller
{
    protected $student_info;
    protected $courses;

    public function __construct()
    {
        $this->middleware('auth:student');
    }
    
    protected function index($indx =1)
    {
        if(Auth::guard('parent')->check()){
               $id=$indx; 
               $student_info= student::find($id);
               $name=$student_info->name;
               $name=$name . "'s";
                }
        else{
            $id = Auth::id();
            $student_info= student::find($id);
            $name="My";
        }
             

      //$day_course=[]; 
      //$student_info= student::find($id);
      //$name=$student_info->name;
      $a= $student_info->class_id;  //a= student's class id
      // return $a;
      $class = ClassModel::find($a);
      $schedule = $class->schedule;
      session(['student_info' => $student_info]);

      $school = DB::table('classes')
                          ->select('school_id')
                          ->where('id','=', $a)
                          ->get();

        foreach ($school as $my_school)   
                          $school_id = $my_school->school_id; 
                 
      session(['school_id' => $school_id]);//to show this school events

        //section my courses
      $courses_info = DB::table('teach')
                          ->join('courses', 'teach.course_id', '=', 'courses.id')
                          ->where(function ($query) use ($a) {
                            $query->where('class_id','=', $a);
                            })->get();

           session(['courses_info' => $courses_info]);
      $teacher = DB::table('teach')
                       ->join('teachers', 'teach.teacher_id', '=', 'teachers.id')
                       ->where(function ($query) use ($a) {
                            $query->where('class_id','=', $a);
                            })->get();

              foreach ($courses_info as $course ) {
                  $ex[]= DB::table('exercises')
                       ->join('courses', 'exercises.course_id', '=', 'courses.id')
                       ->select('exercises.name as Name')
                       ->where(function ($query) use ($course) {
                            $query->where('course_id','=', $course->course_id);
                       })->get();
                  // $ex[] = $exercise;
       
              }

     

        // secion my grades
      $all_grades = DB::table('add_grades')
                      ->join('courses', 'add_grades.course_id', '=', 'courses.id')
                      ->select('name','grade')
                      ->where(function ($query) use ($id) {
                        $query->where('student_id','=', $id);
                        })->get(); 
        // secion schedual
      // $days=['saturday','sunday','monday','tuesday','wednesday','thursday'];

      // for($i = 0; $i < 6; $i++){
      //     $day=$days[$i];
          
      //     $oneday_courses=$courses_info->where('teach_day','=', $day)
      //                           ->sortBy('teach_period');
          
      //       $j=1;
      //     foreach ($oneday_courses as $onecourse) {
      //       while ( $onecourse->teach_period!=$j) {
      //         $day_course[] = '---';
      //         $j++;
      //       }
      //       $day_course[] = $onecourse->name;
      //       $j++;
      //     }
      //     while ($j!=8) {
      //       $day_course[] = '---';
      //         $j++;
      //     }
      //   //  $schedule []=$day_course;
      //     unset($day_course); // $day_course is gone
      // } 
      

      return view('student/student',compact('a','student_info','courses_info','teacher','all_grades','schedule','ex','name'));
    }



      protected function DownLoadExercise($CourseId,$ExId){
        $courses_info = session('courses_info');
        $exercises = session('exercise');
        
        $i=0;
        $course = $courses_info[$CourseId];
        foreach ($exercises as $exercise) {
            if($i==$ExId)
            {
                 //return $exercise->EX;
                return Storage::download('public/'.$course->name.'_'.$exercise->Name .'.pdf');
            }
            $i++;
        }
        
     $var="error";
        return view ('Success',compact('var'));
    }
}
