<aside class="main-sidebar">
    <section class="sidebar">
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

{{-- dashboard --}}
           {{-- @if(!\Auth::user()->hasRole('customer') )    --}}
     
          <li class="{{ Nav::isRoute('admin.index') }}"><a href="{{route('admin.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.dashboard') }}</span></a></li>
            {{-- @endif --}}

{{-- service --}}
          {{-- <li class="{{ Nav::isRoute('service') }} {{ Nav::isResource('service') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.service') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('service.index') }}"><a href="{{route('service.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.service')}}</a></li>
              <li class="{{ Nav::isRoute('servicetype.index') }}"><a href="{{route('servicetype.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.servicetype') }}</a></li>
              <li class="{{ Nav::isRoute('service.index') }}"><a href="{{route('service.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.service2')}}</a></li>
            </ul>
          </li>  --}}
{{-- Employee = role/ employee --}}
@if(Auth::User()->role_id == "1")
        
            <li class="{{ Nav::isRoute('employee') }} {{ Nav::isResource('employee') }} treeview">
              <a href="#">
                  <i class="flaticon-location"></i>{{ __('adminstaticword.employees') }}
                  <i class="fa fa-angle-left pull-right"></i>
              </a> 
              <ul class="treeview-menu">   
                <li class="{{ Nav::isRoute('role.index') }}"><a href="{{route('role.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.role') }}</a></li>
                <li class="{{ Nav::isRoute('employee.index') }}"><a href="{{route('employee.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.employee')}}</a></li>
                <li class="{{ Nav::isRoute('salary.index') }}"><a href="{{route('salary.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.salary')}}</a></li>
                <li class="{{ Nav::isRoute('leave.index') }}"><a href="{{route('leave.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.leave')}}</a></li>
                <li class="{{ Nav::isRoute('employee_serviceRepair.index') }}"><a href="{{route('employee_serviceRepair.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.employeeservice')}}</a></li>
                <li class="{{ Nav::isRoute('attendance.index') }}"><a href="{{route('attendance.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.attendance')}}</a></li>
                <li class="{{ Nav::isRoute('attendancereport.index') }}"><a href="{{route('attendancereport.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.attendancereport')}}</a></li>
                {{-- <li class="{{ Nav::isRoute('employee.employeeService') }}"><a href="{{route('employee.employeeService')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.employeeservice')}}</a></li> --}}
      
              </ul>
            </li> 
           
          @endif

{{--  Product = bike , brand ,  product --}}
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

{{-- customer = bike register , job details , pending service , pending payment --}}
          {{-- @if(!\Auth::user()->hasRole('customer') )   --}}
           <li class="{{ Nav::isRoute('customer') }} {{ Nav::isResource('customer') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.customer') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">            
              <li class="{{ Nav::isRoute('customervehicle.index') }}"><a href="{{route('customervehicle.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.customer') }} {{ __('adminstaticword.bikeregister') }}</a></li>
              <li class="{{ Nav::isRoute('customerpendingservice.index') }}"><a href="{{route('customerpendingservice.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.pendingservice')}}</a></li>
              <li class="{{ Nav::isRoute('customerpendingpayment.index') }}"><a href="{{route('customerpendingpayment.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.pendingpayment')}}</a></li>
              <li class="{{ Nav::isRoute('customerjobdetail.index') }}"><a href="{{route('customerjobdetail.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.customer') }} {{__('adminstaticword.jobdetails')}}</a></li>
            </ul>
          </li> 
          {{-- @endif --}}

{{-- job = details, complete --}}
          <li class="{{ Nav::isRoute('servicerepair') }} {{ Nav::isResource('servicerepair') }} treeview">
            <a href="#">
                <i class="flaticon-location"></i>{{ __('adminstaticword.servicerepair') }}
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
            <ul class="treeview-menu">    
              <li class="{{ Nav::isRoute('service.index') }}"><a href="{{route('service.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.service')}}</a></li>   
              <li class="{{ Nav::isRoute('service_servicerepair.index') }}"><a href="{{route('service_servicerepair.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.serviceforjob')}}</a></li> 
              <li class="{{ Nav::isRoute('stock_servicerepair.index') }}"><a href="{{route('stock_servicerepair.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.productforjob')}}</a></li>   
              <li class="{{ Nav::isRoute('servicerepair.index') }}"><a href="{{route('servicerepair.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.servicerepair') }}</a></li>
              <li class="{{ Nav::isRoute('completejob.index') }}"><a href="{{route('completejob.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.job') }} {{__('adminstaticword.status') }}</a></li>
              {{-- <li class="{{ Nav::isRoute('servicerepair.usedProductService') }}"><a href="{{route('servicerepair.usedProductService')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.usedproductservice') }}</a></li> --}}
           </ul>
          </li> 

{{-- user add --}}
          {{-- @if(!\Auth::user()->hasRole('customer') )   --}}
            <li class="{{ Nav::isRoute('users.index') }}"><a href="{{route('users.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.users') }}</span></a></li>
            {{-- @endif --}}
{{-- stock , damage, recondition --}}
          {{-- @if(!\Auth::user()->hasRole('customer') )   --}}

            <li class="{{ Nav::isRoute('stock') }} {{ Nav::isResource('stock') }} treeview">
              <a href="#">
                  <i class="flaticon-location"></i>{{ __('adminstaticword.stock') }}
                  <i class="fa fa-angle-left pull-right"></i>
              </a> 
              <ul class="treeview-menu">            
                <li class="{{ Nav::isRoute('stock.index') }}"><a href="{{route('stock.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.stock') }}</a></li>
                <li class="{{ Nav::isRoute('damage.index') }}"><a href="{{route('damage.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.damage')}}</a></li>
                <li class="{{ Nav::isRoute('recondition.index') }}"><a href="{{route('recondition.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.recondition')}}</a></li>
                <li class="{{ Nav::isRoute('gnr.index') }}"><a href="{{route('gnr.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.gnr')}}</a></li>
                {{-- <li class="{{ Nav::isRoute('stock.gnrview') }}"><a href="{{route('stock.gnrview')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.gnr')}}</a></li> --}}
                <li class="{{ Nav::isRoute('stock.index') }}"><a href="{{route('stock.index')}}"><i class="flaticon-rec"></i>{{__('adminstaticword.limit')}}</a></li>
                <li class="{{ Nav::isRoute('limit.index') }}"><a href="{{route('limit.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.pendinglimit') }}</a></li>
              </ul>
            </li> 
            {{-- @endif --}}

            {{-- @if(!\Auth::user()->hasRole('customer') )   --}}
            <li class="{{ Nav::isRoute('settings') }} {{ Nav::isResource('settings') }} treeview">
             <a href="#">
                 <i class="flaticon-location"></i>{{ __('adminstaticword.settings') }}
                 <i class="fa fa-angle-left pull-right"></i>
             </a> 
             <ul class="treeview-menu">            
               <li class="{{ Nav::isRoute('workinghour.index') }}"><a href="{{route('workinghour.index')}}"><i class="flaticon-rec"></i>{{ __('adminstaticword.workinghour') }} </a></li>
               <li class="{{ Nav::isRoute('calendar.index') }}"><a href="{{route('calendar.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.calendar') }}</span></a></li>
                </ul>
           </li> 
           {{-- @endif --}}

          {{-- <a href="{{route('profile.show',Auth::User()->id)}}"><li ><i class="fa fa-user"></i>{{ __('frontstaticword.') }}</li></a>      --}}

          <li class="{{ Nav::isRoute('profile.show') }}"><a href="{{route('profile.show',Auth::User()->id)}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.userprofile') }}</span></a></li>

          <li class="{{ Nav::isRoute('password.update') }}"><a href="{{route('password.update',Auth::User()->id)}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.passwordupdate') }}</span></a></li>
        
          {{-- @if(!\Auth::user()->hasRole('customer') )   --}}
            <li class="{{ Nav::isRoute('contact.index') }}"><a href="{{route('contact.index')}}"><i class="flaticon-web-browser" aria-hidden="true"></i><span>{{ __('adminstaticword.contact') }}</span></a></li>
           {{-- @endif --}}

        </ul>

    </section>

</aside>