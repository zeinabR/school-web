@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/event.css') }}">
@endsection

@section('content') 
    <div class="container" style="padding-top: 100px; min-height: 580px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">School Events</h1>
            </div>
            @php  $i=1; @endphp {{-- index of event --}}
            @foreach ($school_events as $school_event)
              @if($i%2==1){{-- odd index of event --}}      
            <div class="row event">
              <div class="col-lg-8 col-md-12">
                <p class="event-text"><h5>Event : </h5>{{ $school_event->name }} </p>
                <p class="event-text"><h5>Event Description : </h5>{{ $school_event->description }} </p>
                <p class="event-text"><h5>Event Location: </h5>{{ $school_event->location }} </p>
                <p class="event-text"><h5>Event Time: </h5>{{ $school_event->time }} </p>
              </div>
              <div class="col-lg-4 col-md-12">
                  <img class="event-photo" src="../images/student/sport.jpg">
                  {{-- {{asset('assets/images/student/').'/'.$school_event->type.'.jpg'}} --}}{{-- /sport.jpg --}}
              </div>
            </div>
            
            @else
              <div class="row event">
              <div class="col-lg-4 col-md-12">
                      <img class="event-photo" src="../images/student/science.jpg">
              </div>
              <div class="col-lg-8 col-md-12">
                <p class="event-text"><h5>Event : </h5>{{ $school_event->name }} </p>
                <p class="event-text"><h5>Event Description : </h5>{{ $school_event->description }} </p>
                <p class="event-text"><h5>Event Location: </h5>{{ $school_event->location }} </p>
                <p class="event-text"><h5>Event Time: </h5>{{ $school_event->time }} </p>
              </div>
          </div>
            @endif
            <div class="clearfix"></div>
            @php   $i++; @endphp
            @endforeach          
        </div>
        <div class="clearfix"></div>
    </div>
@endsection