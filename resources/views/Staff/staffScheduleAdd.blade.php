@extends('layouts.header')
@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class="main">
  <div class="staffschedules">
 <form action="/staffSchedules" method="POST" enctype="multipart/form-data" class="form-vertical" role="form">
        	 {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
 <div class="form-group">
    <label>Add Schedule</label>
    <input type="file" required="" class="form-control-file" name="schedule">
  </div>

  <div class="form-check">
     @foreach ($classes as $class)
  <input class="form-check-input" type="radio" required="" name="classinfo" id="{{ $class->id }}" value="{{ $class->id }}">
  <label class="form-check-label"> {{ $class->year }}   {{ $class->name }}
  </label><br>
   @endforeach
  {{-- <label class="container">  {{ $class->year }}   {{ $class->name }}
  <input type="radio" name="radio" required="" class="form-check-input" name="classinfo" id="{{ $class->id }}" value="{{ $class->id }}" >
  <span class="checkmark"></span>
</label> --}}
</div>
  <div class="form-group">
  <input type= "submit" value="Add" class = " btn btn-default">
</div>
 
</form>
</div>
</div>