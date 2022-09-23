@extends('admin/layouts.master')
@section('title', 'Service Bill')
@section('body')
@include('admin.message')


<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.ServiceBill') }}</h3>
        </div>
     
        <div class="box-body">
          <div class="table responsive">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>{{__('adminstaticword.code') }}</th>
                          <th>{{__('adminstaticword.registernumber') }}</th>
                          <th>{{__('adminstaticword.bike') }}</th>                                  
                          <th>{{__('adminstaticword.product') }}</th>
                          <th>{{__('adminstaticword.product') }} {{__('adminstaticword.price') }}</th>
                          <th>{{__('adminstaticword.service') }}</th>
                          <th>{{__('adminstaticword.fixprice') }}</th>  
                          <th>{{__('adminstaticword.charge') }}</th>
                          <th>{{__('adminstaticword.paidamount') }}</th>                                      
                          <th>{{__('adminstaticword.amount') }}</th>   
                      </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>{{ $servicerepair->code}}</td>
                      <td>{{ $servicerepair->customervehicle->register_number}}</td>
                
                      <td>{{$servicerepair->customervehicle->brand->name}} {{$servicerepair->customervehicle->bike->name}}</td>
                      <td>
                        @foreach ($servicerepair->stock as $s)
                                    {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{ $s->product->name }} <br>
                        @endforeach 
                      </td>
                      <td>{{ $servicerepair->stock_items_sum}}</td>
                      <td>{{ $servicerepair->service->name}} {{ $servicerepair->service->price}}</td>
                      <td>{{ $servicerepair->fixprice}}</td>
                      <td>{{ $servicerepair->charge}}</td>
                      <td>{{ $servicerepair->paid_amount}}</td>
                      <td>{{ $servicerepair->amount}}</td>
                    </tr>  
                </tbody>

              </table>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
</section>
@endsection