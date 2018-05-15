@extends('layouts.header')
{{-- @extends('layouts.staffsidebar') --}}
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection

<div class="main">
  <div class="staffCourses">
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/DeleteClass/{{ $teacher->id}}" method="post" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="delete" />
   <div class="form-group">
    <label>Remove Class From {{ $teacher->name }}'s Schedule</label>
   </div>
   <div class="form-group">
   <div class="form-check">
    <label>Check The Classes You Want To Remove
    </label><br>
  @if ($classes)
     @foreach ($classes as $class)
  <input class="form-check-input" type="checkbox"  name="classes[]" id="{{ $class[0]->id }}" value="{{ $class[0]->id }}">
  <label class="form-check-label"> {{ $class[0]->year }}  {{ $class[0]->level }}  {{ $class[0]->name }}
  </label>
   <br><br>
   @endforeach
   @endif
 </div>
</div>
    <input class="btn btn-default" type='submit' value='Remove'>
   </form>