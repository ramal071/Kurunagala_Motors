<head>
    @if(env('GOOGLE_TAG_MANAGER_ENABLED') == 'true' && env('GOOGLE_TAG_MANAGER_ID') == !NULL)
    @include('googletagmanager::head')
    @endif
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{-- {!! SEO::generate() !!} --}}
    
    <title>@yield('title') | {{ $project_title ?? '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Media City" />
    <meta name="MobileOptimized" content="320" />
    
    @yield('meta_tags')
    @if(isset($gsetting))
    <link rel="icon" type="image/icon" href="{{ url('images/favicon/'.$gsetting->favicon) }}"> <!-- favicon-icon -->
    @endif
    <!-- theme styles -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:300,400,500,700" rel="stylesheet"> <!--  google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap:400,500,600,700" rel="stylesheet"><!-- google fonts -->
    <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/all.css') }}" /> <!--  fontawesome css -->
    <link rel="stylesheet" href="{{ url('vendor/font/flaticon.css') }}" /> <!-- fontawesome css -->
    <link rel="stylesheet" href="{{ url('vendor/navigation/menumaker.css') }}" /> <!-- navigation css -->
    <link rel="stylesheet" href="{{ url('vendor/owl/css/owl.carousel.min.css') }}" /> <!-- owl carousel css -->
    <link rel="stylesheet" href="{{ url('vendor/protip/protip.css') }}" /> <!-- menu css -->
    
    
    
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/> <!-- custom css -->
    <link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}"><!-- fontawesome css -->
    <link rel="stylesheet" href="{{ url('css/select2.min.css') }}"> <!-- select2 css -->
    <link rel="stylesheet" href="{{ URL::asset('css/pace.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/protip.css') }}" /> <!-- protip css -->
    
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>
    
    <link rel="stylesheet" href="{{ asset('css/venom-button.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/xzoom.css') }}" media="all" /> <!--  xzoom -->
    
    
    @if(env('PWA_ENABLE') == 1)
      @laravelPWA
    @endif
    
    
    <!-- end theme styles -->
    @php
    if(Schema::hasTable('color_options')){
      $color = App\ColorOption::first();
    }
    @endphp
    @if(isset($color))
    
    <style type="text/css">
      
      :root {
      --linear-gradient-bg-color:linear-gradient(-45deg, {{ $color['linear_bg_one'] }} 0, {{ $color['linear_bg_two'] }} 100%);
      --linear-gradient-reverse-bg-color:linear-gradient(-45deg, {{ $color['linear_reverse_bg_one'] }} 0, {{ $color['linear_reverse_bg_two'] }} 100%);
      --linear-gradient-about-bg-color:linear-gradient(197.61deg, {{ $color['linear_about_bg_one'] }} , {{ $color['linear_about_bg_two'] }});
      --linear-gradient-about-blue-bg-color:linear-gradient(40deg, {{ $color['linear_about_bluebg_one'] }} 33%, {{ $color['linear_about_bluebg_two'] }} 84%);
      --linear-gradient-career-bg-color:linear-gradient(22.72914987deg, {{ $color['linear_career_bg_one'] }} 4%, {{ $color['linear_career_bg_two'] }});
      --background-blue-bg-color: {{ $color['blue_bg'] }};
      --background-red-bg-color: {{ $color['red_bg'] }}; 
      --background-grey-bg-color:{{ $color['grey_bg'] }};
      --background-light-grey-bg-color:{{ $color['light_grey_bg'] }};
      --background-black-bg-color:{{ $color['black_bg'] }};
      --background-white-bg-color:{{ $color['white_bg'] }};
      --background-mehroon-bg-color:{{ $color['dark_red_bg'] }};
      --text-black-color:{{ $color['black_text'] }};
      --text-light-grey-color:{{ $color['light_grey_text'] }};
      --text-dark-grey-color:{{ $color['dark_grey_text'] }};
      --text-red-color:{{ $color['red_text'] }};
      --text-blue-color:{{ $color['blue_text'] }};
      --text-dark-blue-color:{{ $color['dark_blue_text'] }};
      --text-white-color:{{ $color['white_text'] }};
    }
    </style>
    
    @else
    
    <style type="text/css">
     :root {
    
      --linear-gradient-bg-color:linear-gradient(-45deg, #1ae4ad 0, #399984 100%);
      --linear-gradient-reverse-bg-color:linear-gradient(-45deg, #399984 0,#1ae4ad 100%);
      --linear-gradient-about-bg-color:linear-gradient(197.61deg,#F44A4A,#6E1A52);
      --linear-gradient-about-blue-bg-color:linear-gradient(40deg,#1A263A 33%,#4A8394 84%);
      --linear-gradient-career-bg-color:linear-gradient(22.72914987deg,#F5C252 4%,#6AC1D0);
      --background-blue-bg-color: #0284A2;
      --background-red-bg-color:#F44A4A; 
      --background-grey-bg-color:#F7F8FA;
      --background-geen-bg-color:#1ae4ad;
      --background-light-grey-bg-color:#F9F9F9;
      --background-black-bg-color:#29303B;
      --background-white-bg-color:#FFF;
      --background-mehroon-bg-color:#992337;
      --text-black-color:#29303B;
      --text-light-grey-color:#777;
      --text-red-color:#F44A4A;
      --text-dark-grey-color:#686F7A; 
      --text-blue-color:#0284A2;
      --text-dark-blue-color:#003845;
      --text-white-color:#FFF;
      --text-gray-color: #7a808d;
    }
    
    </style>
    
    @endif
    
    
    @yield('custom-head')
    </head>