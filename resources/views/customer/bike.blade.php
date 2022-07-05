@extends('theme.master')
@section('title', 'Bike')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('adminstaticword.bike')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="profile-info-block">
                    <div class="row">

                        <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('adminstaticword.brand') }}</th>
                                <th>{{ __('adminstaticword.code') }}</th>
                                <th>{{ __('adminstaticword.name') }}</th>
                                <th>{{__('adminstaticword.slug') }}</th>
                                <th>{{ __('adminstaticword.description') }}</th>
                   
                                </tr>
                            </thead>
                
                            <tbody>
                                <?php $i=0;?>
                                @foreach($bike as $b)
                                <?php $i++;?>
                                <tr>
                                <td><?php echo $i;?></td>
                                        <td>{{ $b->brand->name}}</td>
                                        <td>{{ $b->code }}</td>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->slug }}</td>
                                        <td>{{ $b->description }}</td>
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