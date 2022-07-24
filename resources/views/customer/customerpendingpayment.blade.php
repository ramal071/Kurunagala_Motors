@extends('theme.master')
@section('title', 'Bike Pending Payment')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.pendingpayment')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-40 col-lg-35">
                <div class="profile-info-block">
                    <div class="row">
    
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>                                 
                                    <th>{{__('adminstaticword.pendingpayment') }}</th>  
                                    <th>{{__('adminstaticword.reminderdate') }}</th>                    
                                   
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($customerpendingpayment as $b)
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                {{-- <td>{{ $b->users->idno}}</td> --}}
                                {{-- <td>{{ $b->users->fname}} {{ $b->users->lname}}</td> --}}
                                <td>{{ $b->customervehicle->register_number }}</td>
                                <td>{{ $b->customervehicle->brand->name}}</td>
                                <td>{{ $b->customervehicle->bike->name}}</td>
                                <td>{{ $b->service->name}}</td>
                                <td>{{ $b->reminder_date }}</td>
                                </tr>                        
                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection