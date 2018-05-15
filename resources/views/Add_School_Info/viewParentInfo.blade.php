@extends('layouts.SAdminHeader')

@section('title')
View Parent's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/viewParentInfo.css">

@endsection

@section('content')
	<div class="container">

		<div class="row">

			<div class="col-lg-6 tables">
				<h3 style="color: #578674; margin-top: 100px;">To remove parent click on his\her name </h3>

			<table style="margin-top: 100px; width: 100%; " class="table table-bordered table-striped ">
				<caption>Parents of school</caption>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>

					</tr>
				</thead>
				<tbody>

					@foreach($pResults as $pResult)
					<tr>
						<td > 
							<a href="viewParentInfo/{{ $pResult->id }}" style="color: #f26549;">{{$pResult->name  }} </a>			
						</td>
						<td>{{$pResult->email  }}</td>
						<td>{{$pResult->phone  }}</td>

					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="col-lg-6">
				<a class="btn btn-primary"  href="addParentInfo" >Add</a>
			</div>
			</div>


			<div class="col-lg-6 describe">

			</div>
		</div>
	</div>



@endsection 
