<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use DB;
use Request;
use App\student;
use App\ClassModel;
class staffStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $classname='A';
       // $classyear=$id;
        $level = Request::getPathInfo();
       
        if ($level == '/staffStudentsprim')
        $classlevel='prim';
        elseif ($level == '/staffStudentsprep')
           $classlevel='prep';
        elseif ($level == '/staffStudentssec')
            $classlevel='sec';
     echo $classlevel;
        //session('level');
       
        $classes=DB::table('classes')
                       // ->where(function ($query) use ($classyear) {
                     //   $query->where('year','=', $classyear);
                        ->where(function ($query) use ($classlevel) {
                        $query->where('level','=', $classlevel);
                        })->get();
                       
                         //if ($level == '/staffStudentsprim')
         return view('Staff.staffStudentslist',compact('classes'));
       //  elseif ($level == '/staffStudentsprep') {
       //     return view('Staff.staffStudentsprep',compact('classes'));
       //  }
       //  elseif ($level == '/staffStudentssec') {
       //      return view('Staff.staffStudentssec',compact('classes'));
       // }
        //  @endif             
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
       //$classname='A';
       // $classyear=$id;
        //$classlevel=session('level');
        $classid=$id;
         $students=DB::table('classes')
                        ->join( 'students','students.class_id', '=','classes.id')
                        ->where(function ($query) use ($classid) {
                        $query->where('classes.id','=', $classid);
                        })->get(); 

                        return view('Staff.staffStudents',compact('students'));
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
        $student= Student::find($id);
        $student->fees = Input::get('feeinput');
        $student->save();
          $var="fees";
        return view ('Success',compact('var'));
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
         $student= Student::find($id);
        $student->fees = $request->input('feeinput');
        $student->save();
        return view ('Success');
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
