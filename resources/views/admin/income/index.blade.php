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
                                        <th>{{__('adminstaticword.amount') }}</th>
                                        <th>{{__('adminstaticword.sprice') }}</th>                                        
                                        <th>{{ __('adminstaticword.employee') }} {{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.fixprice') }}</th>     
                                        <th>{{ __('adminstaticword.service') }} {{ __('adminstaticword.price') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{ __('adminstaticword.timestart') }}</th>     
                                        <th>{{ __('adminstaticword.delete') }}</th>     
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach ($recordes as $record)                       
                                    <tr>   
                                        <td>{{ $record['code'] }}</td>     
                                        <td>{{ $record['amount'] }}</td> 
                                        <td>{{ $record['stock_items_sum'] }}</td>   
                                        <td>{{ $record['charge'] }}</td>  
                                        <td>{{ $record['fixprice'] }}</td>  
                                        <td>{{ $record['service_price']  }}</td>   
                                        <td> {{$record['description']  }}</td>
                                        <td>{{ $record['created_at'] }}</td>  
                                        <td>
                                            <a href="javascript:void(0)"
                                            onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                        <form action="{{ route('income.destroy', $record['id']) }}" method="post">
                                            @method('DELETE')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    </section>    
@endsection
