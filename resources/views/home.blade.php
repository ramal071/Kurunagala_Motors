@extends('theme.master')
@section('title', 'Home')
@section('content')

{{-- @include('admin.message')
@include('sweetalert::alert') --}}

@section('meta_tags')

<meta name="title" content="{{ $gsetting['title'] }}">
<meta name="description" content="{{ $gsetting['meta_data_desc'] }} ">
<meta property="og:title" content="{{ $gsetting['title'] }} ">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta property="og:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta itemprop="image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="og:type" content="website">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="twitter:title" content="{{ $gsetting['title'] }} ">
<meta property="twitter:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta name="twitter:site" content="{{ url()->full() }}" />

<link rel="canonical" href="{{ url()->full() }}"/>
<meta name="robots" content="all">
<meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">
    
@endsection



@if(isset($sliders))
<section id="home-background-slider" class="background-slider-block owl-carousel">
    <div class="lazy item home-slider-img">
        @foreach($sliders as $slider)

        @if($slider->status == 1)
        @if(isset($slider->images))
          @foreach($slider->images as $image)
          <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/slider/'.$image['url']) }}')">
          @endforeach
          @else
          <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/slider/'.$image['url']) }}')">
          @endif
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 {{$slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''}}">
                        <div class="home-dtl">
                            <div class="home-heading">{{ $slider['heading'] }}</div>
                            <p class="btm-10">{{ $slider['sub_heading'] }}</p>
                            <p class="btm-20">{{ $slider['detail'] }}</div>

                            @if($slider->search_enable == 1)
                                <div class="home-search">
                                    <form method="GET" id="searchform" action="{{ route('search') }}">
                                        <div class="search">
                                        
                                          <input type="text" name="searchTerm" class="searchTerm" placeholder="What do you want to learn?">
                                          <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                         </button>

                                        </div>
                                    </form> 
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endif
<!-- home end -->
<!-- learning-work start -->
@if(isset($facts))
<section id="learning-work" class="learning-work-main-block">
    <div class="container">
        <div class="row">
            @foreach($facts as $fact)
            <div class="col-lg-4 col-sm-6">
                <div class="learning-work-block">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="learning-work-icon">
                                <i class="fa {{ $fact['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="learning-work-dtl">
                                <div class="work-heading">{{ $fact['heading'] }}</div>
                                <p>{{ $fact['sub_heading'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- learning-work end -->

<!-- Advertisement -->
@if(isset($advs))
<section id="home-advertistment-slider" class="student-main-block top-40 owl-carousel">
    <div class="lazy item home-slider-img">
        @foreach($advs as $adv)
        @if($adv->position == 'belowslider') 
        @if(isset($adv->images))
          @foreach($adv->images as $image)
          <a href="{{ $adv->link }}" title="{{ __('Click to visit') }}">
          <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/advertisement/'.$image['url']) }}')">
          @endforeach
          @else
          <a href="">
            <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/advertisement/'.$image['url']) }}')">
          @endif
            </div>
           </a>
        </div>
        </a>
        @endif
        @endforeach
    </div>
</section>
@endif



<!-- learning-courses start -->
@if(isset($subjects))
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container">
        <h4 class="student-heading">{{ __('frontstaticword.RecentCourses') }}</h4>
        <div class="row">
            
            <div class="col-lg-12">
                <div class="learning-courses">
                    @if(isset($subjects->subject_id))
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      @foreach($subjects->subject_id as $cate)
                        @php
                            $cats= App\Subject::find($cate);
                        @endphp
                        @if(isset($cats))
                        @if($cats['status'])
                            <li class="btn nav-item" ><a class="nav-item nav-link" id="home-tab" data-toggle="tab" href="#content-tabs" role="tab" aria-controls="home" onclick="showtab('{{ $cats->id }}')" aria-selected="true">{{ $cats['name'] }}</a></li>
                        @endif
                        @endif
                      @endforeach
                    </ul>
                    @endif
                </div>
                <div class="tab-content" id="myTabContent">
                    @if(!empty($subjects))
                        @foreach($subjects->subject_id as $cate)
                            <div class="tab-pane fade show active" id="content-tabs" role="tabpanel" aria-labelledby="home-tab">
                                
                                <div id="tabShow">
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- learning-courses end -->


<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowrecent')
<br>  
<section id="student" class="student-main-block btm-40">
 <div class="container">
<a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
<img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}"
  alt="{{ $adv->image1 }}">
</a>
</div>
</section>
@endif

@endforeach

@endif
<!-- Advertisement -->
<!-- Student start -->



{{-- @endif --}}
<!-- Students end -->

<!-- services start-->
<section class="section services-section" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>SERVICES</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Welcome</h5>
                        <p>We at Kurunagala Motors offer convenient and quality driven services for your vehicle. </p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Promotion</h5>
                        <p>Check out our special promotions and offers at Kurunagala Motors Service Centers. Stay tuned for more details.</p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-comment"></i>
                    </div>
                    <div class="feature-content">
                        <h5>About Us</h5>
                        <p>Kurunagala Motors has established itself as a high-quality brand providing motorists with a range of bike care and lube solutions.  </p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-image"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Responsiveness</h5>
                        <p>We service and develop services for customers of all brand, specializing in creating stylish, motor bike.</p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Service Category</h5>
                        <p>Motorcycle service, engine repair, reconditioning, spare parts and fiber and paints </p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-cog"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Advanced Options</h5>
                        <p>our professionally trained staff delivers exceptional results on all types of bikes.</p>
                    </div>
                </div>
            </div>
            <!-- / -->
        </div>
    </div>
</section>
<!-- services end>-->


<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowbundle')
<br>  
<section id="student" class="student-main-block btm-40">
 <div class="container">
<a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
<img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}"
  alt="{{ $adv->image1 }}">
</a>
</div>
</section>
@endif

@endforeach

@endif


@endsection
