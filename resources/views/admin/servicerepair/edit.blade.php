@extends('admin/layouts.master')
@section('title', 'Edit Service Repair')
@section('body')
@include('admin.message')

@section('stylesheets')
@endsection

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
                          <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $servicerepair->users->fname }}" readonly>
                          {{-- <select name="user_id" id="user_id" class="form-control js-example-basic-single" >
                            @php
                              $user = App\User::all();
                            @endphp  
                            @foreach($user as $caat)
                              <option {{ $caat->user_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->idno }}: {{$caat->fname}} {{$caat->lname}} </option>
                            @endforeach 
                          </select> --}}
                        </div>

                        <div class="col-md-6">
                          <label for="email">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
                          <input type="email" class="form-control" name="email" id="email" value=" {{ $servicerepair->email }}" >
                      </div>  
                  </div>
                  <br>        
                     
                      
                    <div class="row">
                        <div class="col-md-6">
                        <label for="exampleInputTit1e1">{{ __('adminstaticword.registernumber') }}</label>
                        <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single" >
                            @php
                            $customervehicle = App\CustomerVehicle::all();
                            @endphp  
                            @foreach($customervehicle as $caat)
                            <option {{ $caat->customervehicle_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->register_number }}</option>
                            @endforeach 
                        </select>
                        </div>
               
                      <div class="col-md-6">
                        <label for="service">{{ __('adminstaticword.service') }}</label>
                        <select name="service_id" id="service_id" class="form-control js-example-basic-single" >
                          @php
                            $service = App\Service::all();
                          @endphp  
                          @foreach($service as $caat)
                            <option {{ $caat->service_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                          @endforeach                         
                        </select>
                      </div>
                    </div>
                    <br> 

                    <div class="row">
                      <div class="col-md-6">
                        <label for="employee">{{ __('adminstaticword.employee') }}</label>
                        <select name="employee_id" id="employee_id" class="form-control js-example-basic-single">
                          @php
                            $employee = App\Employee::all();
                          @endphp  
                          @foreach($employee as $caat)
                            <option {{ $caat->employee_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                          @endforeach 
                        </select>
                      </div>
                  
                      <div class="col-md-6">
                          <label for="stock">{{ __('adminstaticword.stock') }}</label>
                          <select name="stock[]" class="form-control stock" multiple="multiple" >
                            <option value="">Choose stock</option>
                            @foreach($stock as $s)
                              <option value="{{ $s->id }}"               
                                @if($s->id == $servicerepair->stock_id)
                                selected
                                @endif              
                                >{{ $s->id }}: {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}}</option>
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
                  
                        <div class="col-md-6">
                            <label for="amount">{{ __('adminstaticword.amount') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="amount" id="amount" value=" {{ $servicerepair->amount }}">
                        </div>  
                    </div>
                    <br>   
                    
                    <div class="row">
                      <div class="col-md-6">
                          <label for="charge">{{ __('adminstaticword.charge') }}:</label>
                          <input type="text" class="form-control" name="charge" id="charge" value=" {{ $servicerepair->charge }}">
                      </div>  
                
                      <div class="col-md-6">
                          <label for="description">{{ __('adminstaticword.description') }}:</label>
                          <input type="text" class="form-control" name="description" id="description" value=" {{ $servicerepair->description }}">
                      </div>  
                  </div>
                  <br>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-info" value="Update">
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
  
 
 {{-- stock select --}}
@section('stock')
@php
    $stock_ids = [];
@endphp

@foreach ($servicerepair->stock as $e)
@php
    array_push($stock_ids, $e->id);
@endphp    
@endforeach

<script>
$(document).ready(function() {
    $('.stock').select2();
    data = [];
    data = <?php echo json_encode($stock_ids); ?>;
    $('.stock').val(data).trigger('change'); 
  });
  </script>
@endsection