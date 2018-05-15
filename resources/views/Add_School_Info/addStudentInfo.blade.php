@php
$classes=$classes;
$pResults=$pResults;
@endphp
    	@extends('layouts.SAdminHeader') 

@section('title')
Add school's info
@endsection

@section('css')
  <link rel="stylesheet" href="../css/addStudentInfo.css">

@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-6 describe">

			</div>
<div class="col-lg-6">
	<h1 class="text-center">Here add student's information</h1>
	<br>
	<p class="text-center">Please fill all fields. If you finish hit (finish) button</p>

<form class="studentInfo" action="addStudentInfo" method="post" accept-charset="utf-8">
	<div class="form-group row">
		<div class="col-lg-1">
			<label>Name:</label>
		</div>
		<div class="col-lg-5">
			<input type="text" class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" 
			id="Name" value="{{ old('Name') }}" required >

				@if ($errors->has('Name'))
					<span class="invalid-feedback">
					    <strong>{{ $errors->first('Name') }}</strong>
					</span>
				@endif

		</div>

		<div class=" col-lg-2">
			<label>Phone:</label>
		</div>
			<div class=" col-lg-4">
			<input type="tel" class="form-control {{ $errors->has('Phone') ? ' is-invalid' : '' }}" name="Phone" 
			id="Phone" value="{{ old('Phone') }}" required >

			@if ($errors->has('Phone'))
					<span class="invalid-feedback">
					    <strong>{{ $errors->first('Phone') }}</strong>
					</span>
			@endif
		</div>

	</div>	

	<br>

	<div class="form-group row">
		<div class="col-lg-1">
			<label>Email:</label>
		</div>
	<div class="col-lg-5">
		<input type="email" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" name="Email" 
		id="Email" value="{{ old('Email') }}" required >

			@if ($errors->has('Email'))
				<span class="invalid-feedback">
				    <strong>{{ $errors->first('Email') }}</strong>
				</span>
			@endif

	</div>
	<div class="col-lg-2">
			<label>Password:</label>
		</div>
	<div class="col-lg-4">
		<input type="password" name="Password" class="form-control{{ $errors->has('Password') ? ' is-invalid' : '' }}" id="Password" value="{{ old('Password') }}" placeholder="">
		@if ($errors->has('Password'))
				<span class="invalid-feedback">
				    <strong>{{ $errors->first('Password') }}</strong>
				</span>
		@endif
	</div>
	
</div>

 <br>

<div class="form-group row">
		<div class="col-lg-2">
		<label>Parent's Name:</label>
	</div>
	<div class="col-lg-4">
<select name="fatherName" id="fatherName">
	
{{--     <option>{{  $pResults->id }}</option>
 --}}
 	<option  ></option>

	@foreach($pResults as $pResult)
	<option  value="{{ $pResult->id }}">{{ $pResult->name }}</option>
	

	@endforeach

	</select>
	{{-- <input type="text" name="fatherName" id="fatherName" class="form-control{{ $errors->has('fatherName') ? ' is-invalid' : '' }}" value="{{ old('fatherName') }}" >
			@if ($errors->has('fatherName'))
				<span class="invalid-feedback">
				    <strong>{{ $errors->first('fatherName') }}</strong>
				</span>
		@endif
	</div> --}}
</div>
	<div class="col-lg-2">
		<label>Fees:</label>
	</div>
	<div class="col-lg-4">
		<input type="number" name="Fees" id="Fees"  class="form-control{{ $errors->has('Fees') ? ' is-invalid' : '' }}" value="{{ old('Fees') }}" >
	</div>

</div>

<br>

<div class="form-group row">
	<div class="col-lg-2">
		<label>Gender:</label>
	</div>
	<div class="col-lg-4">
		<input type="radio" name="Gender" id="Gender" value="male" placeholder="">Male<br>
		<input type="radio" name="Gender" id="Gender" value="female" placeholder="">Female

	</div>
	<div class="col-lg-1">
		<label>Class:</label>
	</div>
	<div class="col-lg-5">

	<select name="Class" id="Class">
	 	<option  ></option>

	@foreach($classes as $classe)
	<option  value="{{ $classe->id }}">{{$classe->year." " . $classe->level ." ". $classe->name }}</option>
	

	@endforeach

	</select>
	</div>
</div>

<br>

<div class="form-group row">
	

	<div class="col-lg-3">
		<label>Date of birth:</label>
	</div>
	<div class="col-lg-8">
		<input type="date" name="DOB" id="DOB" >
	</div>
</div>
<br>
<br>
<div class="form-group row">
	<div class="text-center col-lg-12" >
		<div class="btn-group  " >
			<button type="submit" class="btn btn-primary" >Save</button>
<a class="btn btn-primary finish"  href="/Add_School_Info/viewStudentInfo">Finish</a> 
	        <button type="button" class="btn btn-primary back" onclick="goBack()" >Back</button>
        </div>	
	</div>
</div>

</form>
</div>

</div>
</div>





@endsection
