@extends('admin/layouts.master')
@section('title', 'Edit Salary')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.salary') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('salary.update', $salary->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')
                
                  <div class="row text-center">
                 
                        <div class="col-md-6">
                            <label for="total_salary">{{ __('adminstaticword.total_salary') }}:<sup class="redstar">*</sup></label>
                            <input type="number" disabled class="form-control" name="total_salary" id="total_salary" placeholder="Enter total_salary" value="{{ $salary->total_salary }}">
                       </div>                                               
                   
                </div>
                <div class="box box-primary">
                </div> 

                <div class="row">
                    <div class="col-md-6">
                        <label for="employee">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                        <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" disabled>
                            <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                            @foreach($employee as $br)
                            <option value="{{$br->id}} "
                                @if ($br->id == $salary->employee_id)
                                selected
                            @endif
                                >{{$br->name}}</option>
                          @endforeach
                        </select>
                     </div>  
              
                  <div class="col-md-6">
                    <label for="attendance">{{ __('adminstaticword.attendance') }}</label>
                    <input type="text" class="form-control" name="workdays" id="upload_id" disabled value="{{ $salary->worked_days }}"> 
                  </div>
                </div>
              <br>  

                 <div class="row">
                    <div class="col-md-6">
                        <label for="allowance">{{ __('adminstaticword.allowance') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="allowance" id="allowance" disabled value="{{ $salary->allowance }}">
                    </div> 
                </div>  
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="half_days">{{ __('adminstaticword.half_days') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="half_days" id="half_days" placeholder="Enter contact" value="{{ $salary->half_days }}" disabled>
                    </div> 
                    
                    <div class="col-md-6">
                        <label for="full_leave">{{ __('adminstaticword.full_leave') }}:<sup class="redstar">*</sup></label>
                        <input type="number" class="form-control" name="full_leave" id="full_leave" placeholder="Enter full_leave" value="{{ $salary->full_leave }}" disabled>
                    </div>  
                </div> 

                <div class="row">
                    <div class="col-md-6">
                        <label for="job">{{ __('adminstaticword.job_amount') }} :<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="job_amount" id="servicerepair_id" placeholder="Enter price" value="{{ $salary->job_amount }}" disabled>
                    </div>  

                    <div class="col-md-6">
                        <label for="loan_amount">{{ __('adminstaticword.loan_amount') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="loan_amount" id="loan_amount" placeholder="Enter loan_amount" value="{{ $salary->loan_amount }}" disabled>
                    </div>  
                </div>
                <br>      

                  <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-info" value="Update">
                        <a href="{{route('salary.index')}}" class="btn btn-primary">Back</a>
                    </div> 
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  @endsection

  @section('salary')
  <script>
    (function($) {
      "use strict";
    
      $(function() {
        var urlLike = '{{ route('admin-dropdown') }}';
        $('#brand_id').change(function() {
          var up = $('#upload_id').empty();
          var pr_id = $(this).val();    
          if(pr_id){
            $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:"GET",
              url: urlLike,
              data: {prId: pr_id},
              success:function(data){   
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
    {{-- Dynamic Dropdown --}}
    
    @endsection
  