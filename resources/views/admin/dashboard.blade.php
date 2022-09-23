@extends('admin.layouts.master')
@section('title', 'Dashboard') 
@section('body')

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
          <!-- small box user-->
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
                  $servicerepair = App\ServiceRepair::get();
                  if(count($servicerepair)>0){
                    echo count($servicerepair);
                  }
                  else
                  {
                    echo "0";
                  }
              @endphp
              </h3>
              <p>{{ __('adminstaticword.servicerepair') }}</p>
            </div>
            <div class="icon">
            	<i class="flaticon-tools"></i>
            </div>
            <a href="{{url('servicerepair')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
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

    
         <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-maroon">
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
          <div class="small-box bg-lime">
            <div class="inner">
              <h3>
              @php
              $stock = App\Stock::get();
              if(count($stock)>0){
                echo count($stock);
              }
              else
              {
                echo "0";
              }
          @endphp
              </h3>
              <p>{{ __('adminstaticword.stock') }}</p>
            </div>
            <div class="icon">
              <i class="flaticon-book"></i>
            </div>
            <a href="{{url('stock')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{url('customervehicle')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
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
              <i class="flaticon-customer-1"></i>
            </div>
            <a href="{{url('employee')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>
                @php
                $contacts = App\contact::get();
                if(count($contacts)>0){
                  echo count($contacts);
                }
                else
                {
                  echo "0";
                }
                @endphp
              </h3>
              <p>+ {{ __('adminstaticword.contact') }}</p>
            </div>
            <div class="icon">
             <i class="flaticon-faq"></i>
            </div>
            <a href="{{ url('contact') }}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    
  

    <!-- user table -->
    <div class="row">
      <div class="col-md-4">
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
          </div>
          <div class="box-footer text-center">
            <a href="{{route('users.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
          </div>     
      </div>
    </div>

  
{{--  canvas js line chart--}}
    <div class="col-md-8">
      <div class="box box-danger">
        <div class="box-header with-border">
            
          <?php
          $months = array();
          $count = 0;
          while ($count <= 3) {
              $months[] = date('M Y', strtotime("-".$count." month"));
          $count++;
          }

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
                  text: "User Register"
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

          <div id="chartContainer" style="height: 370px; width: 80%;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        </div>
      </div>
    </div>
  </div>

  {{-- employee monthly details --}}

@if(Auth::User()->roles->slug == "manager")
<div class="row">
      <div class="col-md-8">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Employee Monthly Performance</h3>
          </div>

          <div class="box-body no-padding">
                  <div class="col-md-6">
                      <label for="">Month</label>
                      <input type="date" id="calender" class="form-control" value="" required>
                  </div>
                
                  <div class="col-md-6">
                      <label for="total_salary">{{ __('adminstaticword.total_salary') }}:<sup class="redstar">*</sup></label>
                      <input type="number" class="form-control" name="total_salary" id="total_salary" readonly value="">
                  </div>  
        
                  <div class="col-md-6">
                      <label for="employee">{{ __('adminstaticword.employee') }} {{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                      <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" required>
                          <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                          @foreach($employee as $employee)
                          <option value="{{$employee->id}}">{{$employee->name}}</option>
                          @endforeach
                      </select>
                    </div>  
            
                  <div class="col-md-6">
                    <label for="attendance">{{ __('adminstaticword.attendance') }}</label>
                    <input type="text" class="form-control" name="workdays" id="upload_id" readonly> 
                  </div>           
                  <br>  

                  <div class="col-md-6">
                      <label for="half_days">{{ __('adminstaticword.half_days') }}:<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="half_days" id="half_days" readonly value="">
                  </div> 
                  
                  <div class="col-md-6">
                      <label for="full_leave">{{ __('adminstaticword.full_leave') }}:<sup class="redstar">*</sup></label>
                      <input type="number" class="form-control" name="full_leave" id="full_leave" readonly value="">
                  </div>  

                  <div class="col-md-6">
                      <label for="job">{{ __('adminstaticword.job_amount') }} :<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="job_amount" id="servicerepair_id" value="" readonly>
                  </div>  

                  <div class="col-md-6">
                      <label for="loan_amount">{{ __('adminstaticword.loan_amount') }}:<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="loan_amount" id="loan_amount" value="" readonly>
                  </div>  
                  <div class="col-md-6">
                      <label for="allowance">{{ __('adminstaticword.allowance') }}:<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="allowance" id="allowance" readonly value="">
                  </div> 
                  

            </div>
              <div class="box-footer text-center">
                <a href="{{route('salary.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
              </div> 
            </div>
        </div>


<div class="col-md-4">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.product') }}</h3>

            <div class="box-tools pull-right">
              <span class="label label-danger">
                @php
                    $product = App\Product::get();
                    if(count($product)>0){

                      echo count($product);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
                {{ __('adminstaticword.product') }}
            </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>

          <div class="box-body no-padding">
            @php
              $product = App\product::limit(6)->orderBy('id', 'DESC')->get();
            @endphp
           
           <div class="box-body">
                    <div class="table responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>                                        
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.bike') }}</th>
                                    <th>{{__('adminstaticword.code') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.slug') }}</th>                                       
                                 
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($product as $pr)
                                 
                                <tr>
                            
                                    <td>{{ $pr->brand->name}}</td>
                                    <td>{{ $pr->bike->name}}</td>
                                    <td>{{ $pr->code }}</td>
                                    <td>{{ $pr->name }}</td>
                                    <td>{{ $pr->slug }}</td>
                              </tr>
                                @endforeach
                            </tbody>
                        </table></div>
          </div>
          <div class="box-footer text-center">
            <a href="{{route('product.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
          </div> 
        </div>
      </div>
</div></div>
@endif
                        

    <div class="row">
      <div class="col-md-4">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.servicerepair') }}</h3>

            <div class="box-tools pull-right">
              <span class="label label-danger">
                @php
                    $servicerepair = App\servicerepair::get();
                    if(count($servicerepair)>0){

                      echo count($servicerepair);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
                {{ __('adminstaticword.servicerepair') }}
            </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>

          <div class="box-body no-padding">
            @php
              $servicerepair = App\servicerepair::limit(8)->orderBy('id', 'DESC')->get();
            @endphp
            <ul class="users-list clearfix">
              @foreach($servicerepair as $sr)
              <li>
                  
                  <a class="users-list-name" href="#">{{ $sr['code'] }} {{ $sr['fname'] }}</a>
                  <span class="users-list-date">{{ ($sr['customervehicle'] ['register_number']) }}</span>
                  <span class="users-list-date">{{ ($sr['service'] ['name']) }}</span>
                  <span class="users-list-date">{{ date('d F', strtotime($sr['created_at'])) }}</span>
              </li>
              @endforeach
              
            </ul>
          </div>
          <div class="box-footer text-center">
            <a href="{{route('servicerepair.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
          </div> 

          </div>
          </div>
  


          @if(Auth::User()->roles->slug == "manager")
          <div class="col-md-4">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">{{ __('adminstaticword.leave') }}</h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger">
                    @php
                        $leaves = App\leave::get();
                        if(count($leaves)>0){

                          echo count($leaves);
                        }
                        else{

                          echo "0";
                        }
                      @endphp
                    {{ __('adminstaticword.leave') }}
                </span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="box-body no-padding">
                @php
                  $leaves = App\leave::limit(8)->orderBy('id', 'DESC')->get();
                @endphp
                <ul class="users-list clearfix">
                  @foreach($leaves as $lev)
                  <li>
                      <a class="users-list-name" href="#">{{ $lev['employee'] ['nick_name'] }}</a>
                      <span class="users-list-date">{{ date('d F', strtotime($lev['from_date'])) }}</span>
                      <span class="users-list-date">{{ date('d F', strtotime($lev['to_date'])) }}</span>
                      <span class="users-list-date">{{ ($lev ['day']) }}</span>
                      <span class="users-list-date">{{ ($lev ['leave_reason']) }}</span>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <div class="box-footer text-center">
                <a href="{{route('leave.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
              </div> 
            </div>
          </div>
          @endif


          <div class="col-md-4">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.pendingservice') }}</h3>

            <div class="box-tools pull-right">
              <span class="label label-danger">
                @php
                    $customerpendingservice = App\customerpendingservice::get();
                    if(count($customerpendingservice)>0){

                      echo count($customerpendingservice);
                    }
                    else{

                      echo "0";
                    }
                  @endphp
                {{ __('adminstaticword.pendingservice') }}
            </span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>

          <div class="box-body no-padding">
            @php
              $customerpendingservice = App\customerpendingservice::limit(8)->orderBy('id', 'DESC')->get();
            @endphp
            <ul class="users-list clearfix">
              @foreach($customerpendingservice as $b)
              <li>
                <a class="users-list-name" href="#">{{($b['users'] ['fname'])}}</a>
                  <span class="users-list-date">{{ ($b['customervehicle'] ['register_number']) }}</span>
                  <span class="users-list-date">{{$b['service'] ['name'] }}</span>
                  <span class="users-list-date">{{ date('d F', strtotime($b['next_date'])) }}</span>
              </li>
              @endforeach
              
            </ul>
          </div>
          <div class="box-footer text-center">
            <a href="{{route('customerpendingservice.index')}}" class="uppercase">{{ __('adminstaticword.more') }}</a>
          </div> 

          </div>
          </div>
      </div>


    </div>
</section>

@endsection



@section('salary')
<script>
  (function($) {
      "use strict";

      $(function() {
          var urlLike = '{{ route('salary-dropdown') }}';
          $('#employee_id').change(function() {
              var up = $('#upload_id').empty();
              var pr_ids = $(this).val();
              let prev_month = $('#calender').val();
              if (pr_ids) {
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type: "GET",
                      url: urlLike,
                      data: {
                          prIds: pr_ids,prev_month:prev_month
                      },
                      success: function(data) {
                        console.log(data);
                         $('#upload_id').val(data['days']);
                         $('#total_salary').val(data['basic']);
                         $('#servicerepair_id').val(data['job_amount']);
                         $('#loan_amount').val(data['loan_amount']);
                         $('#half_days').val(data['halfday']);
                         $('#full_leave').val(data['full_leave']);  
                         $('#allowance').val(data['allowance']);
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                          console.log(XMLHttpRequest);
                      }
                  });
              }
          });
      });

  })(jQuery);
</script>

@endsection
 