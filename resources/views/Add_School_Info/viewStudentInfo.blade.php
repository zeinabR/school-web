@extends('layouts.SAdminHeader')

@section('title')
Add school's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/viewStudentInfo.css">

@endsection

@section('content')
	<div class="container">

		<div class="row">

			<div class="col-lg-6 tables ">
				<h3 style="color: #1d5885; margin-top: 100px;">To remove student click on his\her name </h3>
			<table style="margin-top: 60px; width: 100%  " class="table table-bordered table-striped ">
				<caption>Students of school</caption>
				<thead>
					<tr>
						<th>Name</th>
						<th>Class</th>
						<th>Email</th>
						<th>Phone</th>

					</tr>
				</thead>
				<tbody>

			@foreach($students as $i=>$student)
			
				@for ($j = 0; $j < $stuNumber; $j++)

					@empty($student[$j])
						@break
					@endempty
					
					<tr>
						<td class="link">
						<a href="viewStudentInfo/{{ $student[$j]['id'] }}" style="color: #e92a38;">{{$student[$j]['name'] }} </a>			
						</td>
 						<td>{{$student[$j]['myClass']['year']." " . $student[$j]['myClass']['level'] ." ".
  							$student[$j]['myClass']['name'] }}</td>
						<td>{{$student[$j]['email']  }}</td>
						<td>{{$student[$j]['phone']  }}</td>

					</tr>
				@endfor

			@endforeach

				
					


					
	
				</tbody>
			</table>

			<div class="col-lg-6">
				<a class="btn btn-primary" " href="addStudentInfo" >Add</a>

{{-- 				<button type="button" class="btn" href="{{ 'Add_School_Info/addStudentInfo'}}">Add</button>--}}
		</div>
			</div>
			<div class="col-lg-6 describe">

			</div>
		</div>
	</div>



@endsection 
