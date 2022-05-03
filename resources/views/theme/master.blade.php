<!DOCTYPE html>


@include('theme.head')


<!-- whatsapp chat button -->
<div id="myButton"></div>

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
