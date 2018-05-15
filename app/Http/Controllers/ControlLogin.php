<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ControlLogin extends Controller
{
	public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
    {

        // $this->validate($request, [
        //     'kind' => 'required|not_in:0'
        // ]);

        $kind = $request->kind;     //selectbox value
        switch ($kind) {
            case 'School admin':
            $proxy = Request::create('login-school','POST');
			return \Route::dispatch($proxy);
                // return redirect()->action('schoolAdmin\Auth\LoginController@login');
                break;
            case 'Teacher':
	            $proxy = Request::create('login-teacher','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Teacher\Auth\LoginController@login');
                break;
            case 'Student':
            	$proxy = Request::create('login-student','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Student\Auth\LoginController@login');
                break;
            case 'Parent':
            	$proxy = Request::create('login-parent','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Parent\Auth\LoginController@login');
                break;
            case 'Staff':
            	$proxy = Request::create('login-staff','POST');
				return \Route::dispatch($proxy);
                // return redirect()->action('Staff\Auth\LoginController@login');
                break;
                
              
           
           
        }
    }

}

