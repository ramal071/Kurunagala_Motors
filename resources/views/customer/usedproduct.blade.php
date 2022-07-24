@extends('theme.master')
@section('title', 'Bike Model')
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
                                  <th>{{__('adminstaticword.code') }}</th>
                                  <th>{{__('adminstaticword.starttime') }}</th>
                                  <th>{{ __('adminstaticword.product') }}</th>
                                  <th>{{ __('adminstaticword.price') }} {{ __('adminstaticword.price') }}</th>
                                  <th>{{ __('adminstaticword.price') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)            
                                    <tr>
                                        <td>{{ $b->code}}</td>
                                        <td>{{ $b->created_at}}</td>
                                        <td>
                                            @foreach ($b->stock as $s)
                                            <li>
                                                {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                            </li>
                                            @endforeach
                                        </td>  
                
                                        <td>
                                          @foreach ($b->stock as $s)
                                          <li>
                                              {{$s->sellingprice}}
                                          </li>
                                          @endforeach
                                      </td>   
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