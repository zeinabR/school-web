<?php

namespace App\Http\Controllers;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Courses;
// use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
public function __construct()
    {
        $this->middleware('auth:staff');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function insert(Request $request){
    // $coursename = $request->input('coursename');
    // $courseid = $request->input('courseid');
    // DB::insert('insert into Courses (Name,staff_SSN,ID) values(?,?,?)',[$coursename,'5656',$courseid]);
    // echo "Record inserted successfully.<br/>";
    // echo '<a href="/staffCourses">Click Here</a> to go back.';
    // }
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
    public function store(Courses $request)
    {
        //
             $validated = $request->validated();
           $course = new Course;

        $course->Name =  $request->input('coursename');
        $course->staff_id = Auth::id();
       // $request->validate([
       
        //]);
        $course->save();
        $var="insert";
     //   echo "Record inserted successfully.<br/>";
      //  echo '<a href="/staffCourses">Click Here</a> to go back.';
        return view('Success',compact('var'));
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
