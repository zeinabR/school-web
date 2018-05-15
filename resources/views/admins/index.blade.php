@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card " style="margin-top: 120px;width: 100%;
    margin-bottom: 30px; ">
                <div class="card-header text-center">
                    <h2>All Schools</h2>
                </div>
{{-- @php $mySchool = session('mySchool') @endphp --}}
                <div class="card-body">
                    {{-- @if (session('status')) --}}
                       {{--  <div class="alert alert-success">
                            {{ session('status') }}
                        </div> --}}
                        <div class="row">
                            @foreach($mySchool as $school)
                            <div class="col-md-6" style="margin: 20px; ">
                                <h4><a href="deleteSchool/{{ $school->id }}"> {{ $school->name }}</a></h4>
                                <hr>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px; margin-left: 50px;">
                                <h6>Address : {{ $school->address }}</h6>
                                <h6>Phone : {{ $school->phone }}</h6>
                            </div>
                            @endforeach
                        </div>

                    {{-- @endif   --}}
                    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                       You are logged in successfully!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> --}}
                    
                </div>

            </div>
        </div>
        <div class="col-md-4 text-center" style="margin-top: 300px ; text-align: right;">
            <h4 style="color: tomato">To Remove a school, just click on its name.</h4>
            <button class="btn btn-outline-warning mt-5"> <a href=" {{ route('add_admin.index') }} " > <h5>Add School Admin</h5></a></button>
        </div>
    </div>
</div>
@endsection
