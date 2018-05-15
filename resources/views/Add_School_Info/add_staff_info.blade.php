@extends('layouts.SAdminHeader')

@section('title')
Add staff's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/add_staff_info.css">

@endsection

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-6 describe">
	<h2 style="font-weight: bold; font-style: italic; color: #f554f5; font-size: 40px;">Here add information of staff </h2>
  <br>
  <p style="color: #cceeff; font-size: 25px; ">  <span>Please fill all fields.If you finish hit (finish) button</span>  </p>
</div>
<div class="col-sm-6 ">
	

<form id="StaffInfo" method="post" action="add_staff_info">
        @csrf


  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus  placeholder="Name">

       @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
    </div>

    <div class="form-group col-md-6">
      <input type="text" class="form-control{{ $errors->has('inputPhone') ? ' is-invalid' : '' }}" name="inputPhone" value="{{ old('inputPhone') }}" id="inputphone" placeholder="Phone" >

       @if ($errors->has('inputPhone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputPhone') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  <br>

<div class="form-row">
    <div class="form-group col-md-6">
      <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus  placeholder="Email">

       @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    </div>

    <div class="form-group col-md-6">
      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" id="password" placeholder="Password" >

       @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
<br>
  <div class="form-group ">
    <input type="text" class="form-control{{ $errors->has('inputAddress') ? ' is-invalid' : '' }}" name="inputAddress" value="{{ old('inputAddress') }}"" id="inputAddress" placeholder="Address">

     @if ($errors->has('inputAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputAddress') }}</strong>
                                    </span>
                                @endif
    </div>
  

<br>
  
<div class="form-group row">
  <div class="text-center col-lg-12" >
    <div class="btn-group  " >
      <button type="submit" class="btn btn-primary" >Save</button>
          <a class="btn btn-primary finish"  href="/Add_School_Info/viewStaffInfo">Finish</a> {{-- type="button" class="btn btn-primary finish" href="/Add_School_Info/viewStaffInfo">Finish</button> --}}
          <button type="button" class="btn btn-primary back" onclick="goBack()" >Back</button>
        </div>  
  </div>
</div></form>
</div>
</div>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>

@endsection








   
