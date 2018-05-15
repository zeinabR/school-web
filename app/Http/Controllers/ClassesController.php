<?php

namespace App\Http\Controllers;
use App\ClassModel;
use DB;
use Auth;
use App\Staff;
use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:staff');
    }
    public function index()
    {
        //
        return view ('Staff.staffClasses');
    }
    public function indexTeacher($id)
    {
        $j=0;
        //
        $teacher=teacher::Find($id);
        $teacherId=$teacher->id;
        $teach=DB::table('teach') ->where(function ($query) use ($teacherId) {
                        $query->where('teacher_id','=', $teacherId);
                        })->get();
        $c =count($teach);
        for ($i=0;$i<$c;$i++)
        {
            $idteach=$teach[$i]->class_id;
            $classes[$i]= DB::table('classes') ->where(function ($query) use ($idteach) {
                        $query->where('id','=', $idteach);
                        })->get();
                        if ($classes[$i]==null)
                        {
                            $j++;
                        } 
        }
        if($c == $j)
        {
            return Redirect::back()->withErrors(['This Teacher Doesn`t Have Any Classes Yet!']);
        }
      //  echo $classes[0];   
        return view ('Staff.staffDeleteClasses',compact('classes','teacher'));
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
        try{
             $id = Auth::id();
        $staff= Staff::find($id); 
        $class = new ClassModel;
        $class->staff_id=Auth::id();
         $this->validate($request,[
             'name' => 'alpha:/|max:1|min:1',
              'year' => 'regex:/[0-9]/|max:2|min:1',
         ]);
        $class->name = $request->input('name');
        $class->year=$request->input('year');
        $class->level = $request->level;     //selectbox value
        $class->school_id=$staff->school_id;
        $class->save();
        $var='insert';
        return view ('Success',compact('var'));
        }
       catch (\Illuminate\Database\QueryException $e) {
    return Redirect::back()->withErrors(['This Class Already Exists!']);
}
        
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
    public function destroy(Request $request,$id)
    {
        //delete from teach table by course id
        try{
              $classes= $request->input('classes');
         $teacher=$id;
          if ($classes == null)
          {
            return Redirect::back()->withErrors(['Please Select The Classes You Want To Remove!']);
          }
         $c=count($classes);
        for ($i=0; $i<$c;$i++)
        {
            $class=$classes[$i];
        $teach= DB::table('teach')->where(function ($query) use ($teacher) {
                        $query->where('teacher_id','=', $teacher);
                        })->where(function ($query) use ($class) {
                        $query->where('class_id','=', $class);
                        });
       // foreach ($teach as $taught) {
            # code...
             $teach->delete();
       // }
       
        }
       

}catch (\Illuminate\Database\QueryException $e) {
    return Redirect::back()->withErrors(['This element Can`t Be Deleted!']);
    
   // return var_dump($e->errorInfo);
}
 $var="delete";
 return view('Success',compact('var'));
}
}
