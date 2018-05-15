@extends('layouts.header')
@section('css')
<link rel="stylesheet" href="../css/settings.css">
@endsection
{{-- email,password, phone,address --}}

 <div class="staffsettings">
<div id="right-block" class="Card">
   <div class="settings">
   
    <h1>Edit Profile</h1>
       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      
      <!-- edit form column -->
      
        
        <form action="/staff-settings" method="POST" enctype="multipart/form-data" class="form-vertical" role="form">
        	 {{ csrf_field() }}
          {{-- <div class="form-group">
            <div class="col-lg-8">
              <input  id="name" class="form-control" type="text" value="Jane">
            </div>
          </div> --}}
           @foreach ($tstaff as $staff) 
          <div class="form-group">
           <img src= "{{ $staff->image }}" class="rounded-circle" width="100" height="100" alt="Profile Photo">
           <label class="col-lg-3 control-label">{{ $staff->name }}</label>
          </div>
           <div class="form-group">
    <label>Change Pic</label>
    <input type="file"  class="form-control-file" name="profilephoto">
  </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">School:</label>
            <div class="col-lg-8">
            <label class="col-lg-3 control-label">{{ $school->name }}</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">E-mail:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="email" value="{{ $staff->email }}">
            </div>
          </div>
         <div class="form-group">
            <label class="col-md-3 control-label">New Password:</label>
            <div class="col-md-8">
              <input name="password" class="form-control" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input name="phone" class="form-control" type="text" value="{{ $staff->phone }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
		</div>
		@endforeach
        </form>
      </div>
    </div>
  </div>