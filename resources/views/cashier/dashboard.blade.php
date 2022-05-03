@extends('admin.layouts.master')
@section('title', 'Dashboard - Cashier')
@section('body')

@if(Auth::User()->role == "cashier")

<section class="content-header">
  <h1>
    {{ __('adminstaticword.dashboard') }}
    <small>{{ __('adminstaticword.Cashier') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('adminstaticword.home') }}</a></li>
    <li class="active">{{ __('adminstaticword.dashboard') }}</li>
  </ol>
</section>

<section class="content">
	<!-- Main row -->
  <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
       0
            <p>{{ __('adminstaticword.ServiceBills') }}</p>
          </div>
          <div class="icon">
            <i class="flaticon-book"></i>
          </div>
          <a href="" class="small-box-footer"> {{ __('adminstaticword.more') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
         0
            <p> {{ __('adminstaticword.customer') }} </p>
          </div>
          <div class="icon">
          	<i class="flaticon-followers"></i>
          </div>
          <a href="" class="small-box-footer"> {{ __('adminstaticword.more') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          0
            <p> {{ __('adminstaticword.stock') }} </p>
          </div>
          <div class="icon">
            <i class="flaticon-questions"></i>
          </div>
          <a href="" class="small-box-footer"> {{ __('adminstaticword.more') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            0
            <p> {{ __('adminstaticword.brand') }} </p>
          </div>
          <div class="icon">
            <i class="flaticon-online-business"></i>
          </div>
          <a href="" class="small-box-footer"> {{ __('adminstaticword.more') }}<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
  </div>
  <!-- /.row -->
</section>
<section>
  <div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Orders</h5>
     
            </div>
            <div class="ibox-content">
              
                  
                </div>
                    <ul class="stat-list">
                        <li>
                            <h2 class="no-margins">2,346</h2>
                            <small>Total orders in period</small>
                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 48%;" class="progress-bar"></div>
                            </div>
                        </li>
                        <li>
                            <h2 class="no-margins ">4,422</h2>
                            <small>Orders in last month</small>
                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 60%;" class="progress-bar"></div>
                            </div>
                        </li>
                        <li>
                            <h2 class="no-margins ">9,180</h2>
                            <small>Monthly income from orders</small>
                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: 22%;" class="progress-bar"></div>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
             

            </div>
        </div>
    </div>

	
</section>

@endif

@endsection
