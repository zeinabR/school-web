@extends('layouts.SAdminHeader')

@section('title')
Add school's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/viewStaffInfo.css">

@endsection

@section('content')
	<div class="container">

		<div class="row">

			<div class="col-lg-6 tables">
				<h3 style="color: #bc5e39; margin-top: 100px;">To remove staff click on his\her name </h3>

			<table style="margin-top: 60px; width: 100%;  " class="table table-bordered table-striped ">
				<caption>Staff of school</caption>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>

					</tr>
				</thead>
				<tbody>

					@foreach($staffResults as $staffResult)
					<tr>
						<td>
							<a href="viewStaffInfo/{{ $staffResult->id }}" style="color: #039055;">{{$staffResult->name  }} </a>			
						</td>
						<td>{{$staffResult->email  }}</td>
						<td>{{$staffResult->phone  }}</td>

					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="col-lg-6">
				<a class="btn  btn-primary"  href="add_staff_info" >Add</a>

{{-- 				<button type="button" class="btn" href="{{ 'Add_School_Info/addStudentInfo'}}">Add</button>--}}
		</div>
			</div>
			<div class="col-lg-6 describe">

			</div>
		</div>
	</div>



@endsection 
