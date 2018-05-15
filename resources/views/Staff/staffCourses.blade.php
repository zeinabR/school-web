
@extends('layouts.header')

{{-- @extends('layouts.footer') --}}

@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class ="main">
	<div class="staffCourses">
	  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
	<form  action="/staffCourses" method="post">
		 {{ csrf_field() }}
		<div class="form-group">
			<label>Add a Course</label><br><br>
			<input name="coursename" class="form-control" required value="" type="text" placeholder=" Add Course Name">
		</div>
			<input type="submit" value="Add Course" class="btn btn-default">		
	</form>
</div>