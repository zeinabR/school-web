<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\ClassModel;

class ScheduleController extends Controller
{
	//public $classes;
     public function __construct()
    {
    	//$this->classes=null;
        $this->middleware('auth:staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //;
        // $classes= $this->classes;         
        return view('Staff.staffSchedule');//,compact('classes'));
       
        // $this->classes+=null;
        // $classes= $this->classes;          
        // return view('Staff.staffSchedule',compact('classes'));
         
    }
    // public function showclasses(Request $request){
    // 	$classlevel ='prep';// $request->level;//Input::get('level');
    // 	echo $classlevel;
    // 	 $this->classes=DB::table('classes')
    //                    // ->where(function ($query) use ($classyear) {
    //                  //   $query->where('year','=', $classyear);
    //                     ->where(function ($query) use ($classlevel) {
    //                     $query->where('level','=', $classlevel);
    //                     })->get();
    //      $classes= $this->classes;         
    //     return view('Staff.staffSchedule',compact('classes'));
    // }

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
       /* if($request->hasFile('img') && $request->file('img')->isValid()){
        $file = $request->file('img');
        $file_name = str_random(30) . '.' . $file->getClientOriginalExtension();
        $file->move(base_path() . '/assets/img', $file_name);
    }*/

        /*  $path = $request->file('avatar')->store('avatars');
         return $path;
         */

        /*$file = $request->file('image');
		//Display File Name
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';
		//Display File Extension
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
		//Display File Real Path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';
		//Display File Size
		echo 'File Size: '.$file->getSize();
		echo '<br>';
		//Display File Mime Type
		echo 'File Mime Type: '.$file->getMimeType();
		//Move Uploaded File
		$destinationPath = 'uploads';
		$file->move($destinationPath,$file->getClientOriginalName());
		*/

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
    public function edit(Request $request)
    {
        //
        $id = $request->classinfo;
        $class=ClassModel::Find($id);
        //echo $id;
        if(!empty($class)){
        $file = $request->file('schedule');
		// //Display File Name
		
		// //echo 'File Extension: '.$file->getClientOriginalExtension();
		// //Move Uploaded File
		 $destinationPath = '../public/images/schedule/class';
		// //Storage::move('old/file1.jpg', 'new/file1.jpg');
		$file->move($destinationPath,$file->getClientOriginalName());
         $destinationPath = '../images/schedule/class';

		$class->schedule=$destinationPath.'/'.$file->getClientOriginalName();
		// // echo $class->schedule;
		// // echo 'x';
		// // echo $destinationPath;
		// // echo $file->getClientOriginalName();
		$class->save();
		  $var="insert";

        return view ('Success',compact('var'));
    }
    else {
        $var ="error";
        return view('Success',compact('var'));
    }
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
        /*
       $input = Input::file('schedule');
    $destinationPath = '../images/'; // path to save to, has to exist and be writeable
    $filename = $input->getClientOriginalName(); // original name that it was uploaded with
    $input->move($destinationPath,$fileName); // moving the file to specified dir with the original name

    $class=get
    $class->schedule=$destinationPath.'/'.$fileName;
    $class->save();
    return view('Success')
    */
    $staff=Auth::user();
    $school = $staff->school_id;
    $classlevel = $request->level;//Input::get('level');
    	//echo $classlevel;
    	$classes=DB::table('classes')
                       // ->where(function ($query) use ($classyear) {
                     //   $query->where('year','=', $classyear);
                        ->where(function ($query) use ($classlevel,$school) {
                        $query->where([['level','=', $classlevel],['school_id'=$school]);
                        })->get(); 
        return view('Staff.staffScheduleAdd',compact('classes'));
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
	