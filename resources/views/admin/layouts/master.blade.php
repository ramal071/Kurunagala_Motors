<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  
  <title>@yield('title') | {{ $project_title }}</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('css/datepicker.css') }}">
  <link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/fontawesome-iconpicker.min.css') }}">
  <link rel="stylesheet" href="{{url('admin/css/jquery-ui.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"> <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/dist/css/AdminLTE.min.css')}}">  
  <link rel="stylesheet" href="{{url('css/toggle.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/component.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/normalize.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('admin/plugins/pace/pace.min.css') }}">
  <link rel="stylesheet" href="{{url('admin/dist/css/skins/_all-skins.min.css')}}">
  <link href="{{url('admin/css/bootstrap-toggle.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/animate.min.css') }}"><!-- Custom Css --> 
  <link rel="stylesheet" href="{{ url('admin/css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>
  <link rel="stylesheet" href="{{ url('admin/font/font/flaticon.css') }}" /> <!-- fontawesome css -->

  <link rel="stylesheet" href="{{url('css/admin/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{url('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> <!-- calandar -->

  

  @yield('stylesheets')
  @yield('css_role_page')
  
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo">

      <span class="logo-lg"> <img title="{{ $project_title }}" width="100px" src="{{ url('images/logo/'.$gsetting->logo) }}" alt=""/></span>
    </a>
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('images/default/user.jpg')}}" class="user-image" alt="">            
                <span class="hidden-xs">

                  @auth
                  Hi..{{ Auth::user()->fname }} {{ Auth::user()->role->isNotEmpty() ? Auth::user()->role->first()->name : "" }}
                  @endauth
                  {{-- Hi ! {{ Auth()->User()['fname'] }} --}}
                </span>

              </a>            
            </li>
            
            <li>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form-2').submit();">
                    {{ __('adminstaticword.logout') }}
                </a>

                <form id="logout-form-2" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
      </nav>
    </header>

      @include('admin.layouts.sidebar')

    <div class="content-wrapper">
      <!-- Main content -->
      @yield('body')
      <!-- Main content end-->
    </div>
    <!-- /.content-wrapper -->
  
    <!-- /.control-sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{url('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ url('admin/js/select2.min.js')}}"></script>
  <script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> <!-- DataTables | id=example1 -->
  <script src="{{url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> <!-- SlimScroll -->

  <script src="{{url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script> <!-- FastClick -->
  <script src="{{url('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
 <!-- AdminLTE App -->
  <script src="{{url('admin/dist/js/adminlte.min.js')}}"></script> <!-- AdminLTE for demo purposes -->
  <script src="{{url('admin/dist/js/demo.js')}}"></script>
  <script src="{{ URL::asset('admin/bower_components/PACE/pace.min.js') }}"></script> 

  <script src="{{url('js/admin/bootstrap-tagsinput.js')}}"></script> 

  <script src="{{ url('admin/js/dataTables.buttons.min.js')}}"></script> 
  <script src="{{ url('admin/js/buttons.flash.min.js')}}"></script> 
  <script src="{{ url('admin/js/jszip.min.js')}}"></script>
  <script src="{{ url('admin/js/pdfmake.min.js')}}"></script>
  <script src="{{ url('admin/js/vfs_fonts.js')}}"></script>
  <script src="{{ url('admin/js/buttons.html5.min.js')}}"></script>
  <script src="{{ url('admin/js/buttons.print.min.js')}}"></script>

    {{-- chart --}}
  {{-- <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js')}}" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

  {{-- calandar --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  taginpt case --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

 
<script>
$(document).ready(function() {
  $('#example1').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'excel', 'pdf', 'print'
      ]
  } );
} );
</script>


  {{-- <script> --}}
@yield('js_post_page')
@yield('js_user_page')
@yield('js_slug_page')
@yield('scripts')
@yield('regnum_scripts')
@yield('service_scripts')
@yield('stock')
@yield('sprice_scripts')
@yield('calandar')
@yield('emp_pro')
@yield('barchart')

  {{-- </script> --}}
  
</body>
</html>


