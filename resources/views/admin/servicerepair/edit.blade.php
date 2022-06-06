@extends('admin/layouts.master')
@section('title', 'Edit Service Repair')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.servicerepair') }}</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
                <form id="demo-form2" method="post" action="{{route('servicerepair.update', $servicerepair->id) }}"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                    {{ csrf_field() }}
                      @method('PUT')

                     
    
                    <div class="row">
                        <div class="col-md-6">
                          <label for="user_id">{{ __('adminstaticword.user') }}</label>
                          <select name="user_id" id="user_id" class="form-control js-example-basic-single">
                            @php
                              $user = App\User::all();
                            @endphp  
                            @foreach($user as $caat)
                              <option {{ $customerpendingservice->user_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->idno }}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>
                    <br>        
                     
                      
                    <div class="row">
                        <div class="col-md-6">
                        <label for="exampleInputTit1e1">{{ __('adminstaticword.registernumber') }}</label>
                        <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single">
                            @php
                            $customervehicle = App\CustomerVehicle::all();
                            @endphp  
                            @foreach($customervehicle as $caat)
                            <option {{ $customerpendingservice->customervehicle_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->register_number }}</option>
                            @endforeach 
                        </select>
                        </div>
                    </div>
                    <br>
  
                    <div class="row">
                        <div class="col-md-6">
                        <label for="service">{{ __('adminstaticword.service') }}</label>
                        <select name="service_id" id="service_id" class="form-control js-example-basic-single">
                            @php
                            $service = App\Service::all();
                            @endphp  
                            @foreach($service as $service)
                            <option {{ $customerpendingservice->service_id == $service->id ? 'selected' : "" }} value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach 
                        </select>
                        </div>
                    </div>
                    <br>  
                    
                    <div class="row">
                        <div class="col-md-6">
                          <label for="product">{{ __('adminstaticword.product') }}</label>
                          <select name="product_id" id="product_id" class="form-control js-example-basic-single">
                            @php
                              $product = App\Product::all();
                            @endphp  
                            @foreach($product as $product)
                              <option {{ $product->product_id == $product->id ? 'selected' : "" }} value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>
                    <br>      

                    <div class="row">
                        <div class="col-md-6">
                          <label for="stock">{{ __('adminstaticword.stock') }}</label>
                          <select name="stock_id" id="stock_id" class="form-control js-example-basic-single">
                            @php
                              $stock = App\Stock::all();
                            @endphp  
                            @foreach($stock as $stock)
                              <option {{ $stock->stock_id == $stock->id ? 'selected' : "" }} value="{{ $stock->id }}">{{ $stock->name }}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>
                    <br> 

                    {{-- <div class="row">
                        <div class="col-md-6">
                          <label for="employee">{{ __('adminstaticword.employee') }}</label>
                          <select name="stock_id" id="stock_id" class="form-control js-example-basic-single">
                            @php
                              $employee = App\Employee::all();
                            @endphp  
                            @foreach($employee as $employee)
                              <option {{ $employee->stock_id == $stock->id ? 'selected' : "" }} value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>
                    <br>  --}}
                 
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputTit1e">{{ __('adminstaticword.role') }}</label>
                             <select name="employee[]" value="{{ $servicerepair->employee_id }}"
                                class="form-control js-example-basic-single col-md-7 col-xs-12">
                                <option value="">Choose Employee</option>
                                {{-- {{ dd($empolyee_roles) }} --}}
                                @foreach ($employee as $r)
                                    <option value="{{ $r->id }}"
                                      {{ $r->id == $empolyee_service_repairs[0]->employee_id ? 'selected' : '' }}>
                                      {{ $r->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="paid_amount">{{ __('adminstaticword.paidamount') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="paid_amount" id="paid_amount" value=" {{ $servicerepair->paid_amount }}">
                        </div>  
                    </div>
                    <br> 
                
                    <div class="row">
                        <div class="col-md-6">
                            <label for="amount">{{ __('adminstaticword.amount') }}:<sup class="redstar">*</sup></label>
                            <input type="date" class="form-control" name="amount" id="amount" value=" {{ $servicerepair->amount }}">
                        </div>  
                    </div>
                    <br>     

                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-info" value="Save">
                            <a href="{{route('servicerepair.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <br>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  
  @endsection
