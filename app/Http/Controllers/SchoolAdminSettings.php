<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\SchoolAdmin;
use App\school;

class SchoolAdminSettings extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
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
        $admin=SchoolAdmin::find($id);
        $schools = $classes=DB::table('schools')
                       // ->where(function ($query) use ($classyear) {
                     //   $query->where('year','=', $classyear);
                        ->where(function ($query) use ($id) {
                        $query->where('admin_id','=', $id);
                        })->get();
                         //if ($level == '/staffStudentsprim')
         return view('Settings.SchoolAdminSettings',compact('admin','schools'));
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
         $admin= SchoolAdmin::find($i);
         $email = $request->input('email');
         $password =$request->input('password');
         $phone = $request->input('phone');
         $address = $request->input('address');
          $this->validate($request,[
             'phone' => 'regex:/[0-9]/|max:11|min:8',
         ]);
         if ($email != null)
            $admin->email = $email;
         if( $password != null)
            $admin->password =  Hash::make($password);
        if($phone != null)
           $admin->phone = $phone;
       if($address != null)
           $admin->address = $address;
        if ($file != null)
        {
             $destinationPath = '../public/images/profile/admin';
        $file->move($destinationPath,$file->getClientOriginalName());
         $destinationPath = '../images/profile/admin';
         $admin->image=$destinationPath.'/'.$file->getClientOriginalName();
        }
        $admin->save();
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
