@extends('layouts.header')

@section('title')
{{ $parent_info->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('../css/parent.css') }}">
<link rel="stylesheet" href="{{ asset('../css/student.css') }}">
@endsection

@section('content')

  <div class="main" style="width: 95%; margin:20px; ">
   <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 95%">
       @php $i=1; @endphp

        @foreach($childern as $Child)
        <li class="nav-item">
          @if($i ==1)
           <a class="nav-link active" id="home-tab" data-toggle="tab" href= "{{'#' . $Child->id}}" role="tab" aria-controls="home" aria-selected="true">{{  ucfirst(trans($Child->name)) }}</a>
          @else
           <a class="nav-link" id="profile-tab" data-toggle="tab" href="{{ '#' . $Child->id }}" role="tab" aria-controls="profile" aria-selected="false">{{  ucfirst(trans($Child->name)) }}</a>
           @endif
        </li>
       @php $i++; @endphp
       @endforeach
  
    </ul>

     <div class="tab-content" id="myTabContent" >
       @php $j=1; @endphp
        @php  $i=0;  @endphp
         @php $z=0;
          // $iterator=0;
         @endphp
        @foreach($childern as $Child)
         @if($j ==1)
          <div class="tab-pane fade show active" id="{{ $Child->id }}" role="tabpanel" aria-labelledby="home-tab">
        {{-- {{  ucfirst(trans($Child['name'])) }} --}}
          <div style="background-color: blanchedalmond; border-radius: 0px 60px; ">
            <div class="container" style="padding-top: 50px;padding-bottom: 100px">
          {{-- start course section --}}
              <div class="flex-container">
                <div class="row">
                  <div class="col-lg-9">
                    <h1 class="subheader" style="padding-bottom: 20px; text-align: left;"> Courses</h1>
                  </div>
                  <div class="col-lg-3 card" style="background-color: #ffeeba; color: firebrick">
                    <div class="card-body">
                      <h6>Education fees : {{ $Child->fees . ' L.E'}} </h6>
                    </div>
                  </div>
      
                  @foreach ($courses_info[$i] as $course) 
                  @empty ($course)
                    @else
                   {{--   @php $CourseId=$course->id; 
                        $exercise=$ex[$i];
                        // echo $course;
                  session(['exercise' => $exercise]);
                  session(['course' => $course]);

                    @endphp --}}

                    <div class="col-sm-3">
                      <div class="card" style="width: 12rem;">
                        <img class="card-img-top img-responsive" src="{{ asset('../images/student/ma.jpg') }}" alt="Course image not found">
                        <div class="card-body" style="padding-bottom:0px;padding-top: 5px;">
                          <center>
                            {{-- @empty ($course[$i])
                            @else --}}
                                  <h4>{{ $course->name }} </h4>
                            {{-- @endempty --}}
                          
                          </center>
                          <p>

                          @foreach ($teacher[$i] as $T ) 
                         @if( !empty($course ) && !empty( $T))
                          {{-- @else --}}
                            @if($course->id == $T->course_id)
                              Teacher : 
                              @if ($T->gender == 'female' || $T->gender == 'Female')
                                {{ 'Ms. ' . $T->name }} 
                              @else 
                                {{ 'Mr. ' . $T->name }} 
                              @endif
                            @endif
                          @endif
                          @endforeach
                          <center>
                  
                        {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        View exercises
                        </button> --}}
                    
                      
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
                                   
                                 {{--  @foreach($ex[$iterator] as $exe)
                                    <li><i class="fa fa-download" aria-hidden="true"><a href="{{ route('PcourseEX',compact('CourseId','z')) }}">  {{ $exe->Name }}</a></i></li>
                                     @php $z++;@endphp
                                  @endforeach
                                  @if($z==0)
                                    No Exercises ... 
                                   @endif --}}
                                  </div>
                                  {{-- <div class="col-sm-4">
                                    <button type="button" class="btn btn-success">download</button>
                                  </div> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </center>
                    </p>
                  </div> 
                </div>
              </div>
           
             @endempty 
        @endforeach 
            </div>
          </div>
      {{-- end course section --}}

       {{-- Start Grades sec --}}
    <div class="col-lg-12" style="padding-bottom: 20px">
        <h1 class="subheader">Grades</h1>
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
      
          @php  $k=0;  @endphp
        @foreach ($all_grades as $grade)
        @empty($grade[$k])
        @else
        <tr class="table-warning">
          <th scope="row">{{ $k +1 }}</th>
          <td>{{ $grade[$k]->name }} </td>
          <td> {{ $grade[$k]->grade }} </td>
        </tr>
          @php   $k++; @endphp
          @endempty
         @endforeach
      </tbody>
    </table>
    {{-- End Grades sec --}}
   
 {{-- start schedule sec --}}
        <div class="text-center">
          <img src="{{ $Myc[$i]->schedule }}" style="max-width: 700px; max-height: 700px; ">
        </div>

   {{-- end schedule sec --}}
        </div>
      </div>
    </div>

           @else
           
          <div class="tab-pane fade" id="{{ $Child->id }}" role="tabpanel" aria-labelledby="profile-tab">
            <div style="background-color: blanchedalmond;border-radius: 0px 60px; ">
            <div class="container" style="padding-top: 50px;padding-bottom: 100px">
          {{-- start courses sec --}}
              <div class="flex-container">
                <div class="row">
                  <div class="col-lg-9">
                    <h1 class="subheader" style="padding-bottom: 20px;text-align: left;"> Courses</h1>
                  </div>
                  <div class="col-lg-3 card" style="background-color: #ffeeba; color: firebrick">
                    <div class="card-body">
                      <h6>Education fees : {{ $Child->fees . ' L.E'}} </h6>
                    </div>
                  </div>
                   {{-- @php  $i=0;  @endphp --}}
                  @foreach ($courses_info[$i] as $course) 
                  @empty ($course)
                  @else
                 {{--   @php $CourseId=$course->id; 
                        $exercise=$ex[$iterator];
                        // echo $CourseId;
                  session(['exercise' => $ex[$i]]);
                  session(['course' => $course]);

                    @endphp --}}
                    <div class="col-sm-3">
                      <div class="card" style="width: 12rem;">
                        <img class="card-img-top img-responsive" src="{{ asset('../images/student/ma.jpg') }}" alt="Course image not found">
                        <div class="card-body" style="padding-bottom:0px;padding-top: 5px;">
                          <center>
                             @empty ($course)
                             @else
                                  <h4>{{ $course->name }} </h4>
                            @endempty
                          </center>
                          <p>

                          @foreach ($teacher[$i] as $T ) 
                            @if( !empty($course) && !empty( $T))
                       
                            @if($course->course_id == $T->course_id)
                              Teacher : 
                              @if ($T->gender == 'female' || $T->gender == 'Female')
                                {{ 'Ms. ' . $T->name }} 
                              @else 
                                {{ 'Mr. ' . $T->name }} 
                              @endif
                            @endif
                            @endif
                          @endforeach
                          <center>
                  
                     {{--    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                        View exercises
                        </button>
                     --}}
                      
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
                                    
                              {{--     @foreach($ex[$iterator] as $exe)
                                    <li><i class="fa fa-download" aria-hidden="true"><a href="{{ route('PcourseEX',compact('CourseId','z')) }}">  {{ $exe->Name }}</a></i></li>
                                     @php $z++;@endphp
                                  @endforeach

                                  @if($z==0)
                                    No Exercises ... 
                                   @endif
 --}}                                  </div>
                                 {{--  <div class="col-sm-4">
                                    <button type="button" class="btn btn-success">download</button>
                                  </div> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </center>
                    </p>
                  </div> 
                </div>
              </div>
              {{--  @php   $i++; @endphp --}}
              @endempty
              {{-- @php $iterator++;@endphp --}}
        @endforeach 
            </div>
          </div>
          {{-- end courses sec --}}

           {{-- Start Grades sec --}}
    <div class="col-lg-12" style="padding-bottom: 20px">
        <h1 class="subheader">Grades</h1>
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
      
        {{--   @php  $k=0;  @endphp --}}
        @foreach ($all_grades as $grade)
        @empty($grade[$k])
        @else
        <tr class="table-warning">
          <th scope="row">{{ $k +1 }}</th>
          <td>{{ $grade[$k]->name }} </td>
          <td> {{ $grade[$k]->grade }} </td>
        </tr>
          @php   $k++; @endphp
          @endempty
         @endforeach
      </tbody>
    </table>
    {{-- End Grades sec --}}
   
   {{-- start schedule sec --}}
        <div class="text-center ">
          <img src="{{ $Myc[$i]->schedule }}" style="max-width: 700px; max-height: 700px;">
        </div>

   {{-- end schedule sec --}}
        </div>
      </div>
          </div>
          @endif
           @php   $i++; @endphp 
           @php $j++; @endphp
          @endforeach
    </div>
  </div>  
@endsection
