@extends('layouts.header')
{{-- @extends('layouts.footer') --}}
@section('css')
     <link rel="stylesheet" href="../css/forgotPass.css">
@endsection

@section('content')
<div class="container">
   <div class="text-center  content" >
        <i class="fa fa-lock fa-5x" ></i>
        <p style="font-size: 26px;margin-bottom: 8px;">Forgot Password?</p>
        <p style="font-size: 14px;color: #737373;margin-bottom: 20px;">You can reset your password here.</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     

                    <form method="POST" action="{{ route('forgotPass') }}">
                        @csrf

                        <div class="form-group ">
                            <div class="input-group" >
                                 <span class="input-group-addon"><i class="fa fa-envelope color-blue"></i></span>
                                <input style="border-radius:0px; height: 38px;" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                         <div class="form-group ">
                             <label>
                                Login as
                            </label>
                        
                            <select name="kind" required>
                                <option ></option>
                                <option value="School admin">School admin</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Student">Student</option>
                                <option value="Parent">Parent</option>
                                <option value="Staff">Staff</option>
                            </select> 
                        </div>
                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn-info submitbutton">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
