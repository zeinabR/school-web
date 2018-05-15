
@extends('layouts.header')

{{-- @extends('layouts.footer') --}}
{{-- @extends('Staff.staffsidebar') --}}

@extends('layouts.staffsidebar')

@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection

<div class ="main">
  <div class="staffClass">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form  action="/staffClasses" method="post">
      {{ csrf_field() }}
      <h3>Add Class </h3>
      <div class="form-group">
        <label > Name </label><br><br>
        <input class="form-control" required value="" type="text" name="name" placeholder="  Name of the class :A,B,C ..etc" >
      </div>
       <div class="form-group">
        <label > Year </label><br><br>
        <input class="form-control" name ="year" required value="" type="number" name="num" placeholder="  Year of the class :1,2,3 ..etc" >
      </div>
      <div class="form-group">
      <label > Level </label>
      <select name="level" required="">
        <option></option>
        <option value="prim">Primary</option>
        <option value="prep">Preperatory</option>
        <option value="Sec">Secondary</option>
      </select>
        <input type= "submit" value="Add" class = " btn btn-default">
      </div>
    </form>
  </div>
</div>

  