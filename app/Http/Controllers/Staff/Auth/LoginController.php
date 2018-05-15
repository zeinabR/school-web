<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
    protected $redirectTo = '/Home';

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
        $this->middleware('guest:staff')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     return 'string';
    // if ( $user->isAdmin() ) {// do your margic here
    //     return redirect()->intended('/staffEvents');;
    // }

     // return redirect('/home');
    // }

    protected function guard()
    {
        return Auth::guard("staff");
    }
}
