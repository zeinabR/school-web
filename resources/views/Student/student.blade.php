@php

  $student=$student_info;

@endphp

@extends('layouts.header')


@section('title')
{{ $student->name }}
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/student.css') }}">
@endsection
   

@section('content')  {{-- body --}}
<div style="background-color: blanchedalmond;">
  <div class="container" style="padding-top: 100px;padding-bottom: 100px">
  <!--start Courses sec-->
    <div class="flex-container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="subheader">{{ $name }} Courses</h1>
        </div>
        @php  $i=0;  @endphp
        @foreach ($courses_info as $course) 
        @php $CourseId=$course->id; 
        $exercise=$ex[$i];
        // echo $ex[$i];
  session(['exercise' => $exercise]);
  session(['course' => $course]);

        @endphp
           <div class="col-sm-3">
               <div class="card" style="width: 12rem;">
                  <img class="card-img-top img-responsive" src="{{ asset('../images/student/ma.jpg') }}" alt="Course image not found">
                  <div class="card-body" style="padding-bottom:0px;padding-top: 5px;">
                    <center>
                      <h4>{{ $course->name }}  </h4>
                   </center>
                    <p>
                    @foreach ($teacher as $T ) 
                      @if($course->course_id == $T->course_id)
                        Teacher : 
                        @if ($T->gender == 'female' || $T->gender == 'Female')
                          {{ 'Ms. ' . $T->name }} 
                        @else 
                          {{ 'Mr. ' . $T->name }} 
                        @endif
                      @endif
                    @endforeach
                    <center>
                          <h5>View exercises</h5>
                                @php $z=0;@endphp
                                  @foreach($exercise as $exe)
                                    <li><i class="fa fa-download" aria-hidden="true"><a href="{{ route('courseEX',compact('i','z')) }}">  {{ $exe->Name }}</a></i></li>
                                     @php $z++;@endphp
                                  @endforeach
                                  @if($z==0)
                                    No Exercises ... 
                                   @endif

                      {{-- Button trigger modal  --}}
                      {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        View exercises
                      </button> --}}

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Course Exercises</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                
                                <div class="col-sm-6">
                                  {{-- @foreach ($exercise as $ex ) 
                                   <a href="{{ $ex->EX }}" >sheet#1</a> 
                                   @endforeach --}}
                                 {{--  @php $z=0;@endphp
                                  @foreach($exercise as $exe)
                                    <li><i class="fa fa-download" aria-hidden="true"><a href="{{ route('courseEX',compact('CourseId','z')) }}">  {{ $exe->Name }}</a></i></li>
                                     @php $z++;@endphp
                                  @endforeach
                                  @if($z==0)
                                    No Exercises ... 
                                   @endif --}}
                                </div>
                               {{--  <div class="col-sm-4">
                                  <button type="button" class="btn btn-success">download</button>
                                </div> --}}
                                
                            </div>
                            {{-- <div class="modal-footer"> --}}
                             {{--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            
                            {{-- </div> --}}
                          </div>
                        </div>
                      </div>
                       </center>
                    </p>
               
                  </div>
                </div>
           </div>
           @php   $i++; @endphp
        @endforeach 
      </div>
    </div>
    <!--end Courses sec-->

     <!--Start Grades sec-->
    <div class="col-lg-12">
        <h1 class="subheader">{{ $name }} Grades</h1>
    </div>
    <table class="table table-striped " style="margin-top:20px;margin-bottom:35px;">
      <thead class="thead ">
        <tr>
          <th scope="col"> # </th>
          <th scope="col">Subject</th>
          <th scope="col">Grade</th>
        </tr>
      </thead>
      <tbody>
      
          @php  $i=1;  @endphp
        @foreach ($all_grades as $course_grade)
        <tr class="table-warning">
          <th scope="row">{{ $i }} </th>
          <td> {{ $course_grade->name }} </td>
          <td>{{ $course_grade->grade }} </td>
        </tr>
          @php   $i++; @endphp
         @endforeach
      </tbody>
    </table>
    <!--End Grades sec-->
   
   {{-- Start schedule sec --}}

        <div class="text-center ">
          <img src="{{ $schedule }}" style="max-width: 700px; max-height: 700px;">
        </div>
 <!-- end schedule sec -->

    
    
 
      </div>
  </div>
@endsection




@section('js')
<link rel="stylesheet" href="{{ asset('../js/student.js')}}">
@endsection

 {{-- @foreach ($day as $cource) 
                      @if ($j==0 && $i==4)
                       <br><br><br><td rowspan="6"align="center">B<br>R<br>E<br>A<br>K</td>
                      @else
                      <td align="center"><font color="blue">{{ $day[$i++]}}</font><br></td>
                      @endif
                  @endforeach --}}