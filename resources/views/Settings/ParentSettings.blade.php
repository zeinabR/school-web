@extends('layouts.header')
@section('css')
<link rel="stylesheet" href="../css/settings.css">
@endsection
{{--email,password, phone,address,job name, job address, job phone --}}

<div class="parentsettings">
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
     
        
        <form action="/parent-settings" method="POST" enctype="multipart/form-data" class="form-vertical" role="form">
        	 {{ csrf_field() }}
          {{-- <div class="form-group">
            <div class="col-lg-8">
              <input  id="name" class="form-control" type="text" value="Jane">
            </div>
          </div> --}}
          <div class="form-group">
           <img src= "{{ $parent->image }}" class="rounded-circle" width="100" height="100" alt="Profile Photo">
           <label class="col-lg-3 control-label">{{ $parent->name }}</label>
          </div>
           <div class="form-group">
    <label>Change Pic</label>
    <input type="file" class="form-control-file" name="profilephoto">
  </div>
          {{--  <div class="form-group">
            <label class="col-lg-3 control-label">School:</label>
            <div class="col-lg-8">
            <label class="col-lg-3 control-label">{{ $student->schoolid }}</label>
            </div>
          </div> --}}
          <div class="form-group">
            <label class="col-lg-3 control-label">Children:</label>
            <div class="col-lg-8">
              @foreach ($children as $child)
               <img src= "{{ $child->image }}" class="rounded-circle" width="100" height="100" alt="Profile Photo">
               <label class="col-lg-3 control-label">{{ $child->name}} </label>
               <span>                                  </span>
               @endforeach
           </div>
          </div>
          <div class="col">
          <div class="form-group">
            <label >E-mail:</label>
            <div >
              <input name="email" class="form-control" type="text" value="{{ $parent->email }}">
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">New Password:</label>
            <div >
              <input name="password" class="form-control" type="password" value="">
            </div>
          </div>
       
          <div class="form-group" float="right">
            <label class="col-lg-3 control-label">Phone:</label>
            <div >
              <input name="phone" class="form-control" type="text" value="{{ $parent->phone }}">
            </div>
          </div>
            <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div >
              <input name="address" class="form-control" type="text" value="{{ $parent->address }}">
            </div>
          </div>
           </div>
            <div class="col">
          <div class="form-group">
            <label class="col-lg-3 control-label">Job Title:</label>
            <div >
              <input name="job" class="form-control" type="text" value="{{ $parent->j_name }}">
            </div>
          </div>
       
          <div class="form-group">
            <label class="col-lg-3 control-label">Job Phone:</label>
            <div>
              <input name="jobphone" class="form-control" type="text" value="{{ $parent->j_phone }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Job Address:</label>
            <div >
              <input name="jobaddress" class="form-control" type="text" value="{{ $parent->j_address }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div >
              <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
        </div>
        </div>
		</div>
        </form>
      </div>
  </div>
</div>
