
@extends('layouts.header')

{{-- @extends('layouts.footer') --}}
{{-- @extends('Staff.staffsidebar') --}}

@extends('layouts.staffsidebar')

@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection

<div class ="main">
  <div class="staffEvents">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   {{--  <form  class="form-inline" action="/staffEvents" method="post">
       {{ csrf_field() }}
      <div class="form-group">
        <label>Search for an event&nbsp&nbsp</label>
        <input class="form-control" type="text" required value="" placeholder="  Enter Event Name" >  
        </div>
         <div class="form-group">
       <input class="form-control" required value="" type="text" name="eventtype" placeholder="  Type of the event" >
      </div>
        <input type= "submit" value="Search" class="btn btn-default">
      </form> --}}
    <br>
    <form  action="/staffEvents" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label > Add Event </label><br><br>
        <input class="form-control" required value="" type="text" name="eventname" placeholder="  Name of the event" >
      </div>
      <div class="form-group">
        <textarea class="form-control" required="required" name="eventtext" rows="6" cols="100" placeholder="Add Event Text" id="addeventtext"></textarea>
      </div>
      <div class="form-group">
         <input class="form-control" required value="" type="text" name="eventtype" placeholder="  Type of the event" >
       <!-- echo Form::select('type', array('socialevent' => 'Social', 'eduevent'=>'Educational','entertainevent' =>'Entertainment'));
        <select class="form-control" id="eventtype">
          <option name="socialevent" value="Social">Social</option>
          <option name="eduevent" value="Educational">Educational</option>
          <option name="entertainevent" value="Entertainment">Entertainment</option>
        </select>-->
      </div>
      <div class="form-group">
        <input class="form-control" required value="" type="text" name= "eventloc" placeholder="  Location of the event" > 
      </div>
        <input type= "submit" value="Add" class = " btn btn-default">
      </div>
    </form>
  </div>
</div>

  