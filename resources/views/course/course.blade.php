@extends('.layouts.header')

@section('title')
{{ $desired_course->name }}
@endsection

@section('css')
{{-- <link rel="stylesheet" href="../css/course.css"> --}}
<link rel="stylesheet" href="{{asset('css/course.css')}}">
@endsection
   
@section('content')
	<div class="container a">
		<div class="parentC">
			<div class="title_background">
				<h1 class="subheader">{{ $desired_course->name }}</h1>
			</div>
			@php
				 $respect = 'Mr';
				// if($desired_teacher->gender=='female')
				// 	$respect = 'Ms ';
			@endphp
			
			<ul>
				<li><h4>{{ 'Teacher : '. $respect . ucfirst(trans($desired_teacher->name ))}}</h4></li>
				<li><h4>Course ID : {{ $desired_course->id }}</h4></li>
				<li><h4>Time : {{ $desired_course->teach_day }}</h4></li>
				<li><h4>Grade : {{ $grade }}</h4></li>
				<li><h4>Exercise : {{ $exercise }}</h4></li>
			</ul>
		</div>
	</div>
@endsection 
