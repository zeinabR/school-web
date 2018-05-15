@extends('layouts.header')

{{-- @extends('layouts.footer') --}}

@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class ="main">
<div class="staffStudents " id="staffStudentsprim">
  
  @foreach ($classes as $class)
  <div class="table-responsive">
      <table class="table table-striped">
      <tr>
        <td><?php echo 'Year'  . $class->year; ?></td>
       <td><a href="/staffStudentlist/{{ $class->id }}" >{{ $class-> name }}</a></td>
      </tr>
      </table>
      
    @endforeach
      </div>
  </div>
</div>
 
  