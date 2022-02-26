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

<!-- categories-tab start-->
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
           @if(!empty($childcategory))
            @foreach($childcategory as $cat)

                <div class="item categories-tab-dtl">
                    <a href="{{ route('category.page',['id' => $cat['id'], 'category' => str_slug(str_replace('-','&',$cat['slug']))]) }}" title="{{ $cat['name'] }}"><i class="fa "></i>{{ $cat['name'] }}</a>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!-- categories-tab end-->

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
                        <h5>Unique design</h5>
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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
                        <h5>Different Layout</h5>
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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
                        <h5>Make it Simple</h5>
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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
                        <h5>Testing for Perfection</h5>
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
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



<!-- categories start -->

@if(!empty($subcategory))

<section id="categories" class="categories-main-block">
    <div class="container">
        <div class="section-title">
        <h2 class="categories-heading btm-30">{{ strtoupper(__('frontstaticword.PopulerStreams')) }}</h2>
        </div>
        <div class="row">

            @foreach($subcategory as $t)
            @if($t['status'] == 1 && $t['featured'] == 1)

            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="btm-20">
                <a href="{{ route('category.page',['id' => $t['id'], 'category' => str_slug(str_replace('-','&',$t['slug']))]) }}">
                <div class="ribbon-content">
                    <div class="ribbon dark"><i class="fa {{ $t['icon'] }}"></i>{{ $t['name'] }}</span></div>
                </div>
                </a>
                </div>
                
            </div>

            @endif
            @endforeach
        </div>
    </div>
</section>



@endif

<!-- categories end -->

<div class="container-fluid">
<div class="container">
    <div class="row">
            @if(!empty($frontinstructors) && count($frontinstructors)>=6)
            @foreach($frontinstructors as $key=> $instructor)

            <div class="col-lg-4">
                    
                    <div class="text-center card-box card curve-bg">
                    <div class="pt-2 pb-2">      
                        @php 
                        $userImgs = App\User::with('image')->where('id',$instructor['user_id'])->get()->toArray();
                        @endphp
                        @foreach($userImgs as $userImg)

                        @if($userImg['image']!=null)
                        <a href="{{ route('view.instructor',$instructor['user_id']) }}" style="cursor: pointer;">
                        <div class="thumb-lg member-thumb mx-auto">
                        <img src="{{asset('images/user_img/'.$userImg['image']['url'])}}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        @else
                        <div class="thumb-lg member-thumb mx-auto"><img src="{{asset('images/default/user.jpg')}}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        </a>
                        @endif
                        @endforeach

                        <div class="">
                            <a href="{{ route('view.instructor',$instructor['user_id']) }}" style="cursor: pointer;">
                            <h4>{{$instructor['get_detail']['fname']. " ". $instructor['get_detail']['lname']}}</h4>
                            </a>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <?php
                                            $ratings_var = $instructor['rating']*10*2;
                                            ?>
                                            @if(true)
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var;?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                            @else
                                                <div class="pull-left">{{ __('frontstaticword.NoRating') }}</div>
                                            @endif
                                        <!-- overall rating-->
                    
                                        @if(true)
                                        <li>
                                            <b class="text-dark">{{ round($instructor['rating'], 1) }}</b>
                                        </li>
                                        @endif
                                        <li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            
                        </div>
                        <div class="best-seller">Populer</div>
            
                            @if(!empty($instructor['subjects']))
                            <div id="owl-demo" class="owl-carousel owl-theme row">

                            @foreach($instructor['subjects'] as $key => $subject)
                                <i class="fa fa-tag" aria-hidden="true">
                                    <div class="subject-list">{{$subject['name']}}</div>
                                </i>
                            @endforeach
                            </div>
                    
                            @endif        
                    
                        <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light"data-toggle="modal" data-target="#msgNow" data-whatever="{{$instructor['user_id']}}">Message Now</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h5>{{$instructor['district']['name']}}</h5>
                                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        @if($instructor['experiance_years']==2)
                                        <h5>Below 2 Years</h5>
                                        @elseif($instructor['experiance_years']==3)
                                        <h5>3 Years</h5>
                                        @elseif($instructor['experiance_years']==5)
                                        <h5>5 Years</h5>
                                        @elseif($instructor['experiance_years']==6)
                                        <h5>Above 5 Years</h5>
                                        @endif
                                        <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h5>{{$instructor['highest_qualification']}}</h5>
                                        <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="img-wishlist-instrctor">
                        <div class="protip-wishlist">
                            <ul>
                                @if(Auth::check())
                                    @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('instructor_id', $instructor['user_id'])->first();
                                    @endphp
                                    @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ route('wishlist.store') }}" data-parsley-validate 
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="instructor_id"  value="{{$instructor['id']}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                            </form>
                                        </li>
                                    @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('wishlist.destroy', $instructor['id']) }}" data-parsley-validate 
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="instructor_id"  value="{{$instructor['id']}}" />

                                                <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                            </form>
                                        </li>
                                    @endif 
                                @else
                                    <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
             </div>
            </div>
            @endforeach
            <div class="d-flex mx-auto">
            <a href="{{ route('front.instructors') }}" class="btn btn-primary" title="search"><b>{{ __('frontstaticword.FindMore') }}</b></a>
            </div>
            @endif      
    </div>
    </div>
</div>
    <!-- The Modal -->
    <div class="modal fade" id="msgNow">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Message</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <center><div id="msg_result" class="container-fluid"></div></center>
                  <form enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name" class="col-form-label">Your Name</label>
                    <input type="text" name="name" id="m-name" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="contact" class="col-form-label">Contact Number</label>
                    <input type="text" name="contact" id="m-contact" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="m-message" value=""></textarea>
                  </div>
                  <input type="text" hidden="true" class="instructor_id" value="">
                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <button type="button" id="appointBtn" class="btn btn-success">Send message</button>
        </div>
        
      </div>
    </div>
    </div>

<!-- testimonial start -->

<section>
    <div class="container">
    <div class="section-title">
     <h2>{{ strtoupper(__('frontstaticword.faq')) }}</h2>
    </div>
        
    </div>
</section>


<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowtestimonial')
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

@section('custom-script')
<script>
$(document).ready(function() {
 
  $(".owl-carousel").owlCarousel({
 
    navigation : false, // Show next and prev buttons
    items:1,
    itemsDesktop:[1000,1],
    itemsDesktopSmall:[979,1],
    itemsTablet:[768,1],
    pagination:false,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            loop:true,
            dots: false,
        },
        600:{
            items:1,
            nav:false,
            loop:true,
            dots: false,
        },
        1000:{
            items:1,
            nav:false,
            loop:true
        }
    }
 
  });
});



(function($) {
  "use strict";
    $(function() {
       $( "#home-tab" ).trigger( "click" );
    });
})(jQuery);

function showtab(id){
    $.ajax({
        type : 'GET',
        url  : '{{ url('/tabcontent') }}/'+id,
        dataType  : 'html',
        success : function(data){

            $('#tabShow').html('');
            $('#tabShow').append(data);
        }
    });
}

//bootstrap modal
$('#msgNow').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever') // Extract info from data-* attributes.
  console.log(id);
  var modal = $(this)
  modal.find('.modal-body .instructor_id').val(id);
  })

$('#appointBtn').click(function() {
    var instructor_id = $('.instructor_id').val();
    console.log(instructor_id);
    var name = $("#m-name").val();
    console.log(name);
    var contact = $("#m-contact").val();
    var message = $('#m-message').val();
    console.log(message);


    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:'POST',
    url:'',
    data:{name:name,contact:contact,message:message,instructor_id:instructor_id},
    success:function(data,textStatus) {
    
    var bc = "alert alert-success";
    alertMsg(bc,textStatus);
    },
    error: function (data, textStatus, errorThrown) {
    var bc = "alert alert-danger";
    alertMsg(bc,textStatus);
    console.log(data);
    },
    });
});

  //alert
function alertMsg(bclass,data){
//set bootstrap alert
$("#msg_result")
.html('<div class="'+bclass+'" style="padding:0;width:50%"><button type="button" class="close">×</button>'+(data)+'</div>');

//timing the alert box to close after 5 seconds
 window.setTimeout(function () {
     $(".alert").fadeTo(300, 0).slideUp(300, function () {
         $(this).remove();
     });
 }, 4000);
//Adding a click event to the 'x' button to close immediately
 $('.alert .close').on("click", function (e) {
     $(this).parent().fadeTo(300, 0).slideUp(300);
 });
}

//bootsrap accordion
$(function(){
$('.panel-heading').click(function(e) {
    $('.panel-heading').removeClass('tab-collapsed');
    var collapsCrnt = $(this).find('.collapse-controle').attr('aria-expanded');
    if (collapsCrnt != 'true') {
        $(this).addClass('tab-collapsed');
    }
});
}); 
</script>
@endsection
