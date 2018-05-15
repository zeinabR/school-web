@extends('layouts.header')

@section('title')
	{{ $teacher->name }}
@endsection

@section('css')
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,900i">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('../css/teacher.css') }}">
@endsection
	 

@section('content')  {{-- body --}}
	<div class="container">
		<div class="background"></div>
		<!-- start Courses sec -->
		<div class="col-lg-12">
			<h1 class="subheader">Courses</font></h1>
		</div>
		<div class="row cl wow slideInLeft animated">
			@php $ClassesIterator=0; $ExercisesIterator=0; @endphp 

			@foreach ($Courses as $Course)        
				@php $CourseClassesIterator=0;  @endphp      
				<div class="col-sm-12 col-lg-6" style="display: table-cell;display: flex;">
					<div class="course">	
						<fieldset>              
							@foreach ($Course as $OneClass)
								@if($CourseClassesIterator==0)
									@php  $CourseID = $OneClass->course_id; @endphp
									<legend><strong>{{ $OneClass->name }}</strong> </legend>

									{{-- Show exists exercises --}}
									<h3 style="text-decoration: underline; color:#FFE400;"><center>Uploaded Exercise</center></h3><br>
									@php $exercises = $CoursesExs[$CourseID];
											@endphp
									<ul >
										{{-- <div id="{{ $CourseID }}" class="hidden"> --}}
										@foreach($exercises as $OneEx)
											{{-- <li><input type="checkbox">
											<span class="checkmark"></span> --}} <li>{{ $OneEx->name }}</li>		
										@endforeach
										{{-- </div> --}}
									</ul>
									{{-- <button class="btn btn-success" onclick="unhide(this, {{ $CourseID }})" value="unhide">want to remove..</button> --}}

									{{-- Add Exercise section --}}
									<h3 style="text-decoration: underline; color:#FFE400;"><center >Add Exercise</center></h3><br>
									<form class="form-inline" action="Teacher/teacher"  method="post" enctype="multipart/form-data">
										{{ csrf_field() }}	
										<br/>
										<label style="padding-right: 7px;">EX Name </label><input type="text" name="{{ $OneClass->name }}" size="18" style="margin: 7px;" placeholder="i.e. sheet#"><br/>
										<input type="file" name="{{ $CourseID }}" size="16"><i class="fa fa-upload" aria-hidden="true"></i>
										<input type="submit" class="btn btn-success" value="Upload"><br>
									</form><br>
									
									{{-- Add grades section --}}
									<h3 style="text-decoration: underline; color:#FFE400;"><center>Add Grades</center></h3><br>
								@endif
					
								@php $class = $classes[$ClassesIterator]->first(); @endphp

								@php  $ClassID=$class->id; $ClassName = $class->name; $ClassYear = $class->year @endphp

								<td> * classe <a href="{{ route('Grades',compact('ClassID','CourseID')) }}" >{{ ucfirst(trans( $ClassName )) }} - {{ $ClassYear }} </a>  Level: {{ $class->level }}</td><br>
								@php $ClassesIterator++; $CourseClassesIterator++;@endphp
							@endforeach
						</fieldset>
					</div>	
				</div>  
				@php $ExercisesIterator++; @endphp              
			@endforeach
		</div>  
		<!-- end courses sec -->
		<!-- start quoat sec -->
		<div class="quote">
			<i class="fas fa-quote-left fa-2x fa-pull-left"></i>
			<blockquote>
				TO TEACH is to TOUCH A LIFE forever 
			</blockquote>
		</div>
		<!-- end quoat sec -->
		<!--Start schedule sec-->
		<div class="col-lg-12">
			<h1 class="subheader">@php echo'schedule' @endphp</font></h1>
			 <div class="text-center">
		          <img src="{{ $schedule }}" style="max-width: 700px; max-height: 700px; ">
		       </div>
			{{-- <table class="schedule" border="2" cellspacing="5" align="center">
				<tr>
					<td align="center">
					<td>period#1<br>8:30-9:30
					<td>period#2<br>9:30-10:30
					<td>period#3<br>10:3-11:30
					<td>period#4<br>11:30-12:30
					 <td>break<br>12:30-2:00 
					<td>period#5<br>2:00-3:00
					<td>period#6<br>3:00-4:00
					<td>period#7<br>4:00-5:00
				</tr>
				@php $j=0; 
					$days=['SATURDAY','SUNDAY','MONDAY','TUESDAY','WEDNESDAY','THURSDAY'];
				@endphp
				@foreach ($schedule as $day) 
					@php $i=0; @endphp
					<tr>
						<td align="center">{{ $days[$j++] }}</td>
						@foreach ($day as $cource) 
							<td align="center"><font color="blue">{{ $day[$i++]}}</font><br></td>
						@endforeach
					</tr>      
				@endforeach
			</table>	 --}}	 
		</div> 
		<!-- end schedule sec -->  
	</div>
@endsection


<script type="text/javascript">
function unhide(clickedButton, firstId, lastId) {
	for(firstId; firstId <= lastId; firstId++){
		var item = document.getElementById(firstId);
		if (item) {
		    if(item.className=='hidden'){
		        item.className = 'unhidden' ;
		        clickedButton.value = 'hide'
		    }else{
		        item.className = 'hidden';
		        clickedButton.value = 'unhide'
		    }
		}
	}
}

</script>