@extends('layouts.header')

@section('title')

@endsection

@section('css')
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,900i">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('../css/teacher.css') }}">
@endsection
   

@section('content')  {{-- body --}}
	<div class="container" style="padding-top: 100px; min-height: 500px;">
		<div class="background1"></div>
		<div class="col-lg-12">
		    <h1 class="subheader">Add Grades</h1>
		    <h3 class="subheader">Course : {{ $course->name }}</h3>
		    <h3 class="subheader">For Class : {{ $class->name }} - {{ $class->year }} {{ $class->level }}</h3>
		</div>
		<form  class="form-inline" action="?" method="post">
			{{ csrf_field() }}
		    <table class="table" style="margin-top:20px;margin-bottom:35px;">
			    <thead class="thead-dark">
			        <tr>
			            <th scope="col">#</th>
			            <th scope="col">Student</th>
			            <th scope="col">Grade</th>			      
			        </tr>
			    </thead>
			    <tbody class="thead-dark">
			        @php  $i=1;  @endphp
					@foreach($ClassStudents as $student)
					 		@php $name =$student->name;  
								$id =$student->id;  
				 			@endphp
						<tr class="thead-dark">
				            <th scope="row">{{ $i }}</th>
				            <td>{{ $name }}</td>
				            <td><input  type="number" name="{{ $id }}" min="0" max="50" step="0.5" value="{{ old('name') }}" ></td>
			        	</tr>
						@php   $i++; @endphp
					@endforeach
				</tbody>
	    	</table>
	    	<input type="submit" class="btn btn-success btnG">
    	</form>
	</div>
@endsection