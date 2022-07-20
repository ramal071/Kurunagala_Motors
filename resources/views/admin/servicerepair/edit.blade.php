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
                            <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="code" id="code" value=" {{ $servicerepair->code }}" readonly>
                        </div> 
                        
                        <div class="col-md-6">
                            <label for="user">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" value=" {{ $servicerepair->user->idno }}" readonly>

                       </div>  

                    </div>
                    <br>   
    
                      <div class="row">
                        <div class="col-md-6">
                            {{-- <label for="user">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                            <select name="user_id" class="form-control js-example-basic-single col-md-7 col-xs-12" aria-readonly="true">       
                                @foreach($user as $cou)
                                 <option value="{{ $cou->id }}" {{$servicerepair->user_id == $cou->id  ? 'selected' : ''}}>{{ $cou->idno}}</option>
                                @endforeach
                              </select> --}}

                              <label for="user">{{ __('adminstaticword.user') }}:<sup class="redstar">*</sup></label>
                              <input type="text" class="form-control" value=" {{ $servicerepair->user->fname }}" readonly>

                         </div>  

                         
               
                        <div class="col-md-6">
                          <label for="email">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
                          <input type="email" class="form-control" name="email" id="email" value=" {{ $servicerepair->email }}">
                      </div>  
                  </div>
                  <br>        
                     
                      
                    <div class="row">
                        <div class="col-md-6">
                          {{-- <label for="exampleInputTit1e1">{{ __('adminstaticword.registernumber') }}</label>
                            <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single" >
                                @php
                                $customervehicle = App\CustomerVehicle::all();
                                @endphp  
                                @foreach($customervehicle as $caat)
                                <option {{ $caat->customervehicle_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->register_number }}</option>
                                @endforeach 
                            </select> --}}

                            <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" value=" {{ $servicerepair->customervehicle->register_number }}" readonly>

                        </div>
               
                      <div class="col-md-6">
                        <label for="service">{{ __('adminstaticword.service') }}</label>
                        <select name="service_id" id="service_id" class="form-control js-example-basic-single" >
                          @php
                            $service = App\Service::all();
                          @endphp  
                          @foreach($service as $caat)
                            <option {{ $servicerepair->service_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
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
                            <option {{ $servicerepair->employee_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                          @endforeach 
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <td>
                          @foreach ($servicerepair->stock as $s)
                          <li>
                              {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                          </li>
                          @endforeach
                      </td>  
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                       
                        <table class="table table_bordered">
                          <thead>
                            <tr>
                              <th>product</th>
                              <th>quantity</th>
                              <th>action</th>
                            </tr>
                          </thead>

                          <tbody>
                            <td>
                              <select name="stock[]" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12 select_dropdown" >
                                <option value="0">--{{ __('adminstaticword.pleaseselect') }}--</option>
                                @foreach($stock as $s)
                                <option value="{{$s->id}}">{{$s->id}}: {{$s->sellingprice}} {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}}</option>
                                @endforeach
                              </select>
                          </td>

                            <td>
                              <input type="number" class="form-control" name="qty[]" placeholder="Enter qty">
                            </td>

                            <td>
                              <button type="button" class="btn btn-primary" id="add_btn"> <i class="glyphicon glyphicon-plus"></i></button>
                            </td>
                          </tbody>

                        </table>

                      </div>
                    </div>
                  
                      {{--                         
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
                      
                       @foreach($stock as $s)<option value="{{ $s->id }}"@if($s->id == $servicerepair->stock_id)selected @endif>{{ $s->id }}: {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}}</option>@endforeach
                      --}}
                                
               
                    <div class="row">
                        <div class="col-md-6">
                            <label for="paid_amount">{{ __('adminstaticword.paidamount') }}:</label>
                            <input type="text" class="form-control" name="paid_amount" id="paid_amount" value="{{ $servicerepair->paid_amount }}">
                        </div>  
                  
                        <div class="col-md-6">
                            <label for="fixprice">{{ __('adminstaticword.fixprice') }}:</sup></label>
                            <input type="text" class="form-control" name="fixprice" id="fixprice" value=" {{ $servicerepair->fixprice }}">
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
  
 
@section('add-btn')
<script type="text/javascript">
  $(document).ready(function() {
    $('#add_btn').on('click',function(){
   //   alert();
      let length = $('.select_dropdown').length+1;
   var html='';
   html+="<tr>";
    html+='<td><select name="stock[]" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12 select_dropdown" ><option value="0">--{{ __('adminstaticword.pleaseselect') }}--</option>@foreach($stock as $s)<option value="{{$s->id}}">{{$s->id}}: {{$s->sellingprice}} {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}}</option> @endforeach</select></td>';
   html+='<td><input type="number" class="form-control" name="qty[]" placeholder="Enter qty"></td>';
   html+='<td><button type="button" class="btn btn-primary" id="remove"> <i class="glyphicon glyphicon-remove"></i></button></td>';
   html+="</tr>";
   $('tbody').append(html);
    });
  });

  $(document).on('click','#remove', function(){
   // alert();
   $(this).closest('tr').remove();
  });
 
</script>
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