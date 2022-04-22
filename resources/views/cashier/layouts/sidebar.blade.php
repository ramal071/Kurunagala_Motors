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
          <a href="#"><i class="fa fa-circle text-success"></i> {{ __('adminstaticword.Cashier') }}</a>
        </div>
      </div>

      @if(Auth::User()->role == "cashier")
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">{{ __('adminstaticword.Navigation') }} </li>
          <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true">
            </i><span>{{ __('adminstaticword.Dashboard') }}</span></a></li>                                
        </ul>

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

        <ul class="sidebar-menu" data-widget="tree">
          <li class="{{ Nav::isRoute('cashier.index') }}"><a href="{{route('cashier.index')}}"><i class="flaticon-web-browser" aria-hidden="true">
            </i><span>{{ __('adminstaticword.ServiceBills') }}</span></a></li>                                
        </ul>
      @endif


    </section>
    <!-- /.sidebar -->
</aside>