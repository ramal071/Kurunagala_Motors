@extends('admin/layouts.master')
@section('title', 'Create income ')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.income') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('income.store')}}">
                            {{ csrf_field() }}

                            <div class="row text-center">
                                <div class="col-md-6">
                                    <label for="">income Prepairing Month</label>
                                    <input type="date" id="calender" class="form-control" value="">
                                </div>
                             
                                    <div class="col-md-6">
                                        <label for="total_income">{{ __('adminstaticword.total_income') }}:<sup class="redstar">*</sup></label>
                                        <input type="number" class="form-control" name="total_income" id="total_income" placeholder="Enter total_income" value="">
                                   </div>                                               
                               
                            </div>
                            <div class="box box-primary">
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employee">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                                    <select name="code" id="code" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($servicerepair as $servicerepair)
                                        <option value="{{$servicerepair->id}}">{{$servicerepair->code}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                          
                              <div class="col-md-6">
                                <label for="dealerprice">{{ __('adminstaticword.dprice') }}</label>
                                <input type="text" class="form-control" name="dealerprice" id="dealerprice"> 
                              </div>
                            </div>
                          <br>  

                             <div class="row">
                                <div class="col-md-6">
                                    {{-- <label for="price">{{ __('adminstaticword.price') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="price" id="upload_id"  value=""> --}}
                                    <label for="exampleInputTit1e1">{{ __('adminstaticword.price') }}</label>
                                    <select name="price" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                    </select>
                                </div> 
                                
                                {{-- <div class="col-md-6">
                                    <label for="total_salary">{{ __('adminstaticword.total_salary') }}:<sup class="redstar">*</sup></label>
                                    <input type="number" class="form-control" name="total_salary" id="total_salary" placeholder="Enter total_salary" value="">
                                </div>   --}}
                            </div>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="charge">{{ __('adminstaticword.charge') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="charge" id="charge" value="">
                                </div> 
                                
                                <div class="col-md-6">
                                    <label for="full_leave">{{ __('adminstaticword.full_leave') }}:<sup class="redstar">*</sup></label>
                                    <input type="number" class="form-control" name="full_leave" id="full_leave" placeholder="Enter full_leave" value="">
                                </div>  
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fixprice">{{ __('adminstaticword.fixprice') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="fixprice" id="fixprice" placeholder="Enter fixprice" value="">
                                </div>  

                                <div class="col-md-6">
                                    <label for="sellingprice">{{ __('adminstaticword.sprice') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="sellingprice" id="sellingprice"  value="">

                                    
                                </div>  
                            </div>
                            <br>        
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="description">{{ __('adminstaticword.description') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="">
                                </div>   
                            </div>
                            <br>   
                              
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('income.index')}}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('income')
<script>
    (function($) {
      "use strict";
    
      $(function() {
        var urlLike = '{{ route('income-dropdown') }}';
        $('#code').change(function() {
            var up = $('#upload_id').empty();
              var pr_ids = $(this).val();
              let prev_month = $('#calender').val();
              if (pr_ids) {
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type: "GET",
                      url: urlLike,
                      data: {
                          prIds: pr_ids,prev_month:prev_month
                      },
                      success: function(data) {
                        console.log(data);
                         $('#upload_id').val(data['price']);
                     
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                          console.log(XMLHttpRequest);
                      }
                  });
              }
          });
      });
    
    })(jQuery);
    </script> 

@endsection
 