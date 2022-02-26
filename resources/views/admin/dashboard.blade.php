@extends('admin.layouts.master')
@section('title', 'Dashboard - Admin')
@section('body')

@if(Auth()->User()->role == "admin")


<section class="content-header">
  <h1>
    {{ __('adminstaticword.Dashboard') }}
    <small>{{ $project_title }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('adminstaticword.Home') }}</a></li>
    <li class="active">{{ __('adminstaticword.Dashboard') }}</li>
  </ol>
</section>

<section class="content">
	<!-- Main row -->
    {{-- @include('sweetalert::alert') --}}
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              	@php
              		$user = App\User::get();
              		if(count($user)>0){

              			echo count($user);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.Users') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-user"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              	{{-- @php
              		$cat = App\Category::all();
              		if(count($cat)>0){

              			echo count($cat);
              		}
              		else{

              			echo "0";
              		}
              	@endphp --}}
              </h3>
              <p>{{ __('adminstaticword.Categories') }}</p>
            </div>
            <div class="icon">
            	<i class="flaticon-layout"></i>
            </div>
            <a href="{{url('category')}}" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              	{{-- @php
              		$course = App\Subject::all();
              		if(count($course)>0){

              			echo count($course);
              		}
              		else{

              			echo "0";
              		}
              	@endphp --}}
              </h3>
              <p>{{ __('adminstaticword.SubCategory') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-book"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              	@php
              		//$page = App\Order::all();
                  $page = [];
              		if(count($page)>0){

              			echo count($page);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.ChildCategory') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-shopping-cart-1"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
              	@php
              		//$faq = App\FaqStudent::all();
                  $faq = [];
              		if(count($faq)>0){

              			echo count($faq);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.Faqs') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-faq"></i>
            </div>
            <a href="{{url('faq')}}" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>@php
              		//$review = App\Page::all();
                  $review = [];
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.InstructorRequest') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-report"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                {{-- @php
              		$review = App\Instructor::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp --}}
              </h3>
              <p>{{ __('adminstaticword.Instructors') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-teacher"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
                {{-- @php
              		$review = App\Testimonial::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	@endphp --}}
              </h3>
              <p>{{ __('adminstaticword.Testimonials') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-customer-1"></i>
            </div>
            <a href="{{url('testimonial')}}" class="small-box-footer">{{ __('adminstaticword.Moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->



    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-body">
            {{-- {!! $usersChart->container() !!} --}}
          </div>
        </div>
      </div>
    </div>

    

    <div class="row">
      <div class="col-md-8">
        <div class="box box-solid">
          <div class="box-body">
            {{-- {!! $userEnrolled->container() !!} --}}
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box box-solid">
          <div class="box-body">
            {{-- {!! $pieChart->container() !!} --}}
          </div>
        </div>
      </div>
    </div>

  

	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
    <div class="col-md-4">
      <!-- USERS LIST -->
      <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.LatestUsers') }}</h3>

            <div class="box-tools pull-right">
              <span class="label label-danger">
                @php
                    $user = App\User::get();
                    if(count($user)>0){

                      echo count($user);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
                {{ __('adminstaticword.Users') }}
            </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            @php
              $users = App\User::limit(8)->orderBy('id', 'DESC')->get();
            @endphp
            <ul class="users-list clearfix">
              @foreach($users as $user)
              <li>
                @if($user['user_img'] != null || $user['user_img'] !='')
                  <img src="{{ asset('/images/user_img/'.$user['user_img']) }}" class="img-fluid" alt="User Image">
                @else
                  <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid" alt="User Image">
                @endif
                <a class="users-list-name" href="#">{{ $user['fname'] }} {{ $user['lname'] }}</a>
                <span class="users-list-date">{{ date('F Y', strtotime($user['created_at'])) }}</span>
              </li>
              @endforeach
              
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="" class="uppercase">{{ __('adminstaticword.ViewAll') }}</a>
          </div>
          <!-- /.box-footer -->
      </div>
      <!--/.box -->

        <!-- PRODUCT LIST -->

      {{-- @php
        $courses = App\Subject::limit(5)->orderBy('id', 'DESC')->get()
      @endphp --}}

      {{-- @if($courses->isEmpty())
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.RecentCourses') }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
       
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              
              @foreach($courses as $course)
              <li class="item">
                <div class="product-img">
                  @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                   
                  @else
                    <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="Course Image">
                  @endif

                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">{{ str_limit($course['title'], $limit = 25, $end = '...') }}
                  <span class="label label-warning pull-right">
                    @if( $course->type == 1)
                     
                      @if($course->discount_price == !NULL)
                        @if($gsetting['currency_swipe'] == 1)
                          <i class="{{ $currency['icon'] }}"></i>{{ $course['discount_price'] }}
                        @else
                          {{ $course['discount_price'] }}<i class="{{ $currency['icon'] }}"></i>
                        @endif
                      @else
                        @if($gsetting['currency_swipe'] == 1)
                          <i class="{{ $currency['icon'] }}"></i>{{ $course['price'] }}
                        @else
                          {{ $course['price'] }}<i class="{{ $currency['icon'] }}"></i>
                        @endif
                      @endif
                    @else
                      {{ __('adminstaticword.Free') }}
                    @endif
                </span></a>
                 
                  <span class="product-description">
                      {{ str_limit($course->short_detail, $limit = 40, $end = '...') }}
                  </span>
                </div>
              </li>
              @endforeach
            </ul> 
          </div>
         
          <div class="box-footer text-center">
            <a href="{{url('course')}}" class="uppercase">{{ __('adminstaticword.ViewAll') }}</a>
          </div>
         
      </div>
      @endif
     
    </div>
   
		<div class="col-md-8">
		 
      @php
        //$orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();

        // $orders = App\Subject::limit(7)->orderBy('id', 'DESC')->get(); 2022/2/12
      @endphp
      @if( $orders->isEmpty() )
			<div class="box box-info">
			    <div class="box-header with-border">
			      <h3 class="box-title">{{ __('adminstaticword.LatestOrders') }}</h3>

			      <div class="box-tools pull-right">
			        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			        </button>
			        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			      </div>
			    </div>
			    
			    <div class="box-body">
			      <div class="table-responsive">
			        <table class="table no-margin">
			          <thead>
			          <tr>
			            <th>{{ __('adminstaticword.User') }}</th>
			            <th>{{ __('adminstaticword.Course') }}</th>
			            <th>{{ __('adminstaticword.Amount') }}</th>
			            <th>{{ __('adminstaticword.Date') }}</th>
                  <th>{{ __('adminstaticword.Invoice') }}</th>
			          </tr>
			          </thead>
			          <tbody>
                  @php
                    $orders = App\Order::limit(7)->orderBy('id', 'DESC')->get();
                  @endphp

                  --}}
                  {{-- @foreach($orders as $order)
    			          <tr>
    			            <td><a href="#">@if(isset($order->user)){{ $order->user['fname'] }}@endif</a></td>
    			            <td>
                         @if($order->course_id != NULL)
                          {{ $order->courses['title'] }}
                        @else 
                          {{ $order->bundle['title'] }}
                        @endif 
                      </td>
    			            <td>
                        @if($order->coupon_discount == !NULL)
                          @if($gsetting['currency_swipe'] == 1)
                            <span class="label label-success"><i class="fa {{ $order['currency_icon'] }}"></i> {{ $order['total_amount'] - $order['coupon_discount'] }}</span>
                          @else
                            <span class="label label-success">{{ $order['total_amount'] - $order['coupon_discount'] }}<i class="fa {{ $order['currency_icon'] }}"></i> </span>
                          @endif
                        @else
                          @if($gsetting['currency_swipe'] == 1)
                            <span class="label label-success"><i class="fa {{ $order['currency_icon'] }}"></i> </span>
                          @else
                            <span class="label label-success">{{ $order['total_amount'] }}<i class="fa {{ $order['currency_icon'] }}"></i> </span>
                          @endif
                        @endif
                      </td>
    			            <td>
    			              <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('jS F Y', strtotime($order['created_at'])) }}</div>
    			            </td>
                      <td><a href="{{route('view.order',$order['id'])}}">{{ __('adminstaticword.Invoice') }}</a></td>
    			          </tr>
                  @endforeach --}}
			          </tbody>
			        </table>
			      </div>
			      <!-- /.table-responsive -->
			    </div>
			    <!-- /.box-body -->
			    <div class="box-footer clearfix">
			      <a href="{{url('order')}}" class="btn btn-sm btn-default btn-flat pull-right">{{ __('adminstaticword.ViewAllOrders') }}</a>
			    </div>
			    <!-- /.box-footer -->
			</div>
      {{-- @endif --}}

			<!-- /.box -->

      <!-- Instructor box -->
      {{-- @php
        $instructors = App\Instructor::select('id','user_id')->with('getDetail:id,fname,lname')
                      ->where('is_approve',false)->limit(3)->orderBy('id', 'DESC')->get();
      @endphp --}}
      {{-- @if( !$instructors->isEmpty() )
      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-user-plus"></i>

          <h3 class="box-title">{{ __('adminstaticword.InstructorRequest') }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          
          @foreach($instructors as $instructor)
          @php
          $profile = App\User::select('id')->with('image')->where('id',$instructor['user_id'])->get()->toArray();                                         
          @endphp

            <div class="item">
              @if(!empty($profile[0]['image']))
              <img src="{{ asset('images/user_img/'.$profile[0]['image']['url'])}}" alt="user image" class="online">
              @else
              <img src="{{ asset('images/default/user.jpg') }}" alt="user image" class="online">
              @endif

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-calendar-check-o"></i>&nbsp;{{ date('jS F Y', strtotime($instructor['created_at'])) }}</small>
                  {{ $instructor['fname'] }}&nbsp;{{ $instructor['lname'] }}
                </a>
                {{ str_limit($instructor['detail'], $limit = 160, $end = '...') }}
              </p>
              <div class="attachment">
                <h4>{{ __('adminstaticword.Resume') }}:</h4>
                <p class="filename">
                  <a href="{{ asset('files/instructor/'.$instructor['file']) }}" download="{{$instructor['file']}}">{{ __('adminstaticword.Download') }} <i class="fa fa-download"></i></a>
                </p>

                <div class="pull-right">
                  <button type="button" onclick="window.location.href = '{{route('instructor-request.edit',$instructor['id'])}}';" class="btn btn-primary btn-sm btn-flat">{{ __('adminstaticword.ViewDetails') }}</button>
                </div>
              </div>
              <!-- /.attachment -->
            </div>
          @endforeach
          <!-- /.item -->
        </div>
        <!-- /.chat -->
        <div class="box-footer text-center">
          <a href="" class="btn btn-sm bg-navy btn-flat pull-left">{{ __('adminstaticword.AllInstructor') }}</a>
          <a href="" class="btn btn-sm btn-default btn-flat pull-right">{{ __('adminstaticword.ViewAllInstructor') }}</a>
        </div>
      </div>
      @endif --}}
      <!-- /.box (Instructor box) -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>

@endif

@endsection

{{-- @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $usersChart->script() !!}
{!! $userEnrolled->script() !!}
{!! $pieChart->script() !!}

@endsection --}}