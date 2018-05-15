@extends('layouts.header')
@section('css')
<link rel="stylesheet" href="../css/settings.css">
@endsection

<div class="teachersettings">
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
        
        <form action="/teacher-settings" method="POST" enctype="multipart/form-data" class="form-vertical" role="form">
        	 {{ csrf_field() }}
          {{-- <div class="form-group">
            <div class="col-lg-8">
              <input  id="name" class="form-control" type="text" value="Jane">
            </div>
          </div> --}}
          <div class="form-group">
           <img src= "{{ $teacher->image }}" class="rounded-circle" width="100" height="100" alt="Profile Photo">
           <label class="col-lg-3 control-label">{{ $teacher->name }}</label>
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
          <div class="container-fluid">
           <div class="row">
            <div class= "col-lg-4">
          <div class="form-group">
            <label class=" control-label">E-mail:</label>
            <div class="col-lg-12">
              <input name="email" style="width: 100%" class="form-control" type="text" value="{{ $teacher->email }}">
            </div>
          </div>
        </div>
          <div class= "col-lg-4">
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
        <div class="col-lg-4">
          <div class="form-group">
            <label class="control-label">Phone:</label>
            <div class="col-lg-12">
              <input name="phone" style="width: 100%" class="form-control" type="text" value="{{ $teacher->phone }}">
            </div>
          </div>
        </div>
        <div class="col-lg-4">
           <div class="form-group">
            <label class="control-label">Address:</label>
            <div class="col-lg-12">
              <input name="address" style="width: 100%" class="form-control" type="text" value="{{ $teacher->address }}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4"></div>
    </div>
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
		</div>

        </form>
      </div>
  </div>
</div>
