
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schootech | @yield('title')</title>

    <!-- css files -->
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../css/font-awesome.min.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/header.css') }}">
     @yield('css')
   
</head>


<header>
<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light " >
<div class="container " style="margin-top:12px">
    <a class="navbar navbar-brand" href="../home">Schootech</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse " id="navbarToggleExternalContent" >

        <ul class="navbar-nav mr-auto">
            @guest
            @else
            <li class="nav-item active">      
                <a class="nav-link" data-scroll="home" href="{{ route('Home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-scroll="about"  href="/about">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link " href="{{ route('event') }}" >
                 Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-scroll="contact" href="/contactUs">Contact us</a>
            </li>
              @endguest
        </ul>
        <ul class="nav navbar-nav ml-auto" >
                 @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else  
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="{{ route('profile') }}"
                           onclick="event.preventDefault();">
                        </a> --}}
                        <a class="dropdown-item" href="{{ route('settings')}}" >Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="   display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                
        </ul>

       
    </div>
    
                
                
           
</div>
</nav>
</header>
 <body >
        @yield('content')


@extends('layouts.footer')



   


