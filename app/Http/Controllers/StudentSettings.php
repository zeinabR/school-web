<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\student;
use App\ClassModel;
use App\school;
class StudentSettings extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        $students=DB::table('students')
                       // ->where(function ($query) use ($classyear) {
                     //   $query->where('year','=', $classyear);
                        ->where(function ($query) use ($id) {
                        $query->where('id','=', $id );
                        })->get();
        $class=ClassModel::find($students[0]->class_id);
      $school=school::find($class->school_id);
                         //if ($level == '/staffStudentsprim')
         return view('Settings.StudentSettings',compact('students','school','class'));
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
    public function update(Request $request)
    {
        //
        $file = $request->file('profilephoto');
        $i = Auth::id();
         $student= Student::find($i);
         $email = $request->input('email');
         $password =$request->input('password');
         $phone = $request->input('phone');
          $this->validate($request,[
             'phone' => 'regex:/[0-9]/|max:11|min:8',
         ]);
         if ($email != null)
            $student->email = $email;
         if( $password != null)
            $student->password =  Hash::make($password);
        if($phone != null)
            $student->phone = $phone;
        if ($file != null)
        {
             $destinationPath = '../public/images/profile/student';
        $file->move($destinationPath,$file->getClientOriginalName());
        $destinationPath = '/images/profile/student';
         $student->image=$destinationPath.'/'.$file->getClientOriginalName();
        }
        $student->save();
          $var="edited";
        return view ('Success',compact('var'));
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
