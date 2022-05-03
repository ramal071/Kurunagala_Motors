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

  

  @yield('stylesheets')
  
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo">
  
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <img title="{{ $project_title }}" width="100px" src="{{ url('images/logo/'.$gsetting->logo) }}" alt=""/></span>
    </a>
      <!-- Header Navbar: style can be found in header.less -->
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
                <span class="hidden-xs">Hi ! {{ Auth()->User()['fname'] }}</span>
              </a>            
            </li>
            <!-- Control Sidebar Toggle Button -->
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

    <!-- Left side column. contains the logo and sidebar -->
    @if(Auth::User()->role == "admin")
      @include('admin.layouts.sidebar')
    @endif
    @if(Auth::User()->role == "cashier")
      @include('cashier.layouts.sidebar')
    @endif
    
    <!-- Content Wrapper. Contains page content -->
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
  <!-- Bootstrap 3.3.7 -->
  <script src="{{url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> <!-- DataTables -->
  <script src="{{url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> <!-- SlimScroll -->
  <script src="{{url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script> <!-- FastClick -->
  <script src="{{url('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{url('admin/dist/js/adminlte.min.js')}}"></script> <!-- AdminLTE for demo purposes -->
  <script src="{{url('admin/dist/js/demo.js')}}"></script>
  <script src="{{ URL::asset('admin/bower_components/PACE/pace.min.js') }}"></script> 


  
</body>
</html>
