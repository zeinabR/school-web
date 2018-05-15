

@extends('layouts.header')

{{--  --}}

@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class ="main">
<div class="staffTeachers" id="staffTeachers">
  <div class="table-responsive">
    @foreach ($teachers as $teacher)
  <div class="table-responsive">
      <table class="table table-striped">
      <tr>
       <td><a href="/staffTeachers/{{ $teacher->id }}" >{{ $teacher->name }}</a></td>
      </tr>
      </table>
    </div>
    @endforeach
</div>
</div>
</div>
  