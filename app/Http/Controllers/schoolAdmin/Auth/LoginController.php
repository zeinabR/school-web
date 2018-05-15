<?php

namespace App\Http\Controllers\schoolAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use DB;
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


//public function know()
   //  {
   //      $stmt = DB::school_admin('select * from schools where admin_id = ?', Auth::id());

   //      if( $stmt)
   //       $redirectTo = '/home';
   //      else 
   //       $redirectTo = '/schoolInfo';//to school info form 
   // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //      $stmt = DB::table('select * from schools where admin_id = ?', Auth::id());
    //     if(! $stmt)
    //      $redirectTo = '/home';
    //     else 
    //      $redirectTo = '/Add_School_Info/add_School_info';//to school info form 
    // }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard("admin");
    }
}
