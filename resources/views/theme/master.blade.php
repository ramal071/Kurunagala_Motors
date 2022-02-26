<!DOCTYPE html>


<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" @if (in_array($language,$rtl)) dir="rtl" @endif>
<!-- <![endif]-->
<!-- head -->

@include('theme.head')

<!-- end head -->
<!-- body start-->
<body>
@if(env('GOOGLE_TAG_MANAGER_ENABLED') == 'true' && env('GOOGLE_TAG_MANAGER_ID') == !NULL)
@include('googletagmanager::body')
@endif
<!-- preloader --> 

@if($gsetting->preloader_enable == 1)

<div class="preloader">
    <div class="status">
      @if(isset($gsetting->preloader_logo))
        <div class="status-message">
        	<img src="{{ asset('images/logo/'.$gsetting['preloader_logo']) }}" alt="logo" class="img-fluid">
        </div>
      @endif
    </div>
</div>

@endif
<!-- whatsapp chat button -->
<div id="myButton"></div>


@php
  if(isset(Auth::user()->orders)){
      //Run User Enroll expire background process
      App\Jobs\EnrollExpire::dispatchNow();
  }

  if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1){

    if(isset(Auth::user()->plans)){
        //Run User Plan Subscription expire background process
        App\Jobs\InstructorPlan::dispatchNow();
    }
  }

  
@endphp
<!-- end preloader -->
<!-- top-nav bar start-->
@include('theme.nav')
<!-- top-nav bar end-->
<!-- home start -->
@yield('content')
<!-- testimonial end -->
<!-- footer start -->
@include('theme.footer')
<!-- footer end -->
<!-- jquery -->
@include('theme.scripts')
<!-- end jquery -->
</body>
</html> 
