@extends('theme.master')
@section('title', 'Home')
@section('content')


<!-- services start-->
<section class="section services-section" id="services">
    <div class="container">

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

        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>SERVICE-REPAIR</h2>
                </div>
            </div>
        </div>
       <div style="height: 400px;width:900px; margin:auto;">
        <canvas id="barChart"></canvas>
       </div>


    </section>
  
       @section('barchart')     
       <script>
            $(function(){
                var datas = document.getElementById($datas); 
                var barCanvas = $("#barChart");
                var barChart = new Chart(barCanvas, {
                    type:'bar',
                    data: {
                        labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' ,'Jul', 'Aug', 'Sep', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets:[
                            {
                                label:'New services',
                                data:datas,
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'pink'],
                            }
                        ]
                    },
                    options:{
                        scales:{
                            yAxes:[{
                                ticks:{
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                })
            });
        </script>

       
    </div>


@endsection 
@endsection