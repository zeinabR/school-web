<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/Home';

public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
        
    }
    // protected function authenticated(Request $request, $user)
    // {
    // if (Auth::guard('student')->check()) {// do your margic here
    //    $redirectTo = 'student/student';
    //         // return \Route::dispatch($proxy);
    // }
    // }

    protected function guard()
    {
        return Auth::guard("student");
    }
}
