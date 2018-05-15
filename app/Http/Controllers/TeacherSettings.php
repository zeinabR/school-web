<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\teacher;
use App\school;

class TeacherSettings extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:teacher');
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
        $teacher=teacher::find($id);
        $school=school::find($teacher->school_id);
                       
                         //if ($level == '/staffStudentsprim')
         return view('Settings.TeacherSettings',compact('teacher','school'));
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
         $teacher= teacher::find($i);
         $email = $request->input('email');
         $password =$request->input('password');
         $phone = $request->input('phone');
         $address = $request->input('address');
          $this->validate($request,[
             'phone' => 'regex:/[0-9]/|max:11|min:8',
         ]);
         if ($email != null)
            $teacher->email = $email;
         if( $password != null)
            $teacher->password =  Hash::make($password);
        if($phone != null)
           $teacher->phone = $phone;
        if($address != null)
           $teacher->address = $address;
        if ($file != null)
        {
             $destinationPath = '../public/images/profile/teacher';
        $file->move($destinationPath,$file->getClientOriginalName());
         $destinationPath = '../images/profile/teacher';
         $teacher->image=$destinationPath.'/'.$file->getClientOriginalName();
        }
        $teacher->save();
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
