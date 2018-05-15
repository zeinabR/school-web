<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ControlForgotPass extends Controller
{
	public function showEmail()
    {
        return view('auth.passwords.email');
    }

public function reset(Request $request)
    {

        // $this->validate($request, [
        //     'kind' => 'required|not_in:0'
        // ]);

        $kind = $request->kind;     //selectbox value
        switch ($kind) {
            case 'School admin':
            $proxy = Request::create('admin-passwords/email','POST');
			return \Route::dispatch($proxy);
                // return redirect()->action('schoolAdmin\Auth\LoginController@login');
                break;
            case 'Teacher':
	            $proxy = Request::create('teacher-passwords/email','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Teacher\Auth\LoginController@login');
                break;
            case 'Student':
            	$proxy = Request::create('student-passwords/email','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Student\Auth\LoginController@login');
                break;
            case 'Parent':
            	$proxy = Request::create('parent-passwords/email','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Parent\Auth\LoginController@login');
                break;
            case 'Staff':
            	$proxy = Request::create('staff-passwords/email','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Staff\Auth\LoginController@login');
                break;
                
            default:
                return ;    
           
           
        }
    }

}

