<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class Settings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('student')->check())
       { return redirect()->action('StudentSettings@index');}
        if(Auth::guard('staff')->check())
       { return redirect()->action('StaffSettings@index');}
       if(Auth::guard('parent')->check())
       { return redirect()->action('ParentSettings@index');}
       if(Auth::guard('parent')->check())
       { return redirect()->action('ParentSettings@index');}
       if(Auth::guard('teacher')->check())
       { return redirect()->action('TeacherSettings@index');}
        if(Auth::guard('admin')->check())
       { return redirect()->action('SchoolAdminSettings@index');}
       if(Auth::guard('web')->check())
       { return redirect()->action('WebAdminSettings@index');}
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
