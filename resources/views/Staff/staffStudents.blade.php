
@extends('layouts.header')

{{-- @extends('layouts.footer') --}}

{{-- @extends('layouts.staffsidebar') --}}
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class ="main">
<div class="staffStudents " id="staffStudents">
  
  <div class="table-responsive">
      <table class="table table-striped">
       {{--  {{ csrf_field() }} --}}
        <tr>
          <th>Name</th>
          <th>Fees</th>
        </tr>
        
      @foreach ($students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td><form class="form-inline" action='/staffStudents/{{ $student->id }}' method=post>
            {{ csrf_field() }}
            <input type="number" required value="" min="0" max="10000" name ="feeinput" class="form-control" placeholder="{{ $student->fees }}">
            <input type='submit' value="update" class ="btn btn-default"></form></td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  </div>
  