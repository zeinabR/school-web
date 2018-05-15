<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers;
use App\ParentModel;
use App\Student;
class ParentSettings extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:parent');
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
       $parent=ParentModel::find($id);
       $children=DB::table('students')
                       // ->where(function ($query) use ($classyear) {
                     //   $query->where('year','=', $classyear);
                        ->where(function ($query) use ($id) {
                        $query->where('parent_id','=', $id );
                        })->get();    
                         //if ($level == '/staffStudentsprim')
         return view('Settings.ParentSettings',compact('parent','children'));
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
        //address,job name, job address, job phone
         $file = $request->file('profilephoto');
         $i = Auth::id();
         $parent= ParentModel::find($i);
         $email = $request->input('email');
         $password =$request->input('password');
         $phone = $request->input('phone');
         $address = $request->input('address');
         $job = $request->input('job');
         $jobaddress = $request->input('jobaddress');
         $jobphone = $request->input('jobphone');
          $this->validate($request,[
             'phone' => 'regex:/[0-9]/|max:11|min:8',
             'jobphone' => 'regex:/[0-9]/|max:11|min:8',
         ]);
         if ($email != null)
            $parent->email = $email;
         if( $password != null)
            $parent->password =  Hash::make($password);
        if($phone != null)
           $parent->phone = $phone;
       if($address != null)
           $parent->address = $address;
       if($job != null)
           $parent->j_name = $job;
       if($jobaddress != null)
           $parent->j_address = $jobaddress;
       if($jobphone != null)
           $parent->j_phone = $jobphone;
        if ($file != null)
        {
             $destinationPath = '..public/images/profile/parent';
        $file->move($destinationPath,$file->getClientOriginalName());
         $destinationPath = '/images/profile/parent';
         $parent->image=$destinationPath.'/'.$file->getClientOriginalName();
        }
        $parent->save();
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
