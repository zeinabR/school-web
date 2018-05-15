<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    public function welcome(){
        return view('welcome');
    }

    public function home(){
        $id = Auth::id();
        $school = DB::table('staff')
                          ->select('school_id')
                          ->where('id','=', $id)
                          ->first();
        $school_id= $school->school_id;
        session(['school_id' => $school_id]);//to show this school events
        return view('index');
    }

    public function login(){
        return view('Login.login');
    }

    public function forgetPass(){
        return view('Login.forgetPass');
    }

    public function logOut(){
        return view('Logout.logout');
    }

    public function staffEvents(){
        return view('Staff.staffEvents');
    }

    public function staffMessages(){
        return view('Staff.staffMessages');
    }

    // public function staffStudents(){
    //     return view('Staff.staffStudents');
    // }

    // public function staffStudentsprim(){
    //     return view('Staff.staffStudentsprim');
    // }

    // public function staffStudentsprep(){
    //     return view('Staff.staffStudentsprep');
    // }

    // public function staffStudentssec(){
    //     return view('Staff.staffStudentssec');
    // }

    public function staffTeachers(){
        return view('Staff.staffTeachers');
    }

    public function staffCourses(){
        return view('Staff.staffCourses');
    }

   
    public function contactus(){
        return view('contact us.contact us');
    }

    public function about(){
        return view('about.about');
    }
}
