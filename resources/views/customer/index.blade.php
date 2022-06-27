@extends('theme.master')
@section('title', 'Bike Profile')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.userbikeregister')) }}</h1>
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
                                    <th>{{__('adminstaticword.email') }}</th>
                                    <th>{{__('adminstaticword.contact') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>      
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($customervehicle as $b)
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->fname}} {{ $b->users->lname}}</td>
                                    <td>{{ $b->users->email}}</td>
                                    <td>{{ $b->users->contact}}</td>
                                    <td>{{ $b->register_number }}</td>
                                    <td>{{ $b->brand->name}}</td>
                                    <td>{{ $b->bike->name}}</td>       
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