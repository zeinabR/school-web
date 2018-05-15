<?php

namespace App\Http\Controllers\schoolAdmin\Auth;

use App\Models\Users\school_admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

	public function index()
    {
        return view('add_admin');
    }

}