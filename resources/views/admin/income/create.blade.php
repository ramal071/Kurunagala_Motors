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
                                    <label for="">Today Income Prepairing</label>
                                    <input type="date" id="calender" class="form-control" value="">
                                </div>
                             
                                    <div class="col-md-6">
                                        <label for="amount">{{ __('adminstaticword.amount') }}</label>
                                        <input type="text" name="amount" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" readonly>
                                   </div>                                               
                    
                            </div>
                            <div class="box box-primary">
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                                    <select name="code" id="code" class="form-control js-example-basic-single col-md-7 col-xs-12" required>
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($servicerepair as $servicerepair)
                                        <option value="{{$servicerepair->code}}">{{$servicerepair->code}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                          
                              <div class="col-md-6">
                                <label for="stock_items_sum">{{ __('adminstaticword.product') }} {{ __('adminstaticword.price') }}</label>
                                <input type="text" class="form-control" name="stock_items_sum" id="stock_items_sum" readonly> 
                              </div>
                            </div>
                          <br>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="charge">{{ __('adminstaticword.employee') }} {{ __('adminstaticword.charge') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="charge" id="charge" value="" readonly>
                                </div> 
                                
                                <div class="col-md-6">
                                    <label for="fixprice">{{ __('adminstaticword.fixprice') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="fixprice" id="fixprice" value="" readonly>
                                </div>  
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="service_price">{{ __('adminstaticword.service') }} {{ __('adminstaticword.price') }}:<sup class="redstar">*</sup></label>
                                    <input type="number" class="form-control" name="service_price" id="service_price" value="" readonly>
                                </div>  
                                <div class="col-md-6">
                                    <label for="description">{{ __('adminstaticword.description') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="description" id="description" value="">
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
                         $('#upload_id').val(data['amount']);
                         $('#price').val(data['price']);     
                         $('#fixprice').val(data['fixprice']);
                         $('#total_income').val(data['total_income']); 
                         $('#stock_items_sum').val(data['stock_items_sum']); 
                         $('#service_price').val(data['service_price']); 
                         $('#charge').val(data['charge']);
                      
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                          console.log(XMLHttpRequest);
                      }
                  });
              }
          });
      });


      //job fetch
      $(function() {
        var urlLike = '{{ route('job.date') }}';
        $('#calender').change(function() {
        var up = $('#code').empty();
        var date = $(this).val();    
        if(date){
            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"GET",
            url: urlLike,
            data: {date: date},
            success:function(data){   
                console.log(data);
                up.append('<option value="">Please Choose</option>');
                $.each(data.totalRepairs, function(key,value) {
                up.append($('<option>', {value:value.code, text:value.code}));
                });
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
 