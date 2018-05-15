@extends('layouts.header')
{{-- @extends('layouts.staffsidebar') --}}
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection

  <div class="staffSchedulesAdd">
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
   <a href="/DeleteClass/{{ $teacher->id }}" class="btn btn-default" id="deleteclass">Edit Teacher's Class</a>
<form action="/staffTeachers/{{ $teacher->id}}" enctype="multipart/form-data" method="post" >
  {{ csrf_field() }}

   <div class="form-group">
    <label>Add Schedule to {{ $teacher->name }}</label>
    <input type="file"  class="form-control-file" name="schedule">
  </div>
   <div class="form-group">
   <div class="form-check">
    <label>Add Classes and Courses Taught By {{ $teacher->name }}
    </label><br>
     @foreach ($classes as $class)
  <input class="form-check-input" type="checkbox"  name="classes[]" id="{{ $class->id }}" value="{{ $class->id }}">
  <label class="form-check-label"> {{ $class->year }}  {{ $class->level }}  {{ $class->name }}
  </label>

  &nbsp&nbsp &nbsp&nbsp
 @php $i= $class->id -1@endphp
 <select name="course.{{ $i }}">
  <option value=""> Choose Course </option>
   @foreach ($courses as $course)
  <option value={{ $course->id }}>{{ $course->name }}</option>
  @endforeach
  </select>
   <br><br>
   @endforeach
 </div>
</div>
<div class="form-group">
    <input class="btn btn-default" id= "schedule"type='submit' value='Add Schedule'>
  </div>
   </form>

   
</div>
 
{{--  @for ($i=0; $i<10; $i++)
      <div class="form-group">
        <label> day.$i</label>
        <label> Class</label>
       <select name="class1" required="">
         <option value=""> </option>
         @foreach ($classes as $class)
         <option value="{{ $class->id }}">{{ $class->name }}</option>
          @endforeach
       </select>
     </div>
      <div class="form-group">
        <label> Course</label>
       <select name="class1" required="">
         <option value=""> </option>
         @foreach ($courses as $course)
         <option value="{{ $course->id }}">{{ $course->name }}</option>
          @endforeach
       </select>
     </div>
     </div>
     @endfor
    
       <div class="form-group">
        <label> Day</label>
       <select required="">
         <option value=""> </option>
         <option value="saturday"> Saturday</option>
         <option value="sunday"> Sunday</option>
         <option value="monday"> Monday</option>
         <option value="tuesday"> Tuesday</option>
         <option value="wednesday"> Wednesday</option>
         <option value="thursday"> Thursday</option>
         <option value="friday"> Friday</option>
       </select>
     </div>
      <div class="form-group">
        <label> Period</label>
       <select required="">
         <option value=""> </option>
         <option value="1"> 1</option>
         <option value="2"> 2</option>
         <option value="3"> 3</option>
         <option value="4"> 4</option>
         <option value="5"> 5</option>
         <option value="6"> 6</option>
         <option value="7"> 7</option>
         <option value="8"> 8</option>
         <option value="9"> 9</option>
       </select>
     </div>
      </form>  
      </div>
    </div> --}}
    <!-- end schedule sec -->

      {{-- <table class="table table-striped">
        <tr>
          <th>Name</th>
          <th> </th>>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
          <td>{{ $teacher->name }}</td>
          <td><form action="/staffTeachers/{{ $teacher->id }}" method="POST">
            <input type="submit" value="Add Schedule !" >
          </form></td>
        </tr>
        @endforeach
      </table> --}}
