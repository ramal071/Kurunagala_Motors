@extends('theme.master')
@section('title', 'Home')
@section('content')


<!-- services start-->
<section class="section services-section" id="services">
    <div class="container">

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
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Services </h2>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-6">
                <div class="box-body">
                    <div class="table responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>                 
                                    <th>{{__('adminstaticword.code') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.price') }}</th>                       
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $service = App\Service::get();
                                @endphp

                                
                                <?php $i=0;?>
                                @foreach($service as $key)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $key->code }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->price }}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>

    @auth
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>MY DETAILS</h2>
                </div>
            </div>
        </div>
       
        <div class="row">
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <div class="feature-content">
                        <h5>My Register</h5>
                        <p>Your bike register details </p>
                    </div>
                    @if(Auth::check())         
                    <a href="{{url('customerVehicle-show/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Next Service</h5>
                        <p>Your bike next service details </p>
                    </div>
                    @if(Auth::check())         
                    <a href="{{url('customerPending-service/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Pending Payment</h5>
                
                    </div>
                    @if(Auth::check())         
                    <a href="{{url('customerPending-payment/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif
                </div>
            </div>
        </div>
    </br>

    @endauth      

    @auth

    <div class="row">
        <div class="col-lg-6">
            <div class="section-title">
                <h2>SERVICE-REPAIR</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <!-- feaure box -->
        <div class="col-sm-6 col-lg-4">
            <div class="feature-box-1">
                <div class="icon">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                </div>
                <div class="feature-content">
                    <h5>Service-Repair</h5> 
                    <p>Here, Your bike services </p>                  
                </div>
                @if(Auth::check())
                <a href="{{url('customerService-repair/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                @endif
            </div>
        </div>
   
        
        <!-- feaure box -->
        <div class="col-sm-6 col-lg-4">
            <div class="feature-box-1">
                <div class="icon">
                    <i class="fa fa-motorcycle" aria-hidden="true"></i>
                </div>
                <div class="feature-content">
                    <h5>USED PRODUCTS</h5>
                    <p>Here, you can view our bike models we services </p>
                </div>
                @if(Auth::check())
                <a href="{{url('customerService-stoct/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                @endif                    
            </div>
        </div>
  
        
        <!-- feaure box -->
        <div class="col-sm-6 col-lg-4">
            <div class="feature-box-1">
                <div class="icon">
                    <i class="fa fa-list-alt"></i>
                </div>
                <div class="feature-content">
                    <h5>SERVICE DONE</h5>
                    <p>Here, you can view our bike brands we services </p>
                </div>
                @if(Auth::check())
                <a href="{{url('completeJob/{id}')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                @endif
                
            </div>
        </div>
    </div>

    @endauth      
 
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>PRODUCTS</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>                                       
                        <th>{{__('adminstaticword.brand') }}</th>
                        <th>{{__('adminstaticword.bike') }}</th>
                        <th>{{__('adminstaticword.code') }}</th>
                        <th>{{__('adminstaticword.name') }}</th>
                        <th>{{__('adminstaticword.productimage') }}</th>     
                        <th>{{__('adminstaticword.status') }}</th>    
                    </tr>
                </thead>
                <tbody>                                
                    @foreach($product as $pr)
                    <tr>                                    
                        <td>{{ $pr->brand->name}}</td>
                        <td>{{ $pr->bike->name}}</td>
                        <td>{{ $pr->code }}</td>
                        <td>{{ $pr->name }}</td>
                        <td> <img src="{{ asset('storage/product/' .  $pr->product_image) }}" width="100px;" height="100px;" alt="Image"></td>
               
                        <td>                                    
                            <button type="Submit" class="btn btn-xs {{ $pr->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                @if ($pr->status ==1)
                            {{__('adminstaticword.active') }}         
                            @else
                            {{__('adminstaticword.deactive') }} 
                            @endif
                            </button>        
                        </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>


</div>


        </div>
       
        <div class="row">
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Product</h5>
                        <p>Here, you can view our products available </p>
                    </div>
                    @if(Auth::check())
                    <a href="{{url('customerproduct')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif
                </div>
            </div>
       
            
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Bike</h5>
                        <p>Here, you can view our bike models we services </p>
                    </div>
                    @if(Auth::check())         
                    <a href="{{url('customerbike')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif                   
                </div>
            </div>
      
            
            <!-- feaure box -->
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Brand</h5>
                        <p>Here, you can view our bike brands we services </p>
                    </div>
                    @if(Auth::check())
                    <a href="{{url('customerbrand')}}" class="small-box-footer">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{ route('login') }}">{{ __('adminstaticword.more') }} <i class="fa fa-arrow-circle-right"></i></a></li>
                    @endif
                    
                </div>
            </div>
        </div>

     </br>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>DETAILS</h2>
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
        </div>
        <br>  

       
         {{-- working hours --}}

         {{-- 
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
           --}}
         <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Working Hours</h2>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-6">
                <div class="box-body">
                    <div class="table responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>                 
                                    <th>{{__('adminstaticword.day') }}</th>
                                    <th>{{__('adminstaticword.from') }}</th>
                                    <th>{{__('adminstaticword.to') }}</th>                       
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $workinghour = App\Workinghour::get();
                                @endphp

                                
                                <?php $i=0;?>
                                @foreach($workinghour as $w)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $w->day }}</td>
                                    <td>{{ $w->from }}</td>
                                    <td>{{ $w->to }}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>


        {{--  --}}


        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Contact-Us</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <form class="contact-form" method="post" action="{{ route('contact.send') }}">
                @csrf                      
                    <div class="row">
                        <div class="col-md-6">
                            <input  name="name" type="text" class="form-control" id="name" placeholder="  Name">
                        </div>
                        </div>
                    <br>
    
                    <div class="row">
                        <div class="col-md-6">
                            <input name="email" type="email" class="form-control" id="email" placeholder="  Email">
                        </div>
                        </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="  phone">
                        </div>
                        </div>
                    <br>
    
                    <div class="row">
                        <div class="col-md-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7" placeholder="  Message"></textarea>
                        </div>
                        </div>
                    <br>
                    
                </div>
    
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <div class="text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                    </div>
                </div>
            </form>
      <br>


        {{--  --}}

        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>SERVICE-REPAIR</h2>
                </div>
            </div>
        </div>



{{--  canvas js line chart--}}
<div class="col-lg-6">
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
        // array("y" => $usersCount[7], "label" => $months[7]),
        // array("y" => $usersCount[6], "label" => $months[6]),
        // array("y" => $usersCount[5], "label" => $months[5]),
        // array("y" => $usersCount[4], "label" => $months[4]),
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
                text: "Monthly Service-Repair"
            },
            axisY: {
                title: "Number of Service-Repair"
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




       <div style="height: 400px;width:900px; margin:auto;">
        <canvas id="barChart"></canvas>
       </div>


    </section>
    @endsection
    //    @section('barchart')     
    //    <script>
    //         $(function(){
    //             var datas = document.getElementById($datas); 
    //             var barCanvas = $("#barChart");
    //             var barChart = new Chart(barCanvas, {
    //                 type:'bar',
    //                 data: {
    //                     labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' ,'Jul', 'Aug', 'Sep', 'Sep', 'Oct', 'Nov', 'Dec'],
    //                     datasets:[
    //                         {
    //                             label:'New services',
    //                             data:datas,
    //                             backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'pink'],
    //                         }
    //                     ]
    //                 },
    //                 options:{
    //                     scales:{
    //                         yAxes:[{
    //                             ticks:{
    //                                 beginAtZero:true
    //                             }
    //                         }]
    //                     }
    //                 }
    //             })
    //         });
    //     </script>

       
    // </div>
 


