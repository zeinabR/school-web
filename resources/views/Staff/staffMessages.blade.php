<?php
session_start();
// $pageTitle = 'Color | About';

//   $css_files = '<link rel="stylesheet" href="../css/about/about.css">';

//   include '../init.php';

  
?>

@extends('layouts.header')

{{-- @extends('layouts.footer') --}}

@extends('layouts.staffsidebar')
@section('css')
<link rel="stylesheet" href="../css/staff.css">
@endsection
<div class ="staffMessages">
<div class="table-responsive">
      <table class="table table-striped">
        <tr>
        <col width=25%>
        <col width="25%">
        <col width="50%">
          <th>From</th>
          <th>Description</th>
          <th>Message</th>
        </tr>
      </table>
    </div>
</div>
<?php 
//    $js_files = '<script src="../js/staff.js"></script>';

  //  include  '../' . $tmpl . 'footer.php';

    ?>   