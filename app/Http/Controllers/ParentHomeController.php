<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:parent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::guard('parent')->check()){
                 $proxy = Request::create('/parent/parent','GET');
                return \Route::dispatch($proxy);
        //return view('home');
                }
    }
}
