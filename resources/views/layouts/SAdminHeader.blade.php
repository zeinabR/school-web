<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>

    <!-- css files -->
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/SadminHeader.css">
     @yield('css')
   
</head>

<header>


<nav class="navbar navbar-expand-xl  fixed-top" style="background-color: #112d3b;text-align: center;" >
  <!-- Brand -->
  <a class="navbar-brand" href="#" {{-- style="background-image: url(..\..\..\public\images\brand.jpg);" --}}>Schootech</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar" {{-- style="    margin-right: 32%;" --}}>
    <ul class="navbar-nav">
      <li class="nav-item">
        @php
        if($s=="y")
                echo '<a class="nav-link" href="home">School</a>  ';  
              else
                 echo '<a class="nav-link" href="../home">School</a>  ';
        @endphp
      </li>
      <li class="nav-item" >
        @php
          if(!$school)
                 echo '<a class="nav-link" href="#">Staff</a>  ';
          else{
            if( $staNumber>0){
              if($s=="y")
                echo '<a class="nav-link" href="Add_School_Info/viewStaffInfo">Staff</a>  ';  
              else
                 echo '<a class="nav-link" href="viewStaffInfo">Staff</a>  ';

          }    


            
            else 
             {
                if($s=="y")


                  echo '<a class="nav-link" href="Add_School_Info/add_staff_info">Staff</a>';  
                  else 
                  echo '<a class="nav-link" href="add_staff_info">Staff</a>';    
 

               
                }
              }
        
               @endphp 
      </li>

      <li class="nav-item">
        @php
          if(!$school)
                 echo '<a class="nav-link" href="#">Teacher</a>  ';
          else{
            if( $tNumber>0){
              if($s=="y")

                echo '<a class="nav-link" href="Add_School_Info/viewTeacherInfo">Teacher</a>  ';  
              else
                echo '<a class="nav-link" href="viewTeacherInfo">Teacher</a>  ';   

            }
            else 
             {
                  if($s=="y")

                  echo '<a class="nav-link" href="Add_School_Info/add_teacher_info">Teacher</a>';   
                  else
                  echo '<a class="nav-link" href="add_teacher_info">Teacher</a>';    
 

               
                }
              }
        
               @endphp 
      </li>
              <li class="nav-item">
                        @php
                      if(!$school)
                 echo '<a class="nav-link" href="#">Parent</a>  ';
          else{
            if( $pNumber>0){
                if($s=="y")

                echo '<a class="nav-link" href="Add_School_Info/viewParentInfo">Parent</a>  ';  
                else
                echo '<a class="nav-link" href="viewParentInfo">Parent</a>  ';   
 

            }
            else 
                {
                  if($s=="y")
                  echo '<a class="nav-link" href="Add_School_Info/addParentInfo">Parent</a>'; 
                else
                  echo '<a class="nav-link" href="addParentInfo">Parent</a>'; 

                }
        }
               @endphp 
      </li> 
      <li class="nav-item">
                @php
          if(!$school)
                 echo '<a class="nav-link" href="#">Student</a>  ';
          else{
            if( $stuNumber>0){
                if($s=="y")

                 echo '<a class="nav-link" href="Add_School_Info/viewStudentInfo">Student</a>  ';   
                else
                  echo '<a class="nav-link" href="viewStudentInfo">Student</a>  ';   

            }
            else 
             {


              if( $pNumber>0)
                  if($s=="y")

                  echo '<a class="nav-link" href="Add_School_Info/addStudentInfo">Student</a>';  
                  else
                  echo '<a class="nav-link" href="addStudentInfo">Student</a>';  

              else
                  if($s=="y")

                   echo '<a class="nav-link" href="Add_School_Info/addParentInfo" title="Please enter parents first then you can add students" data-toggle="popover" data-trigger="focus" data-content="Please enter parents first then you can add students">Student</a>';  
                  else
                   echo '<a class="nav-link" href="addParentInfo" title="Please enter parents first then you can add students" data-toggle="popover" data-trigger="focus" data-content="Please enter parents first then you can add students">Student</a>';  

                }
        }
               @endphp 
      </li> 

       

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
</nav>


</header>

 <body class="py-4">
        @yield('content')


</body>


 @extends('layouts.footer')  

        <script>
            $(function(){
                $('[data-toggle="popover"]').popover();   
            });
        </script>
