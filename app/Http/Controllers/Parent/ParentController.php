<?php

namespace App\Http\Controllers\Parent;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Models\Users\s_parent;
use App\Models\Users\teacher;
use App\Models\course;
use App\ClassModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
  protected $child_courses=[];
  protected $FirstChild ;

  public function __construct()
    {
        $this->middleware('auth:parent');
    }
	
    public function index()
    {
        $id = Auth::id();
        $parent_info= s_parent::find($id);
        // $childern = $parent_info->childern;
        $childern=DB::table('students')
                       ->where(function ($query) use ($id) {
                            $query->where('parent_id','=', $id);
                       })->get();
            $childe=$childern->first();
            $a= $childe->class_id;
            $school = DB::table('classes')
                          ->select('school_id')
                          ->where('id','=', $a)
                          ->get();

        foreach ($school as $my_school)   
                          $school_id = $my_school->school_id; 
                 
      session(['school_id' => $school_id]);//to show this school events

           $i=0; $j=0;
          // $courses_info[];$teacher[];$exercise[];$all_grades[];
         foreach ($childern as $child ) {

            
          $myClass[] = $child->class_id;

          $Myc[]=ClassModel::find($myClass[$i]);
          // $Myc[] = $child->myClass;
          $schedule = $Myc[$i]['schedule'];
          
          //  $teaches[] = $myClass[$i]->teaches;
            // $i++;
          
            //return $teaches;
          //  $j=0;
            // foreach ($teaches as $teach ) {
             // $course_info[] =course::find($teach['course_id']) ;
            //  $j++;
            // }
          
            //return $course_info;
            $courses_info[] = DB::table('teach')
                          ->join('courses', 'teach.course_id', '=', 'courses.id')
                          // ->join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
                          // ->select('teacher_id','course_id','teachers.name')
                          ->where(function ($query) use ($myClass,$i) {
                          $query->where('teach.class_id','=', $myClass[$i]);
                          })->get();
              // $i++;
              
              // $i=0;
              // foreach ($childern as $child ) {
              //    for ($j=0; $j <= $i+1; $j++) { 
              //    if( empty($courses_info[$i][$j]))
              //           break;
             // $courses[]= course::find($courses_info[$i][$j]->course_id);    
           // $teacher[]= teacher::find($courses_info[$i][$j]->teacher_id );
          // }


            foreach ($courses_info[$i] as $course ) {
                  $ex[]= DB::table('exercises')
                       ->join('courses', 'exercises.course_id', '=', 'courses.id')
                       ->select('exercises.name as Name')
                       ->where(function ($query) use ($course) {
                            $query->where('course_id','=', $course->course_id);
                       })->get();
                  // $ex[] = $exercise;
       
              }


       //          $teacher []= DB::table('teach')
       // ->join('teachers', 'teach.teacher_id', '=', 'teachers.id')
       // ->where(function ($query) use ($myClass,$i) {
       //      $query->where('teach.class_id','=', $Myc[$i]['id']);
       //      })->get();

              $teacher []= DB::table('teach')
       ->join('teachers', 'teach.teacher_id', '=', 'teachers.id')
       // ->select('name')
       ->where(function ($query) use ($myClass,$i) {
            $query->where('teach.class_id','=', $myClass[$i]);
            })->get();


          // $i++;
                        



// return $teacher[1];
          
                         // return $courses_info;
       
       // $exercise[]= DB::table('exercises')
       //                 ->join('courses', 'exercises.course_id', '=', 'courses.id')
       //                 ->get();


        // secion my grades
      $all_grades[] = DB::table('add_grades')
                      ->join('courses', 'add_grades.course_id', '=', 'courses.id')
                      ->select('name','grade')
                      ->where(function ($query) use ($child) {
                        $query->where('student_id','=', $child->id);
                        })->get(); 


    //  $schedule = $myClass[$i]->schedule;

                  $i++;

         }
         // return $ex;

       //return $courses_info[0];
        return view('parent/parent',compact('parent_info','childern','courses_info','teacher','all_grades','myClass','ex','Myc'));
        
      
    }

    protected function DownLoadExercise($CourseId,$ExId){
        $course = session('course');
        $exercises = session('exercise');
        //$ex = $exercises->nth($ExId)->first();
        $i=0;
        foreach ($exercises as $exercise) {
            if($i==$ExId)
            {
                 //return $exercise->EX;
                return Storage::download('public/'.$course->name.'_'.$exercise->Name .'.pdf');
                //return Storage::download('public', $course->name.'downloaded'.'.pdf');
                //('public',$course->name.'.pdf'
            }
            $i++;
        }
        
      return "gg" ;
    }
  }

 //     public function Grades()
 //    {
 //    	$childernCollection = session('childern');
 //    	$i= 1;
 //    	foreach ($childernCollection as $child) {
 //    		$child_id = $child->id;
 //    		$child_grades = DB::table('add_grades')
 //                      ->join('courses', 'add_grades.course_id', '=', 'courses.id')
 //                      ->join('students', 'add_grades.student_id', '=', 'students.id')
 //                      ->where(function ($query) use ($child_id) {
 //                        $query->where('student_id','=', $child_id);
 //                        })->get(); 

 //            $CoursesCounter=1;
 //          foreach ($child_grades as $onecourse) {
 //            $course_id=$onecourse->course_id;
 //            $ChildCoursess = DB::table('courses')
 //                      ->select('name')
 //                      ->where(function ($query) use ($course_id) {
 //                        $query->where('id','=', $course_id);
 //                      })->get(); 
 //                     // return $ChildCoursess;
 //                if($CoursesCounter==1)
 //                  $CoursesNames=$ChildCoursess;
 //                else
 //                 $CoursesNames->push($ChildCoursess);  

 //                $CoursesCounter++;
 //                echo $ChildCoursess;
 //                echo '<br>';
 //          }
 //          //return $CoursesNames;

 //          if ($i==1) {
 //          	$AllCourses=$child_grades;
 //            $FirstChild=$child_id;
 //          }
 //          else
 //  				$AllCourses = $AllCourses->merge($child_grades);         		
          		
 //            $i++;
 //        }
 //        $grouped = $AllCourses->groupBy('child_id');
 //      //return $grouped ;
 //        //return $this->a();
 //            return view('parent/ChildernGrades',compact('grouped','FirstChild','childernCollection'));  		
	// }


 //  public function a()
 //  {
 //    $childernCollection = session('childern');
 //      $TeachersCount= 1;
 //      foreach ($childernCollection as $child) {
 //        $child_id = $child->id;
 //        $ChildTeachers = DB::table('teachers')
 //                      ->join('teach', 'teach.teacher_id', '=', 'teachers.id')
 //                      ->where(function ($query) use ($child_id) {
 //                        $query->where('student_id','=', $child_id);
 //                        })->get(); 
 //          if($TeachersCount==1)
 //            $teachers=$ChildTeachers;
 //          else
 //            $teachers=$teachers->merge($ChildTeachers);
 //      }
 //      return  $teachers;
 //  }

// }
