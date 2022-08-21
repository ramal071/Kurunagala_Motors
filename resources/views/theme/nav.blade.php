<section id="nav-bar" class="nav-bar-main-block">
    <div class="container">

        <!-- start mobile navigation -->
        <div class="navigation fullscreen-search-block">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="hamburger">&#9776; </span>
            <div class="logo">           
                    <a href="{{ url('/') }}"><b><div class="logotext">{{ $gsetting->project_title }}</div></b></a>           
            </div>
       

            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @guest
                <div class="login-block">
                    <a href="{{ route('register') }}" class="btn btn-primary" title="register">{{ __('frontstaticword.signup') }}</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary" title="login">{{ __('frontstaticword.login') }}</a>
                </div>
                @endguest
                @auth

                <div id="notificationTitle">                    
                    <div class="user-detailss">
                        Hi, {{ Auth::User()->fname }}                        
                    </div>                    
                </div>

                <div class="login-block">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div id="notificationFooter">
                            {{ __('frontstaticword.logout') }}                            
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
                        {{-- <a href="{{route('password.updated',Auth::User()->id)}}"><li><i class="fa fa-heart"></i>{{ __('frontstaticword.passwordupdate') }}</li></a> --}}
                        <a href="{{route('profile.show',Auth::User()->id)}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.userprofile') }}</li></a>
                        <a href="{{url('customerPending-service/{id}')}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.pendingservice') }}</li></a>
                        <a href="{{url('customerPending-payment/{id}')}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.pendingpayment') }}</li></a>
                     </ul>
                </div>    
                @endauth
            </div>
        </div>
        
        <!-- end mobile navigation -->

        
        <div class="row smallscreen-search-block">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="logo">  
                                <a href="{{ url('/') }}"><b><div class="logotext">{{ $gsetting->project_title }}</div></b></a>                   
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7">
                @guest
                <div class="row">               
                    <div class="col-lg-1">
                    </div>
          
                    <div class="col-lg-12">
                        <div class="Login-btn">       
                                                          
                            <a href="{{ route('login') }}" class="btn btn-secondary" title="login">{{ __('frontstaticword.login') }}</a>
                            <a href="{{ route('register') }}" class="btn btn-primary" title="register">{{ __('frontstaticword.signup') }}</a>                            
                        </div> 
                    </div>

                @endguest

                @auth
                    {{-- Drop down --}}
                    <div class="col-lg-12 col-md-8 col-sm-8 col-8">
                        <div class="my-container">
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        
                                    <img src="{{ asset('images/default/user.jpg')}}"  class="circle" alt="">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                <div id="notificationTitle">
                                    <img src="{{ asset('images/default/user.jpg')}}" class="dropdown-user-circle" alt="">
                                    <div class="user-detailss">

                                        {{ Auth::User()->fname }}
                                        <br>
                                        {{ Auth::User()->email }}
                                    </div>
                                </div>
                                @canany(['isManager', 'isCashier'])
                                <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="flaticon-user" aria-hidden="true"></i><span>{{ __('adminstaticword.dashboard') }}</span></a></li>
                                @endcanany
                                <a href="{{route('profile.show',Auth::User()->id)}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.userprofile') }}</li></a>    
                                {{-- <a href="{{route('password.updated',Auth::User()->id)}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.passwordupdate') }}</li></a> --}}
                                <a href="{{url('customerPending-service/{id}')}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.pendingservice') }}</li></a>
                                <a href="{{url('customerPending-payment/{id}')}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.pendingpayment') }}</li></a>
                                
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <li>  <div id="user-detailss">
                                        {{ __('frontstaticword.logout') }}
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                            @csrf
                                        </form>
                                    </div> </li>
                                </a>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>
        
    </div>
</section>




<!-- side navigation  -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
@section('custom-script')
@endsection


