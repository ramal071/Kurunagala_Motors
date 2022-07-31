<!DOCTYPE html>


@include('theme.head')



{{-- <div id="myButton"></div> --}}

@include('theme.nav')
<!-- top-nav bar end-->
<!-- home start -->
@yield('content')

<!-- footer start -->
@include('theme.footer')


<!-- jquery -->
@include('theme.scripts')

</body>
</html> 
