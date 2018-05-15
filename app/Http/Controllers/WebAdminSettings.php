<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\webadmin;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebAdminSettings extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:web');
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
        $admin=webadmin::find($id);
                       
                         //if ($level == '/staffStudentsprim')
         return view('Settings.WebAdminSettings',compact('admin'));
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
         $admin= webadmin::find($i);
         $email = $request->input('email');
         $password =$request->input('password');
          $this->validate($request,[
             'phone' => 'regex:/[0-9]/|max:11|min:8',
         ]);
         if ($email != null)
            $admin->email = $email;
         if( $password != null)
            $admin->password =  Hash::make($password);
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
