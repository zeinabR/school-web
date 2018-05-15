@extends('layouts.header')
@section('css')
<link rel="stylesheet" href="../css/settings.css">';
@endsection
{{-- name / phone --}}
<div class="ssettings">
<div id="right-block" class="Card">
  
   <div class="settings">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Card body -->
    

{{-- < --}}
    <h1>Edit Profile</h1>
      
      
      <!-- edit form column -->
     {{--  <div class="col-md-9 personal-info"> --}}
        
        <form action="/student-settings" method="POST" enctype="multipart/form-data"  role="form">
        	 {{ csrf_field() }}
          {{-- <div class="form-group">
            <div class="col-lg-8">
              <input  id="name" class="form-control" type="text" value="Jane">
            </div>
          </div> --}}
           @foreach ($students as $student) 
          <div class="form-group">
           <img src= "{{ $student->image }}" class="rounded-circle" width="100" height="100" alt="Profile Photo">
           <label class="col-lg-3 control-label">{{ $student->name }}</label>
          </div>
        
          <div class="form-group">
    <label>Change Pic</label>
    <input type="file" class="form-control-file" name="profilephoto">
  </div>
  <div class="container-fluid">
    <div class="row">
          <div class="form-group">
            <label  control-label">School:</label>
            <div class="col-lg-8">
            <label class=" control-label">{{ $school->name }}</label>
            </div>
          </div>
        </div>
         <div class="row">
         <div class="form-group">
            <label  control-label">Class:</label>
            <div class="col-lg-12">
               <label class=" control-label">{{ $class->year }} {{ $class->level }} {{ $class ->name}}</label>
           </div>
          </div>
         </div>
            <div class="row">
               <div class="col-lg-4">
          <div class="form-group">
            <label class="control-label">E-mail:</label>
            <div class="col-lg-12">
              <input name="email" style="width: 100%" class="form-control" type="text" value="{{ $student->email }}">
            </div>
          </div>
          </div>
          <div class="col-lg-4">
         <div class="form-group">
            <label class=" control-label">New Password:</label>
            <div class="col-lg-12">
              <input name="password" style="width: 100%" class="form-control" type="password" value="">
            </div>
          </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="form-group">
            <label class=" control-label">Phone:</label>
            <div class="col-lg-12">
              <input name="phone" class="form-control" style="width: 100%" type="text" value="{{ $student->phone }}">
            </div>
          </div>
            <div class="col-lg-4"></div>
          </div>
        </div>
         <div class="row">
          <div class="form-group">
            <label class="control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
		</div>
  </div>
		@endforeach
        </form>
      </div>
  </div>
</div>
</div>
