<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img']))
          <img src="{{ asset('images/user_img/'.Auth::User()->user_img)}}" class="img-circle" alt="">

          @else
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="">

          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Online') }}</a>
        </div>
      </div>


      @if(Auth::User()->role == "admin")
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.Navigation') }}</li>
        
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>

          <li class={{ __('adminstaticword.Users') }}></li>

          {{-- Garage nav bar --}}

          <li class="{{ Nav::isRoute('role') }} {{ Nav::isResource('employees') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.Employees') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="flaticon-rec"></i>{{ __('adminstaticword.Role') }}</a></li>
              <li class="flaticon-rec"></i>{{ __('adminstaticword.Employees') }}</a></li>
            </ul>
          </li> 

          {{-- <li class="{{ Nav::isRoute('currency') }}"><a href="{{route('currency-show')}}"> <i class="flaticon-wallet"></i><span>{{ __('adminstaticword.Currency') }}</span></a></li> --}}
          <li class=<span>{{ __('adminstaticword.Currency') }}</span></li>
          {{-- locations --}}

          <li class="{{ Nav::isRoute('district') }} {{ Nav::isResource('city') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.Location') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="flaticon-rec"></i>{{ __('adminstaticword.District') }}</a></li>
              <li class="flaticon-rec"></i>{{ __('adminstaticword.City') }}</a></li>
            </ul>
          </li> 
         

          <li>
            <a href="#">
                <i class="flaticon-browser-1"></i>{{ __('adminstaticword.Subjects') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} treeview">
                  <a href="#"><i class="flaticon-interface" aria-hidden="true"></i>{{ __('adminstaticword.Category') }}<i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.Category') }}</a></li>
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.SubCategory') }}</a></li>
                    <li class="flaticon-rec"></i>{{ __('adminstaticword.ChildCategory') }}</a></li>
                  </ul>



              </li>
            </ul>
          </li>

          <li class="{{ Nav::isResource('slider') }} {{ Nav::isResource('facts') }} {{ Nav::isRoute('category.slider') }} {{ Nav::isResource('getstarted') }} {{ Nav::isResource('trusted') }} {{ Nav::isRoute('widget.setting') }} {{ Nav::isRoute('terms') }} {{ Nav::isResource('testimonial') }} {{ Nav::isResource('advertisement') }} treeview">
           <a href="#">
             <i class="flaticon-optimization" aria-hidden="true"></i> <span>{{ __('adminstaticword.FrontSetting') }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="flaticon-slider-tool"></i><span>{{ __('adminstaticword.Slider') }}</span></a></li>
              <li class="flaticon-project-management"></i><span>{{ __('adminstaticword.FactsSlider') }}</span></a></li>
              <li class="flaticon-interface"></i><span>{{ __('adminstaticword.CategorySlider') }}</span></a></li>
              <li class="flaticon-shuttle"></i>{{ __('adminstaticword.GetStarted') }}</a></li>
             
              <li class="flaticon-real-state"></i>{{ __('adminstaticword.WidgetSetting') }}</a></li>
              <li class="flaticon-customer-1"></i>{{ __('adminstaticword.Testimonial') }}</a></li>

              <li class="fa fa-object-group" aria-hidden="true"></i>{{ __('adminstaticword.Advertisement') }}</a></li>

              
            </ul>
          </li>
          

        </ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>