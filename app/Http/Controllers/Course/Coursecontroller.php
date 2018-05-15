<?php

namespace App\Http\Controllers\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Users\student;
use App\Models\Users\teacher;

class Coursecontroller extends Controller
{
    protected $student;
    // protected $desired_course;
    // protected $desired_course_id;
    private $grade;

    protected function index($indx)
    {   
        $student = session('student_info');
        $student_id =$student->id;
        $class = $student->class_id;

        $course= DB::table('courses')
                        ->join('teach', 'teach.course_id', '=', 'courses.id')
                        ->where(function ($query) use ($class) {
                        $query->where('class_id','=', $class);
                        })->get();  

        $desired_course = $course->get($indx);        
        $desired_course_id= $desired_course->id;

        $desired_teacher_id = $desired_course->teacher_id;
        $desired_teacher= teacher::find($desired_teacher_id);
		// get_grade();
        $grade_collection = DB::table('add_grades')
                      ->join('students', 'add_grades.student_id', '=', 'students.id')
                      ->join('courses', 'add_grades.course_id', '=', 'courses.id')
                      ->where(function ($query) use ($desired_course_id) {
                        $query->where('course_id','=', $desired_course_id);})
                      ->where(function ($query) use ($student_id) {
                        $query->where('student_id','=', $student_id);
                        })->get();  

                if ($grade_collection->isEmpty()) { 
                    $grade= "No Grade yet";   

                }
                else{  
                    foreach ($grade_collection as $a)   
                        $grade = $a->grade; 
                }

                $exercise= $desired_course->exercise;
                if ($exercise=='') { 
                    $exercise= "No Exercises Were Found";   

                }

		return view('course/course',compact('desired_course','desired_teacher','grade','exercise'));
    }


    private function get_grade(){
        $grade_collection = DB::table('add_grades')
                      ->join('students', 'add_grades.student_id', '=', 'students.id')
                      ->join('courses', 'add_grades.course_id', '=', 'courses.id')
                      ->where(function ($query) use ($desired_course_id) {
                        $query->where('course_id','=', $desired_course_id);})
                      ->where(function ($query) use ($student_id) {
                        $query->where('student_id','=', $student_id);
                        })->get();  

                if (!$grade_collection->isEmpty()) { 
                    $grade= "No Grade yet";   

                }
                else{  
                    foreach ($grade_collection as $a)   
                        $grade = $a->grade; 
                }
    }
    
}