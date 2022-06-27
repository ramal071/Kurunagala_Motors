@extends('admin.layouts.master')
@section('title', 'Dashboard') 
@section('body')

{{-- @if(Auth()->User()->role == "admin") --}}


<section class="content-header">
  <h1>
    {{ __('adminstaticword.dashboard') }}
    <small>{{ $project_title }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('adminstaticword.home') }}</a></li>
    <li class="active">{{ __('adminstaticword.dashboard') }}</li>
  </ol>
</section>

<section class="content">
	<!-- Main row -->
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
              		else
                  {
              			echo "0";
              		}
              	@endphp
              </h3>
              <p>{{ __('adminstaticword.users') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-user"></i>
            </div>
            <a href="{{url('users')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              @php
                  $brand = App\brand::get();
                  if(count($brand)>0){
                    echo count($brand);
                  }
                  else
                  {
                    echo "0";
                  }
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
              $bike = App\Bike::get();
              if(count($bike)>0){
                echo count($bike);
              }
              else
              {
                echo "0";
              }
          @endphp
              </h3>
              <p>{{ __('adminstaticword.model') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-book"></i>
            </div>
            <a href="{{url('bike')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              @php
              $product = App\product::get();
              if(count($product)>0){
                echo count($product);
              }
              else
              {
                echo "0";
              }
          @endphp
              </h3>
              <p>{{ __('adminstaticword.product') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-book"></i>
            </div>
            <a href="{{url('product')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              @php
                $customervehicle=App\customervehicle::get();
                if (count($customervehicle)>0) {
                  echo count($customervehicle);
                }
                else {
                  echo "0";
                }
              @endphp
              </h3>
              <p>{{ __('adminstaticword.bikeregister') }}</p>
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
                $employee = App\employee::get();
                if(count($employee)>0){
                  echo count($employee);
                }
                else
                {
                  echo "0";
                }
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
              20
              </h3>
              <p>{{ __('adminstaticword.income') }}</p>
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
                10
              </h3>
              <p>{{ __('adminstaticword.profit') }}</p>
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
                $servicerepair = App\servicerepair::get();
                if(count($servicerepair)>0){
                  echo count($servicerepair);
                }
                else
                {
                  echo "0";
                }
                @endphp
              </h3>
              <p>+ {{ __('adminstaticword.servicerepair') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-customer-1"></i>
            </div>
            <a href="{{ url('servicerepair') }}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('adminstaticword.latestusers') }}</h3>

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
            {{ __('adminstaticword.users') }}
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
              <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid" alt="User Image">       
              <a class="users-list-name" href="#">{{ $user['fname'] }} {{ $user['lname'] }}</a>
              <span class="users-list-date">{{ date('F Y', strtotime($user['created_at'])) }}</span>
          </li>
          @endforeach
          
        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="{{route('users.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
      </div>
      <!-- /.box-footer -->
  </div>


  
{{--  canvas js line chart--}}
<?php
//  echo $current_month = date('M Y', strtotime("-0 month"));
// echo"<pre>"; print_r($usersCount); die;

    $months = array();
    $count = 0;
    while ($count <= 3) {
        $months[] = date('M Y', strtotime("-".$count." month"));
    $count++;
    }
   // echo"<pre>"; print_r($months); die;    

$dataPoints = array(
	array("y" => $usersCount[3], "label" => $months[3]),
    array("y" => $usersCount[2], "label" => $months[2]),
    array("y" => $usersCount[1], "label" => $months[1]),
    array("y" => $usersCount[0], "label" => $months[0]),
	
);
 
?>

<script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Users Join"
        },
        axisY: {
            title: "Number of Users"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
     
    }
    </script>
    // <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

{{--  --}}

  

@endsection

