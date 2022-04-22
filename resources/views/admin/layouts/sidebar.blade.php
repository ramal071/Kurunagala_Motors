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
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.online') }}</a>
        </div>
      </div>


      @if(Auth::User()->role == "admin")
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.Navigation') }}</li>
        
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>

          <li class={{ __('adminstaticword.Users') }}></li>

          {{-- Garage nav bar --}}

          <li class="{{ Nav::isRoute('role') }} {{ Nav::isResource('role') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.employees') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('role.index') }}"><a href="{{route('role.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.role') }}</a></li>
              <li class="{{ Nav::isRoute('employee.index') }}"><a href="{{route('employee.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.employee')}}</a></li>
            </ul>
          </li> 

          <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true">
              </i><span>{{ __('adminstaticword.brand') }}</span></a></li>                                
          </ul>

          <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true">
              </i><span>{{ __('adminstaticword.model') }}</span></a></li>                                
          </ul>

          <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true">
              </i><span>{{ __('adminstaticword.customer') }}</span></a></li>                                
          </ul>

        </ul>
      @endif
    </section>
    <!-- /.sidebar -->
</aside>