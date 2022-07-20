@extends('admin/layouts.master')
@section('title', 'View Income')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.income') }}</h3>  
                        <a href="{{ route('income.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.income') }}</a>                                            
                    </div> 

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('adminstaticword.code') }}</th>
                                        <th>{{ __('adminstaticword.timestart') }}</th>     
                                        <th>{{__('adminstaticword.registernumber') }}</th>
                                        <th>{{__('adminstaticword.charge') }}</th>
                                        <th>{{__('adminstaticword.fixprice') }}</th>                                        
                                        <th>{{ __('adminstaticword.product') }} {{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.service') }}</th>     
                                        <th>{{ __('adminstaticword.paidamount') }}</th>
                                        <th>{{ __('adminstaticword.balance') }}</th>
                                        <th>{{__('adminstaticword.amount') }}</th>
                                    </tr>
                                </thead>

                                <tbody>   
                                    @foreach ($recordes as $record)                       
                                    <tr>   
                                        <td>{{ $record['code'] }}</td>      
                                        <td>{{ $record['created_at'] }}</td>                                      
                                        <td>{{ $record['customervehicle']['register_number'] }}</td>
                                        <td>{{ $record['charge'] }}</td>  
                                        <td>{{ $record['fixprice'] }}</td>  
                                        <td>
                                            @php
                                            $selling_price = 0;
                                            @endphp
                                            @foreach ($record['stock'] as $stock)
                                            @php
                                                $product = App\Product::select('id','name','bike_id','brand_id')->where('id',$stock['product_id'])
                                                            ->with('brand:id,name')
                                                            ->with('bike:id,name')
                                                            ->first();
                                                $selling_price += $stock['sellingprice']*$stock['pivot']['qty'];
                                            @endphp
                                            @endforeach
                                            {{ $selling_price  }}
                                        </td>
                                    
                                        <td>{{ $record['service']['price']  }}</td>

                                        
                                        <td>{{ $record['paid_amount'] }}</td>                                       
                                        <td>{{ $record['amount']-$record['paid_amount'] }}</td>    
                                        <td> {{$record['amount']  }}</td>
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
