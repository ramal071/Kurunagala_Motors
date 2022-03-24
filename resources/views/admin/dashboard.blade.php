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
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('adminstaticword.home') }}</a></li>
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
            <a href="" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              	@php
                  echo "0";
                @endphp
              </h3>
              <p>{{ __('adminstaticword.brand') }}</p>
            </div>
            <div class="icon">
            	<i class="flaticon-layout"></i>
            </div>
            <a href="{{url('brand')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              	@php
              		echo "0";
              	@endphp 
              </h3>
              <p>{{ __('adminstaticword.model') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-book"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              	@php
              			echo "0";
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.customer') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-shopping-cart-1"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
              	@php
                echo (0);
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.employee') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-faq"></i>
            </div>
            <a href="{{url('employee')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>
                @php
              	echo "0";
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.employee') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-report"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                @php
              			echo "0";
              	@endphp 
              </h3>
              <p>{{ __('adminstaticword.employee') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-teacher"></i>
            </div>
            <a href="" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
                @php
              			echo "0";
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.employee') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-customer-1"></i>
            </div>
            <a href="{{url('employee')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
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

@endif

@endsection

{{-- @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $usersChart->script() !!}
{!! $userEnrolled->script() !!}
{!! $pieChart->script() !!}

@endsection --}}