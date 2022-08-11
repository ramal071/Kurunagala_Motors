@extends('admin/layouts.master')
@section('title', 'View job detail')
@section('body')
    @include('admin.message')
{{-- {{ dd($servicerepair) }} --}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary"> {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('adminstaticword.servicerepair') }}</h3>
                        <a href="{{ route('servicerepair.create') }}" class="btn btn-info btn-sm">+
                            {{ __('adminstaticword.servicerepair') }}</a>
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('adminstaticword.job') }}</th>
                                        <th>{{ __('adminstaticword.tool') }}</th>
                                        <th>{{__('adminstaticword.fname') }}</th>
                                        <th>{{ __('adminstaticword.registernumber') }}</th>
                                        <th>{{ __('adminstaticword.stock') }} {{ __('adminstaticword.product') }}</th>
                                        <th>{{ __('adminstaticword.service') }}</th>                                      
                                        <th>{{ __('adminstaticword.service') }} {{ __('adminstaticword.charge') }}</th>     
                                        <th>{{ __('adminstaticword.product') }} {{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.employee') }}</th>
                                        <th>{{ __('adminstaticword.fix') }} {{ __('adminstaticword.charge') }}</th>
                                        <th> {{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.amount') }}</th>
                                        <th>{{ __('adminstaticword.paidamount') }}</th>
                                        <th>{{ __('adminstaticword.balance') }}</th>
                                        <th>{{ __('adminstaticword.status') }}</th>  
                                        <th>{{ __('adminstaticword.remind') }}</th>                                       
                                        <th>{{ __('adminstaticword.borrow') }}</th>
                                        <th>{{ __('adminstaticword.payment') }}</th>
                                        <th>{{ __('adminstaticword.repaircomplete') }}</th>                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($recordes as $record)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $record['code'] }}</td>
                                            <td>
                                                <a href="{{ route('servicerepair.show', $record['id']) }}" ><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('servicerepair.edit', $record['id']) }}"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>

                                                <a href="javascript:void(0)"
                                                    onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                                <form action="{{ route('servicerepair.destroy', $record['id']) }}" method="post">
                                                    @method('DELETE')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </td>
                                            <td>{{ $record['user']['fname'] }}</td>
                                           
                                            <td>{{ $record['customervehicle']['register_number'] }}</td>

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
                                                <li>
                                                     {{$product->brand->name}} {{$product->bike->name}} {{$product->name}}
                                                </li>
                                                @endforeach
                                            </td>
                                              
                                            </td>
                                            <td>{{ $record['service']['name'] }}</td>
                                            
                                            <td>{{ $record['service']['price']  }}</td>

                                            <td>{{ $selling_price}}.00</td>
                                            <td>{{ $record['employee']['name']  }}</td>
                                            <td>{{ $record['fixprice'] }}</td>      
                                            <td>{{ $record['charge'] }}</td>                                           
                                            <td> {{$record['amount']  }}</td>
                                            <td>{{ $record['paid_amount'] }}</td>
                                           
                                            <td>{{ $record['amount']-$record['paid_amount'] }}.00</td>

                                            <td>
                                                <form action="{{ route('servicerepair.quick', $record['id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="Submit"
                                                        class="btn btn-xs {{ $record['status'] == 1 ? 'btn-success' : 'btn-danger' }} ">
                                                        @if ($record['status'] == 1)
                                                            {{ __('adminstaticword.active') }}
                                                        @else
                                                            {{ __('adminstaticword.deactive') }}
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>       

                                            <td>
                                                <form action="{{ route('isremind.quick', $record['id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="Submit"
                                                        class="btn btn-xs {{ $record['is_remind'] == 1 ? 'btn-success' : 'btn-danger' }} ">
                                                        @if ($record['is_remind'] == 1)
                                                            {{ __('adminstaticword.remind') }}
                                                        @else
                                                            {{ __('adminstaticword.notremind') }}
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{ route('isborrow.quick', $record['id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="Submit"
                                                        class="btn btn-xs {{ $record['is_borrow'] == 1 ? 'btn-success' : 'btn-danger' }} ">
                                                        @if ($record['is_borrow'] == 1)
                                                            {{ __('adminstaticword.borrow') }}
                                                        @else
                                                            {{ __('adminstaticword.notborrow') }}
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{ route('iscomplete.quick', $record['id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="Submit"
                                                        class="btn btn-xs {{ $record['is_complete'] == 1 ? 'btn-success' : 'btn-danger' }} ">
                                                        @if ($record['is_complete'] == 1)
                                                            {{ __('adminstaticword.fullpayment') }}
                                                        @else
                                                            {{ __('adminstaticword.halfpayment') }}
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{ route('isrepaircomplete.quick', $record['id']) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="Submit"
                                                        class="btn btn-xs {{ $record['is_repaircomplete'] == 1 ? 'btn-success' : 'btn-danger' }} ">
                                                        @if ($record['is_repaircomplete'] == 1)
                                                            {{ __('adminstaticword.complete') }}
                                                        @else
                                                            {{ __('adminstaticword.notcomplete') }}
                                                        @endif
                                                    </button>
                                                </form>
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
            </div>
        </div>
    </section>

@endsection
