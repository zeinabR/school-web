@extends('layouts.header')

@section('css')
    <link rel="stylesheet" href="../css/login.css">
@endsection

@section('content')
 <div  class="form">
     <div class=" overlay"  >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form method="POST"  action="{{ route('login.admin') }}" >
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                             <div class="col-sm-6 text-right  ">
                                {{-- @section('login') --}}
                            
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
                               {{-- @endsection --}}
                            </div>
                            

                            <div class="col-sm-4  text-right">
                                <div class="checkbox ">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                           
                        </div>
                       
                            <div class="col-sm-5 ml-auto forget">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-info submit" style="color:#ff9900;background-color: #112D3B">
                                    {{ __('Login') }}
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


