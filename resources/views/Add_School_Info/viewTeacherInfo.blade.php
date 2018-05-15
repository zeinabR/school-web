@extends('layouts.SAdminHeader')

@section('title')
Add school's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/viewTeacherInfo.css">

@endsection

@section('content')
	<div class="container">

		<div class="row">

			<div class="col-lg-6 tables">
			<h3 style="color: #e20001; margin-top: 100px;">To remove teacher click on his\her name </h3>

			<table style="margin-top: 100px; width: 100%; " class="table table-bordered table-striped ">
				<caption>Teachers of school</caption>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>

					</tr>
				</thead>
				<tbody>

					@foreach($tResults as $tResult)
					<tr>
						<td>							
							<a href="viewTeacherInfo/{{ $tResult->id }}" style="color: #78c4f6;">{{$tResult->name  }} </a>			
						</td>
						<td>{{$tResult->email  }}</td>
						<td>{{$tResult->phone  }}</td>

					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="col-lg-6">
				<a class="btn btn-primary" href="add_teacher_info" >Add</a>

{{-- 				<button type="button" class="btn" href="{{ 'Add_School_Info/addStudentInfo'}}">Add</button>--}}
		</div>
			</div>
			<div class="col-lg-6 describe">

			</div>
		</div>
	</div>



@endsection 
