<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ControlHome extends Controller
{

public function show(Request $request)
    {
         
            if(Auth::guard('web')->check()) {
                $proxy = Request::create('/home_web','GET');
                return \Route::dispatch($proxy);
                }
            else if(Auth::guard('admin')->check()){
                $proxy = Request::create('/Add_School_Info/add_School_info','GET');
                return \Route::dispatch($proxy);
               }
            else if(Auth::guard('teacher')->check()){
                $proxy = Request::create('/home_teacher','GET');
                return \Route::dispatch($proxy);
                }
            else if(Auth::guard('student')->check()){
                $proxy = Request::create('/home_student','GET');
                return \Route::dispatch($proxy);
                }
            else if(Auth::guard('parent')->check()){
                $proxy = Request::create('/home_parent','GET');
                return \Route::dispatch($proxy);
               }
           else if(Auth::guard('staff')->check()){
                $proxy = Request::create('/staffEvents','GET');
                return \Route::dispatch($proxy);
              }
                
           
    }

}

