


<section id="nav-bar" class="nav-bar-main-block">
    <div class="container">

        <!-- start mobile navigation -->
        <div class="navigation fullscreen-search-block">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="hamburger">&#9776; </span>
            <div class="logo">           
                    <a href="{{ url('/') }}"><b><div class="logotext">{{ $gsetting->project_title }}</div></b></a>           
            </div>
            <div class="nav-search nav-wishlist">                
                <a href="#find"><i class="fa fa-search"></i></a>
            </div>

           {{-- @auth
             <div class="nav-wishlist">                
            </div>
            @endauth
             --}}

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
                     @if(Auth::User()->image != null && Auth::User()->image !='' && @file_get_contents('images/user_img/'.Auth::user()->image['url']))
                      <img src="{{ url('/images/user_img/'.Auth::User()->image['url']) }}" class="dropdown-user-circle" alt="">
                    @else
                        <img src="{{ asset('images/default/user.jpg')}}" class="dropdown-user-circle" alt="">
                    @endif
                    <div class="user-detailss">
                        Hi, {{ Auth::User()->fname }}
                        
                    </div>
                    
                </div>

                <div class="login-block">

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div id="notificationFooter">
                            {{ __('frontstaticword.Logout') }}
                            
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
                         @if(Auth::User()->role == "admin" )
                        <a target="_blank" href="{{ url('/admins') }}"><li><i class="fa fa-dashboard"></i>{{ __('frontstaticword.AdminDashboard') }}</li></a>
                        @endif
                        @if(Auth::User()->role == "cashier")

                        <a target="_blank" href="{{ url('/cashier') }}"><li><i class="fa fa-dashboard"></i>{{ __('frontstaticword.cashierdashboard') }}</li></a>
                        @endif
                        <a href=""><li><i class="fa fa-diamond"></i>{{ __('frontstaticword.Forum') }}</li></a>
                        <a href=""><li><i class="fa fa-heart"></i>{{ __('frontstaticword.myservice') }}</li></a>
                        <a href=""><li><i class="fa fa-users"></i>{{ __('frontstaticword.GoToForum') }}</li></a>
                        <a href=""><li ><i class="fa fa-user"></i>{{ __('frontstaticword.userprofile') }}</li></a>
                     </ul>
                </div>
                
               
                @endauth
            </div>
        </div>
        
        <!-- end mobile navigation -->
        <div class="row smallscreen-search-block">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <div class="logo">  
                                <a href="{{ url('/') }}"><b><div class="logotext">{{ $gsetting->project_title }}</div></b></a>                   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <div class="navigation">
                            <div id="cssmenu">
                                <ul>
                                    <li><a href="#" title=""><i class="flaticon-grid"></i>{{ __('frontstaticword.service') }}</a>                                    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                @guest
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="learning-business learning-business-two">
                           
                                    <div class="logo text-center">
                                        @php
                                            $logo = App\Setting::first();
                                        @endphp                    
                                       <a href="{{ url('/') }}"><b><div class="logotext">{{ $logo->project_title }}</div></b></a>
                                     
                                    </div>
                               


                                {{--  --}}

                        </div>
                    </div>
               
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-1">
                        <div class="search" id="search">
                            <form method="GET" id="searchform" action="">
                              <div class="search-input-wrap">
                                <input class="search-input" name="searchTerm" placeholder="Search in Site" type="text" id="s"/>
                              </div>
                              <input class="search-submit" type="submit" id="go" value="">
                              <div class="icon"><i class="fa fa-search"></i></div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="Login-btn">                            
                            <a href="{{ route('login') }}" class="btn btn-secondary" title="login">{{ __('frontstaticword.login') }}</a>
                            <a href="{{ route('register') }}" class="btn btn-primary" title="register">{{ __('frontstaticword.signup') }}</a>
                            
                        </div> 
                    </div>

                @endguest

                @auth
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="learning-business learning-business-two">
                            
                        {{-- @if($gsetting->instructor_enable == 1)
                                    <a href="{{ route('front.instructors') }}" class="btn btn-link" title="Find An Instructor">{{ __('frontstaticword.FindInstructor') }}</a>
                                @endif --}}

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="learning-business">
                            <a href="" class="btn btn-link" title="Go to Forum">{{ __('frontstaticword.Forum') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <ul id="nav">
                                <li id="notification_li">
                                    <a href="" id="notificationLink" title="Notification"><i class="fa fa-bell"></i></a>
                                    <span class="red-menu-badge red-bg-success">
                                        {{ Auth()->User()->unreadNotifications->count() }}
                                    </span>
                                    <div id="notificationContainer">
                                    <div id="notificationTitle">{{ __('frontstaticword.Notifications') }}</div>
                                    <div id="notificationsBody" class="notifications">
                                        <ul>
                                            @foreach(Auth()->User()->unreadNotifications as $notification)
                                                <li class="unread-notification">
                                                    <a href="{{route('markAsRead',$notification->id)}}">          
                                                    <div class="notification-image">
                                                        @php
                                                        $userimg = \App\User::select('id')->with('image')
                                                                    ->where('id',$notification->data['id'])
                                                                    ->get()->toArray();
                                                        @endphp
                                                        @if(!empty($userimg[0]['image']))
                                                            <img src="{{ asset('images/user_img/'.$userimg[0]['image']['url']) }}" alt="user image" class="img-fluid rounded-circle" >
                                                        @else
                                                            <img src="{{ asset('images/default/user.jpg') }}" alt="user image" class="img-fluid rounded-circle">
                                                        @endif
                                                    </div>
                                                    <div class="notification-data">
                                                        {{ str_limit($notification->data['data'], $limit = 50, $end = '...') }}
                                                    </div>
                                                    </a>
                                                </li>
                                            @endforeach

                                            @foreach(Auth()->User()->readNotifications as $notification)
                                                <li>
                                                    <a href="">
                                                    <div class="notification-image">
                                                    @php
                                                        $userimg = \App\User::select('id')->with('image')
                                                                    ->where('id',$notification->data['id'])
                                                                    ->get()->toArray();
                                                    @endphp
                                                        @if(!empty($userimg[0]['image']))
                                                            <img src="{{ asset('images/user_img/'.$userimg[0]['image']['url']) }}" alt="user image" class="img-fluid rounded-circle" >
                                                        @else
                                                            <img src="{{ asset('images/default/user.jpg') }}" alt="user image" class="img-fluid rounded-circle">
                                                        @endif
                                                    </div>
                                                    <div class="notification-data">
                                                        {{ str_limit($notification->data['data'], $limit = 50, $end = '...') }}
                                                    </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="notificationFooter"><a href="">{{ __('frontstaticword.ClearAll') }}</a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>






                    

                    {{-- <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <a href="" title="Go to Wishlist"><i class="fa fa-heart"></i></a>
                            <span class="red-menu-badge red-bg-success">
                                @php
                                    $wishlist = App\Wishlist::where('user_id', Auth::User()->id)->get();
                                    
                                @endphp

                                

                                @php
                                    $counter = 0;
                                    foreach ($wishlist as $item) {
                                         if($item->instructor->is_approve){

                                              
                                          $counter++;
       
                                         }
                                    }

                                    echo  $counter; 
                                @endphp
                            </span>
                        </div>
                    </div> --}}

                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="search search-one" id="search">
                            <form method="GET" id="searchform" action="">
                              <div class="search-input-wrap">
                                <input class="search-input" name="searchTerm" placeholder="Search in Site" type="text" id="s"/>
                              </div>
                              <input class="search-submit" type="submit" id="go" value="">
                              <div class="icon"><i class="fa fa-search"></i></div>
                            </form>
                        </div>
                        <a href="#find"><i class="fa fa-search"></i></a>
                    </div>

                    {{-- Drop down --}}
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="my-container">
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                 @if(Auth::User()->image != null && Auth::User()->image !='' && @file_get_contents('images/user_img/'.Auth::user()->image['url']))
                                  <img src="{{ url('/images/user_img/'.Auth::User()->image['url']) }}" class="circle" alt="">
                                @else
                                    <img src="{{ asset('images/default/user.jpg')}}"  class="circle" alt="">
                                @endif
                                <span class="dropdown__item name" id="name">{{ str_limit(Auth::User()->fname, $limit = 10, $end = '..') }}</span>
                                <span class="dropdown__item caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                <div id="notificationTitle">
                                     @if(Auth::User()->image != null && Auth::User()->image !='' && @file_get_contents('images/user_img/'.Auth::user()->image['url']))
                                      <img src="{{ url('/images/user_img/'.Auth::User()->image['url']) }}" class="dropdown-user-circle" alt="">
                                    @else
                                        <img src="{{ asset('images/default/user.jpg')}}" class="dropdown-user-circle" alt="">
                                    @endif
                                    <div class="user-detailss">
                                        {{ Auth::User()->fname }}
                                        <br>
                                        {{ Auth::User()->email }}
                                    </div>
                                    
                                </div>
                                @if(Auth::User()->role == "admin" )
                                <a target="_blank" href="{{ url('/admins') }}"><li><i class="fa fa-dashboard"></i>{{ __('frontstaticword.AdminDashboard') }}</li></a>
                                @endif
                                @if(Auth::User()->role == "instructor")

                                <a target="_blank" href="{{ url('/instructor') }}"><li><i class="fa fa-dashboard"></i>{{ __('frontstaticword.InstructorDashboard') }}</li></a>
                                @endif
                                <a href=""><li><i class="fa fa-heart"></i>{{ __('frontstaticword.MyWishlist') }}</li></a>
                                <a href=""><li><i class="fa fa-users"></i>{{ __('frontstaticword.GoToForum') }}</li></a>
                                <a href=""><li ><i class="fa fa-user"></i>{{ __('frontstaticword.UserProfile') }}</li></a>
                                @if(Auth::User()->role == "user")
                                 
                                {{-- @if($gsetting->cashier_enable == 1) --}}
                                <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Cashier"><li><i class="fas fa-chalkboard-teacher"></i>{{ __('frontstaticword.BecomeAnInstructor') }}</li></a>

                                
                                @endif
                             

                                

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div id="notificationFooter">
                                        {{ __('frontstaticword.Logout') }}
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                            @csrf
                                        </form>
                                    </div>
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

<!-- start search -->
<div id="find" class="small-screen-navigation align-items-center">
    <button type="button" class="close">×</button>
     <form action="" class="form-inline search-form" method="GET">
         <input type="find" name="searchTerm" class="form-control" id="search" placeholder="{{ __('frontstaticword.SearchforInstructors') }}" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
         
         <button type="submit" class="btn btn-outline-info btn_sm">Search</button> 
         
     </form>
</div>
<!-- start end -->


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


