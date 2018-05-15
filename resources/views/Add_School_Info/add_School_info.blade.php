@extends('layouts.SAdminHeader')

@section('title')
Add school's info
@endsection
@section('css')
  <link rel="stylesheet" href="../css/add_school_info.css">

@endsection

@section('content')
<section>
  <div id="cover"  >
    <div class="container ">
     <div class="row">
    <div class="col-md-12 ">
      <div class="text-center">
              <h2 for="SInfo">{{ __('School Info') }}</h2>

      </div>
       
    </div>
    
  </div> 
    </div>
  
  
</div>
</section>
<div id="SchoolInfo"  >
    <div class="container ">
     <div class="row">
    <div class="col-md-12 ">

<form  method= "post"           
@if($school)
      action="Add_School_Info/add_School_info/{{ $school->id }}"
      @else
      action="{{ route('add_School_info.store') }}"

      @endif>
        @csrf

{{-- <div class="form-group col-md-12">
<label for="SInfo">{{ __('School Info') }}</label>
</div> --}}
{{-- if else  --}}
  <div class="form-row">
        <div class="form-group col-md-1">

          <label>{{ "Name" }}</label>
        </div>
    <div class="form-group col-md-5">
      <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus  
      @if($school)
              value="{{ $school->name}}" 
      @else
            value="{{ old('name') }}" 

      @endif
      >

       @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
    </div>
    <div class="form-group col-md-1">
    <label style="margin-left: 30px;">{{ "Phone" }}</label>
  </div>

    <div class="form-group col-md-5">
      <input type="text" class="form-control{{ $errors->has('inputPhone') ? ' is-invalid' : '' }}" name="inputPhone" 
      id="inputPhone" 
            @if($school)
              value="{{ $school->phone}}" 
      @else
            value="{{ old('inputPhone') }}" 

      @endif >

       @if ($errors->has('inputPhone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputPhone') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>

<div class="form-row">
      <div class="form-group col-md-1">

        <label>{{ "Address" }}</label>
      </div>
  <div class="form-group col-md-11">

    <input type="text" class="form-control{{ $errors->has('inputAddress') ? ' is-invalid' : '' }}"  id="inputAddress"  name="inputAddress"       
    @if($school)
              value="{{ $school->address}}" 
      @else
            value="{{ old('inputAddress') }}" 

      @endif>

     @if ($errors->has('inputAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inputAddress') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>

<div class="form-row">
      <div class="form-group col-md-1">

          <label>{{ "Vision" }}</label>
        </div>

  <div class="form-group col-md-11">

    <textarea class="form-control" id="inputVision" name="inputVision" 

    >@if($school){{ $school->vision}} 
      @endif
    </textarea> 
  </div>

</div>
<div class="form-row">
      <div class="form-group col-md-1">

          <label>{{ "Mission" }}</label>
        </div>

  <div class="form-group col-md-11 ">
    <textarea class="form-control" id="inputMission" name="inputMission" >@if($school){{ $school->mission}} 

      @endif
    </textarea> 
  </div>
</div>
    
  </div>
  
    <button type="submit" class="btn btn-primary" >{{ __('Submit') }}</button>
</form>
</div>
    </div>
    
  </div> 
    </div>
  
  
    

@endsection



{{-- @extends('layout.header') --}}





   
