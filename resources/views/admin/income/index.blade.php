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
                                        <th>{{__('adminstaticword.dprice') }}</th>
                                        <th>{{__('adminstaticword.sprice') }}</th>                                        
                                        <th>{{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.fixprice') }}</th>     
                                        <th>{{ __('adminstaticword.price') }}</th>
                                        <th>{{ __('adminstaticword.income') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{ __('adminstaticword.timestart') }}</th>     
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach ($recordes as $record)                       
                                    <tr>   
                                        <td>{{ $record['code'] }}</td>     
                                        <td>{{ $record['dealerprice'] }}</td> 
                                        <td>{{ $record['sellingprice'] }}</td>   
                                        <td>{{ $record['charge'] }}</td>  
                                        <td>{{ $record['fixprice'] }}</td>  
                                        <td>{{ $record['price']  }}</td>          
                                        <td>{{ $record['total_income'] }}</td>    
                                        <td> {{$record['description']  }}</td>
                                        <td>{{ $record['created_at'] }}</td>  
                                    </tr>
                                @endforeach
                                </tbody> 
                            </table>
                        </div>
                    </div>


                    <div class="box-header with-border">
                        <h3 class="box-title">monthly {{__('adminstaticword.income') }}</h3>     
                        <a href="{{ route('income.createMonth') }}" class="btn btn-info btn-sm">+monthly {{__('adminstaticword.income') }}</a>                                                   
                    </div> 
                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('adminstaticword.code') }}</th>         
                                        <th>{{__('adminstaticword.dprice') }}</th>
                                        <th>{{__('adminstaticword.sprice') }}</th>                                        
                                        <th>{{ __('adminstaticword.charge') }}</th>
                                        <th>{{ __('adminstaticword.fixprice') }}</th>     
                                        <th>{{ __('adminstaticword.price') }}</th>
                                        <th>{{ __('adminstaticword.income') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{ __('adminstaticword.timestart') }}</th>     
                                    </tr>
                                </thead>
                                <tbody>   
                                    @foreach ($recordes as $record)                       
                                    <tr>   
                                        <td>{{ $record['code'] }}</td>     
                                        <td>{{ $record['dealerprice'] }}</td> 
                                        <td>{{ $record['sellingprice'] }}</td>   
                                        <td>{{ $record['charge'] }}</td>  
                                        <td>{{ $record['fixprice'] }}</td>  
                                        <td>{{ $record['price']  }}</td>          
                                        <td>{{ $record['total_income'] }}</td>    
                                        <td> {{$record['description']  }}</td>
                                        <td>{{ $record['created_at'] }}</td>  
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
