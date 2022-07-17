@extends('admin/layouts.master')
@section('title', 'Edit loan')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.loan') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('loan.update', $loan->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="employee">{{ __('adminstaticword.employee') }}</label>
                    <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                      @foreach($employee as $br)
                        <option value="{{$br->id}} "
                            @if ($br->id == $loan->employee_id)
                            selected
                        @endif
                            >{{$br->name}}</option>
                      @endforeach
                    </select>
                  </div>
                
                    <div class="col-md-6">
                      <label for="loan_amount">{{ __('adminstaticword.loan_amount') }}:</label>
                      <input type="text" class="form-control" name="loan_amount" id="loan_amount" value="{{ $loan->loan_amount }}">
                    </div>           
                </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="description">{{ __('adminstaticword.description') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $loan->description }}" >
                    </div>          
                </div>
                <br>

                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Update">
                    <a href="{{route('loan.index')}}" class="btn btn-primary">Back</a>
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
