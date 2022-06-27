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
                          <select name="user_id" id="user_id" class="form-control js-example-basic-single">
                            @php
                              $user = App\User::all();
                            @endphp  
                            @foreach($user as $caat)
                              <option {{ $caat->user_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->idno }}</option>
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
                            <option {{ $caat->customervehicle_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->register_number }}</option>
                            @endforeach 
                        </select>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                      <div class="col-md-6">
                          <label for="service">{{ __('adminstaticword.service') }}</label>
                          <select name="service[]" class="form-control service" multiple="multiple" >
                            <option value="">Choose service</option>
                            @foreach($service as $c)
                              <option value="{{ $c->id }}"               
                                @if($c->id == $servicerepair->service_id)
                                selected
                                @endif              
                                >{{ $c->name }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <br>

                    <div class="row">
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
                    
                    {{-- <div class="row">
                        <div class="col-md-6">
                          <label for="stock">{{ __('adminstaticword.stock') }}</label>
                          <select name="stock_id" id="stock_id" class="form-control js-example-basic-single">
                            @php
                              $stock = App\Stock::all();
                            @endphp  
                            @foreach($stock as $stock)
                              <option {{ $stock->stock_id == $stock->id ? 'selected' : "" }} value="{{ $stock->id }}">{{ $stock->id }}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>
                    <br>  --}}

                    <div class="row">
                        <div class="col-md-6">
                            <label for="employee">{{ __('adminstaticword.employee') }}</label>
                             {{-- <select name="employee[]" value="{{ $servicerepair->employee_id }}" --}}
                              {{-- <select name="employee[]"
                                class="form-control employee" multiple="multiple"> --}}
                                {{-- <option value="">Choose Employee</option>                               
                                @foreach ($employee as $r)
                                    <option value="{{ $r->id }}"
                                      {{ $r->id == $empolyee_service_repairs[0]->employee_id ? 'selected' : '' }}>
                                      {{ $r->name }} 
                                    </option>
                                @endforeach
                            </select> --}}

                            <select name="employee[]" class="form-control employee" multiple="multiple" >
                              <option value="">Choose employee</option>
                              @foreach($employee as $c)
                                <option value="{{ $c->id }}" 
                
                                  @if($c->id == $servicerepair->employee_id)
                                  selected
                                  @endif
                
                                  >{{ $c->name }}</option>
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
                            <input type="text" class="form-control" name="amount" id="amount" value=" {{ $servicerepair->amount }}">
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
  
  {{-- employee select --}}
  @section('scripts')
@php
    $employee_ids = [];
@endphp

@foreach ($servicerepair->employee as $e)
@php
    array_push($employee_ids, $e->id);
@endphp    
@endforeach

<script>
$(document).ready(function() {
    $('.employee').select2();
    data = [];
    data = <?php echo json_encode($employee_ids); ?>;
    $('.employee').val(data).trigger('change'); 
  });
  </script>
@endsection
// emploee select

// service select
@section('service_scripts')
@php
    $service_ids = [];
@endphp

@foreach ($servicerepair->service as $e)
@php
    array_push($service_ids, $e->id);
@endphp    
@endforeach

<script>
$(document).ready(function() {
    $('.service').select2();
    data = [];
    data = <?php echo json_encode($service_ids); ?>;
    $('.service').val(data).trigger('change'); 
  });
  </script>
@endsection
// service select

// stock select
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
// service select