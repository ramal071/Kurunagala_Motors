<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">   
          <img src="{{ asset('images/default/user.jpg') }}" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->fname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.online') }}</a>
        </div>
      </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.navigation') }}</li>

           {{-- Garage nav bar start --}}
        
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.dashboard') }}</span></a></li>

          {{-- <li class="{{ Nav::isRoute('user.index') }} {{ Nav::isRoute('user.add') }} {{ Nav::isRoute('user.edit') }}"><a href="{{route('user.index')}}"><i class="flaticon-user" aria-hidden="true"></i><span>{{ __('adminstaticword.customer') }}</span></a></li> --}}

          <li class="{{ Nav::isRoute('service') }} {{ Nav::isResource('service') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.service') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('service.index') }}"><a href="{{route('service.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.service')}}</a></li>
              <li class="{{ Nav::isRoute('servicetype.index') }}"><a href="{{route('servicetype.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.servicetype') }}</a></li>
              <li class="{{ Nav::isRoute('service.index') }}"><a href="{{route('service.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.service2')}}</a></li>
            </ul>
          </li> 

                    {{-- Employee = role/ employee --}}

          <li class="{{ Nav::isRoute('employee') }} {{ Nav::isResource('employee') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.employees') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('role.index') }}"><a href="{{route('role.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.role') }}</a></li>
              <li class="{{ Nav::isRoute('employee.index') }}"><a href="{{route('employee.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.employee')}}</a></li>
            </ul>
          </li> 

  
          <li class="{{ Nav::isRoute('product') }} {{ Nav::isResource('product') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.product') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('product.index') }}"><a href="{{route('product.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.product')}}</a></li>
              <li class="{{ Nav::isRoute('bike.index') }}"><a href="{{route('bike.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.bike') }}</a></li>
              <li class="{{ Nav::isRoute('brand.index') }}"><a href="{{route('brand.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.brand')}}</a></li>
            </ul>
          </li> 

          <li class="{{ Nav::isRoute('users.index') }}"><a href="{{route('users.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.users') }}</span></a></li>
 
          <li class="{{ Nav::isRoute('stock') }} {{ Nav::isResource('stock') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.stock') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('stock.index') }}"><a href="{{route('stock.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.stock') }}</a></li>
              <li class="{{ Nav::isRoute('damage.index') }}"><a href="{{route('damage.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.damage')}}</a></li>
              <li class="{{ Nav::isRoute('recondition.index') }}"><a href="{{route('recondition.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.recondition')}}</a></li>
            </ul>
          </li> 
        
        </ul>
      {{-- @endif --}}
    </section>
    <!-- /.sidebar -->
</aside>