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

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.employee') }}</label>
                    <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
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
                        <label for="salary">{{ __('adminstaticword.salary') }}:</label>
                        <input type="text" class="form-control" name="salary" id="salary" value="{{ $salary->salary }}" readonly >
                    </div>          
                </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="basic">{{ __('adminstaticword.basic') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="basic" id="basic" value="{{ $salary->basic }}">
                    </div>          
                
                    <div class="col-md-6">
                        <label for="conveyance">{{ __('adminstaticword.conveyance') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="conveyance" id="conveyance" value="{{ $salary->conveyance }}">
                    </div>          
                </div>
                <br>

                <div class="row">
                <div class="col-md-6">
                    <label for="allowance">{{ __('adminstaticword.allowance') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="allowance" id="allowance" value="{{ $salary->allowance }}">
                </div>          
           
                <div class="col-md-6">
                <label for="medical_allowance">{{ __('adminstaticword.medical_allowance') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="medical_allowance" id="medical_allowance" value="{{ $salary->medical_allowance }}" >
                </div>          
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <label for="leave">{{ __('adminstaticword.leave') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="leave" id="leave" value="{{ $salary->leave }}">
            </div>          
       
            <div class="col-md-6">
            <label for="labour_welfare">{{ __('adminstaticword.labour_welfare') }}:<sup class="redstar">*</sup></label>
            <input type="text" class="form-control" name="labour_welfare" id="labour_welfare" value="{{ $salary->labour_welfare }}" >
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

  {{-- @section('salary')
  <script>
$(document).on('click', '.Update', function()
{
    var _this = $(this).parents('tr')
    $('employee_id').val(_this.find(.salary));
});
  </script>
    
  @endsection --}}