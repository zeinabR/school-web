@extends('layouts.header')
@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class="main">
  <div class="staffschedules">
    <div class="container-fluid">
     <form style="margin-top: 200px" action="/staffSchedules" method="post" class="form-horizontal" role="form">
           {{ csrf_field() }}
           <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-5">
           <label style="font-size: 30px;">Choose Level</label><br>
 <select style="width: 100%" name="level" required="">
  <option value=""> </option>
  <option value="prim">Primary</option>
  <option value="prep">Preperatory</option>
  <option value="Sec">Secondary</option>
  </select>
  <br><br>
  <input type="submit" value="Show Classes" class = " btn btn-default">
</div>
  <br><br>
</div>
<div class="col-lg-3"></div>
</form>
</div>
</div>
</div>