<section id="nav-bar" class="nav-bar-main-block">
    <div class="container">
      
{{--             Start mobile navigation                --}}

        <div class="navigation fullscreen-search-block">
            <span style="font-size: 30px; cursor: pointer;" onclick="openNav()" class="hamburger" > &#9778; </span>

            <div class="logo">
                <a href="{{ url('/') }}"><b><div class="logotext"> {{ $gsetting->project_title}} </div></b></a>
            </div>

            <div class="nav-search nav-wishlist">
                <a href="#find"><i class="fa fa-search"></i></a>
            </div>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
@guest
                <div class="login-block">
                    <a href=" {{ route('register')}} " class="btn btn-primary" title="register"> {{__('frontstaticword.signup') }} </a>
                    <a href=" {{ route('login')}} " class="btn btn-secondary" title="login">{{__('frontstaticword.login') }}</a>
                </div>
@endguest

                @auth
    

                <div id="notificationTitle">
                    <div class="user-detailss">
                        Hello ! {{ Auth::User()->fname }}
                    </div>
                </div>

                <div class="login-block">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div id="notificationFooter">
                            {{__('frontstaticword.logout') }}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                @csrf
                            </form>
                        </div>
                    </a>
                </div>
                @endauth

                @auth
                    <div class="sidebar-nav-icon">
                        <ul>
                            {{-- @if (Auth::User()->role == "admin")
                            <a target="_blank" href=" {{ url('/admins') }}"><li><i class="fa fa-dashboard"></i>{{__('frontstaticword.admindashboard') }}</li></a>                            
                            @endif
                            @if (Auth::User()->role == "cashier")
                                <a target="_blank" href="{{ url('/cashier')}}"><li><i class="fa fa-dashboard"></i>{{__('frontstaticword.cashierdashboard') }}</li></a>
                            @endif --}}

                            <a href=""><li><i class="fa fa-diamond"></i>{{__('frontstaticword.service') }}</li></a>
                            <a href=""><li><i class="fa fa-user"></i>{{__('frontstaticword.userprofile') }}</li></a>
                        </ul>
                    </div>
                @endauth
            </div>

        </div>

        {{-- End mobile navigation  --}}



    </div>
</section>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>