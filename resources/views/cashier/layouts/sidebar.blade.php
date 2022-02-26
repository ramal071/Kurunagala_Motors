<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()->image != null || Auth::User()->image !='')
          <img src="{{ asset('images/user_img/'.Auth::User()->image['url'] )}}" class="img-circle" alt="User Image">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="User Image">

          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.cashier') }}</a>
        </div>
      </div>

      @if(Auth::User()->role == "cashier")
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.Navigation') }} </li>
          <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>
          <li class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>

          <li class="flaticon-customer"></i>{{ __('adminstaticword.Appointment') }}</a></li>

          <li class="flaticon-customer"></i>{{ __('adminstaticword.TimeTable') }}</a></li>
          
          <li>
            <a href="#">
                <i class="flaticon-browser-1"></i>{{ __('adminstaticword.Course') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li>
                 
                  @if($gsetting->cat_enable == 1)
                  <a href="#"><i class="flaticon-interface" aria-hidden="true"></i>{{ __('adminstaticword.Category') }}<i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.Category') }}</a></li>
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.SubCategory') }}</a></li>
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.ChildCategory') }}</a></li>
                  </ul>
                  @endif                           

                  
                  @if($gsetting->assignment_enable == 1)
                  <li class="flaticon-computer" aria-hidden="true"></i><span>{{ __('adminstaticword.Assignment') }}</span></a></li>
                  @endif
                  @if($gsetting->appointment_enable == 1)
                  <li class="fa fa-calendar" aria-hidden="true"></i><span>{{ __('adminstaticword.Appointment') }}</span></a></li>
                  @endif
                 
                </li>
              </ul>
          </li>


          @if(1==2)
          <li class="flaticon-user" aria-hidden="true"></i><span> {{ __('adminstaticword.User') }} {{ __('adminstaticword.Enrolled') }}</span></a></li>


          <li class="{{ Nav::isResource('instructorquestion') }} {{ Nav::isResource('instructoranswer') }} treeview">
            <a href="#">
                <i class="flaticon-faq"></i> {{ __('adminstaticword.Question') }} / {{ __('adminstaticword.Answer') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="flaticon-help" aria-hidden="true"></i><span>{{ __('adminstaticword.Question') }}</span></a></li>

              <li class="flaticon-test" aria-hidden="true"></i><span>{{ __('adminstaticword.Answer') }}</span></a></li>
            </ul>
          </li>

          <li class="flaticon-mobile-marketing" aria-hidden="true"></i><span>{{ __('adminstaticword.Announcement') }}</span></a></li>

          <li class="flaticon-personal-information"></i>{{ __('adminstaticword.Blog') }}</a></li>
          @endif


        <ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>