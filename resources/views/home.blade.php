@extends('theme.master')
@section('title', 'Home')
@section('content')


<!-- services start-->
<section class="section services-section">
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                
                <div class="carousel-item">
                    <img src="https://www.dirtbikeplanet.com/wp-content/uploads/2017/07/Changing-4-Stroke-Dirt-Bike-Oil-Large.jpg" width="100px;" height="500px;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item active">
                    <img src="https://cdni.autocarindia.com/Utils/ImageResizer.ashx?n=http%3A%2F%2Fcdni.autocarindia.com%2FFeatures%2F3---Spraying-Water-copy.jpg&c=0" width="100px;" height="500px;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/0a/6a/90/0a6a90bd65bd978fda05aea353e7502b--motorcycle-shop-motorcycle-garage.jpg" width="100px;" height="500px;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://4.imimg.com/data4/ET/SK/MY-12606593/bike-washing-service-500x500.jpg" width="100px;" height="500px;" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>

         <div class="row">
            <div class="col-md-6">
               <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start">
                     <strong class="d-inline-block mb-2 text-primary">Brand</strong>
                     <h6 class="mb-0">
                        <a class="text-dark" href="#">Motor bike brands available</a>
                     </h6>
                     <div class="mb-1 text-muted small">Nov 12</div>
                     <p class="card-text mb-auto">Here, you can see the motor bike brands we repair. </p>
                     <a class="btn btn-outline-primary btn-sm" role="button" href="{{url('customerbrand')}}">{{ __('adminstaticword.viewallbrand') }}</a>
                  </div>
                  <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7l45tHgFDu2CU9Cg8KpqHo7ztUGjulJWY97l6oaTQSKsZVub409L2lC6oMkecGYBpWlU&usqp=CAU" style="width: 200px; height: 250px;">
               </div>
            </div>
            <div class="col-md-6">
               <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start">
                     <strong class="d-inline-block mb-2 text-success">Product</strong>
                     <h6 class="mb-0">
                        <a class="text-dark" href="#">Spare parts available for all motor bike</a>
                     </h6>
                     <div class="mb-1 text-muted small">Nov 11</div>
                     <p class="card-text mb-auto">Here, you can view our products available </p>
                     <a class="btn btn-outline-success btn-sm" href="{{url('customerproduct')}}">{{ __('adminstaticword.viewallsparepart') }}</a>
                  </div>
                  <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="https://5.imimg.com/data5/CX/TB/MY-73743/tvs-bike-spare-parts-500x500.jpg" style="width: 200px; height: 250px;">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-6">
               <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start">
                     <strong class="d-inline-block mb-2 text-secondary">Model</strong>
                     <h6 class="mb-0">
                        <a class="text-dark" href="#">Motor bike model available</a>
                     </h6>
                     <div class="mb-1 text-muted small">Nov 12</div>
                     <p class="card-text mb-auto">Here, you can see the motor bike model we repair. </p>
                     <a class="btn btn-outline-secondary btn-sm" role="button" href="{{url('customerbike')}}">{{ __('adminstaticword.viewallbike') }}</a>
                  </div>
                  <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="https://img1.cgtrader.com/items/1005123/f3512f3806/large/motorcycle-3d-models-collection-3d-model.jpg" style="width: 200px; height: 250px;">
               </div>
            </div>
            <div class="col-md-6">
               <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start">
                     <strong class="d-inline-block mb-2 text-danger">Service</strong>
                     <h6 class="mb-0">
                        <a class="text-dark" href="#">Services available for all motor bike</a>
                     </h6>
                     <div class="mb-1 text-muted small">Nov 11</div>
                     <p class="card-text mb-auto">We are honda authorized dealer </p>
                     <a class="btn btn-outline-danger btn-sm" href="{{url('customerservice')}}">Continue reading</a>
                  </div>
                  <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="https://5.imimg.com/data5/QN/HC/NK/SELLER-103746547/doorstep-bike-service-500x500.jpg" style="width: 200px; height: 250px;">
               </div>
            </div>
         </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="section-title" id="services">
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
            
            <table id="example1" class="table table-bordered table-striped">
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
            <a class="btn btn-outline-success btn-sm" href="{{url('customerproduct')}}">{{ __('adminstaticword.viewallsparepart') }}</a>
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
            <form class="contact-form" method="post" action="{{ route('contact.send') }}" id="contact">
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
        <div class="col-lg-12">
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


    </section>
    @endsection
 

