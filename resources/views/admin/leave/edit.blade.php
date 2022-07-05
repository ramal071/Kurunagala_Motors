@extends('admin/layouts.master')
@section('title', 'Edit leave')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.leave') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('leave.update', $leave->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="employee">{{ __('adminstaticword.employee') }}</label>
                    <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                      @foreach($employee as $br)
                        <option value="{{$br->id}} "
                            @if ($br->id == $leave->employee_id)
                            selected
                        @endif
                            >{{$br->name}}</option>
                      @endforeach
                    </select>
                  </div>
                
                    <div class="col-md-6">
                      <label for="leave_reason">{{ __('adminstaticword.leavereason') }}:</label>
                      <input type="text" class="form-control" name="leave_reason" id="allowance" value="{{ $leave->leave_reason }}">
                    </div>           
                </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="fromdate">{{ __('adminstaticword.fromdate') }}:<sup class="redstar">*</sup></label>
                        <input type="date" class="form-control" name="fromdate" id="fromdate" value="{{ $leave->fromdate }}" readonly>
                        <input type="text" class="form-control" name="fromdate" id="fromdate" value="{{ $leave->fromdate }}" >
                    </div>          
                
                    <div class="col-md-6">
                        <label for="todate">{{ __('adminstaticword.todate') }}:<sup class="redstar">*</sup></label>
                        <input type="date" class="form-control" name="convetodateyance" id="todate" value="{{ $leave->todate }}">
                    </div>          
                </div>
                <br>

                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Update">
                    <a href="{{route('leave.index')}}" class="btn btn-primary">Back</a>
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
