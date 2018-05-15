<?php
// $pageTitle = 'Color | About';

//   $css_files = '<link rel="stylesheet" href="../css/about/about.css">';

//   include '../init.php';

  
?>

@section('css')
{{'../css/staff.css'}}
@endsection
<div class="sidenav">
  <a href="{{ url('/staffEvents') }}" style="color: #ff9900" class="active">Events</a>
  <a href="#staffStudents" style="color: #ff9900" data-toggle="collapse">Students Fees<i class="fa fa-caret-down"></i></a>
  <div class="collapse" id="staffStudents">
            <a style="color: #FFD700" href="staffStudentsprim" >Primary</a>
            <a style="color: #FFD700" href="staffStudentsprep" >Prepatory</a>
            <a style="color: #FFD700" href="staffStudentssec" >Secondary</a>
  </div>
  <a href="#staffTeachers" style="color: #ff9900" data-toggle="collapse">Schedules<i class="fa fa-caret-down"></i></a>
  <div class="collapse" id="staffTeachers">
            <a style="color: #FFD700" href="{{ url('/staffTeachers') }}" >For a Teacher</a>
            <a style="color: #FFD700" href="{{ url('/staffSchedules') }} ">For a Class</a>
  </div>
     {{--         <a href="staffStudentssec" >Secondary</a>
 <a href="{{ url('/staffTeachers') }}">Teachers' Schedules</a>
   <a href="{{ url('/staffSchedules') }}">Schedules</a> --}}
  {{-- <a href="{{ url('/staffMessages') }}">Messages</a> --}}
  <a href="{{ url('/staffCourses') }}" style="color: #ff9900" >Courses</a>
  <a href="{{ url('/staffClasses') }}" style="color: #ff9900" >Classes</a>
 
</div> 









<?php 
    // $js_files = '<script src="../js/about.js"></script>';

    // include  '../' . $tmpl . 'footer.php';

    ?>   
