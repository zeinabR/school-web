<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users\school_admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class add_school_admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Add_IT_Admin.add_IT_admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin =new school_admin;
        $this->validate($request,[
            "name"=>'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:school_admins',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|regex:/[0-9]/|max:11|min:8',
            'address' => 'required|string|min:3',
        ]);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->phone = $request->input('phone');
        $admin->address = $request->input('address');
        $admin->web_id = Auth::id();
        $admin ->image='../images/defaultProfile.jpg';
        $admin->save();
        return redirect('/home_web');
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
