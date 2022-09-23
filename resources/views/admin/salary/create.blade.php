@extends('admin/layouts.master')
@section('title', 'Create Salary Payment')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.salary') }}</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('salary.store')}}">
                            {{ csrf_field() }}

                            <div class="row text-center">
                                <div class="col-md-6">
                                    <label for="">Salery Prepairing Month</label>
                                    <input type="date" id="calender" class="form-control" value="" required>
                                </div>
                             
                                    <div class="col-md-6">
                                        <label for="total_salary">{{ __('adminstaticword.total_salary') }}:<sup class="redstar">*</sup></label>
                                        <input type="number" class="form-control" name="total_salary" id="total_salary" readonly value="">
                                   </div>                                               
                               
                            </div>
                            <div class="box box-primary">
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employee">{{ __('adminstaticword.employee') }} {{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                                    <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" required>
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($employee as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                          
                              <div class="col-md-6">
                                <label for="attendance">{{ __('adminstaticword.attendance') }}</label>
                                <input type="text" class="form-control" name="workdays" id="upload_id" readonly> 
                              </div>
                            </div>
                          <br>  

                             <div class="row">
                                <div class="col-md-6">
                                    <label for="allowance">{{ __('adminstaticword.allowance') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="allowance" id="allowance" readonly value="">
                                </div> 
                            </div>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="half_days">{{ __('adminstaticword.half_days') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="half_days" id="half_days" readonly value="">
                                </div> 
                                
                                <div class="col-md-6">
                                    <label for="full_leave">{{ __('adminstaticword.full_leave') }}:<sup class="redstar">*</sup></label>
                                    <input type="number" class="form-control" name="full_leave" id="full_leave" readonly value="">
                                </div>  
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="job">{{ __('adminstaticword.job_amount') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="job_amount" id="servicerepair_id" value="" readonly>
                                </div>  

                                <div class="col-md-6">
                                    <label for="loan_amount">{{ __('adminstaticword.loan_amount') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="loan_amount" id="loan_amount" value="" readonly>
                                </div>  
                            </div>
                            <br>        
                            
                          
                              
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('salary.index')}}" class="btn btn-primary">Back</a>
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



@section('salary')
<script>
  (function($) {
      "use strict";

      $(function() {
          var urlLike = '{{ route('salary-dropdown') }}';
          $('#employee_id').change(function() {
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
                         $('#upload_id').val(data['days']);
                         $('#total_salary').val(data['basic']);
                         $('#servicerepair_id').val(data['job_amount']);
                         $('#loan_amount').val(data['loan_amount']);
                         $('#half_days').val(data['halfday']);
                         $('#full_leave').val(data['full_leave']);  
                         $('#allowance').val(data['allowance']);
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
 