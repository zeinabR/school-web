@extends('layouts.SAdminHeader')

@section('title')
Add teacher's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/addTeacherInfo.css">

@endsection

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-6 describe">
	<h2 style="font-weight: bold; font-style: italic; color: #f554f5; font-size: 40px;">Here add information of teachers </h2>
  <br>
  <p style="color: #cceeff; font-size: 25px; ">  <span>Please fill all fields.If you finish hit (finish) button</span>  </p>
</div>
<div class="col-sm-6 ">
	

<form id="teacherInfo" method="post" action="add_teacher_info">
        @csrf


  <div class="form-row">
    <div class="form-group col-sm-1 " id="rightLabels">   
       <label>Name:</label>
    </div>
    <div class="form-group col-sm-5 ">
      <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus  >

@if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
 @endif
    </div>

    <div class="form-group col-sm-1 " id="leftLabels">   
       <label>Phone:</label>
    </div>


    <div class="form-group col-sm-5">
      <input type="text" class="form-control{{ $errors->has('inputPhone') ? ' is-invalid' : '' }}" name="inputPhone" value="{{ old('inputPhone') }}" id="inputPhone" required autofocus >

       @if ($errors->has('inputPhone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputPhone') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  <br>

<div class="form-row">
   <div class="form-group col-sm-1 " id="rightLabels">   
       <label>Email:</label>
    </div>
    <div class="form-group col-sm-5">
      <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus  >

       @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    </div>

     <div class="form-group col-sm-1 " id="leftLabels">   
       <label>Password:</label>
    </div>
    <div class="form-group col-sm-5 password">
      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" id="password" required autofocus >

       @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
<br>
<div class="form-row">
  <div class="form-group col-sm-1 " id="rightLabels">   
       <label>Address:</label>
    </div>
  <div class="form-group col-sm-11 ">
    <input type="text" class="form-control{{ $errors->has('inputAddress') ? ' is-invalid' : '' }}" name="inputAddress" value="{{ old('inputAddress') }}"" id="inputAddress" required autofocus >

     @if ($errors->has('inputAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputAddress') }}</strong>
                                    </span>
                                @endif
    </div>
 
</div>
  

<br>
<div class="form-row">
    <div class="form-group col-sm-2" style="color:#c34bc3; " >   
       <label >Gender:</label>
    </div>

  <div class="form-group col-sm-4">
    <label style="color: white;">
          <input type="radio" name="Gender" id="Gender" value="male"  placeholder="">Male

    </label><br>
    <label style="color: white;">
    <input type="radio" name="Gender" id="Gender" value="female" style="color: white;" placeholder="">Female
    </label>
  </div>
  </div>
<div class="form-group row">
  <div class="text-center col-lg-12" >
    <div class="btn-group  " >
      <button type="submit" class="btn btn-primary" >Save</button>
      <a class="btn btn-primary finish"  href="/Add_School_Info/viewTeacherInfo">Finish</a> 
          <button type="button" class="btn btn-primary back" onclick="goBack()" >Back</button>
        </div>  
  </div>
</div>
</form>
</div>
</div>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>

@endsection








   
