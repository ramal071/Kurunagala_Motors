@extends('admin/layouts.master')
@section('title', 'Create leave')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.leave') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('leave.store')}}">
                            {{ csrf_field() }}
                            
                                    {{-- <select class="select select2s-hidden-accessible style="width: 100%;" tabindex="-1" aria-hidden="true" id="name" name="name">
                                        <option value="">-- Select --</option>
                                        @foreach ($employeeList as $key=>$employee )
                                            <option value="{{ $employee->name }}" data-employee_id={{ $employee->employee_id }}>{{ $employee->name }}</option>
                                        @endforeach
                                    </select> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employee">{{ __('adminstaticword.employee') }}</label>
                                    <select name="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                                    @foreach($employee as $br)
                                        <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                           
                                <div class="col-md-6">
                                    <label for="leave_type">{{ __('adminstaticword.leave_type') }}:</label>
                                    <select name="leave_type"  class="form-control" id="leave_type">
                                        <option value="half day">half day</option>
                                        <option value="full leave">full leave</option>
                                    </select>
                                </div>  
                            </div>
                            <br>  

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="leave_reason">{{ __('adminstaticword.leavereason') }}:</label>
                                    <input type="text" class="form-control" name="leave_reason" id="leave_reason" placeholder="....." value="">
                                </div>  
                            </div>
                        <br>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="from_date">{{ __('adminstaticword.fromdate') }}:<sup class="redstar">*</sup></label>
                                    <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter ...." value="">
                                </div> 
                            
                                <div class="col-md-6">
                                    <label for="to_date">{{ __('adminstaticword.todate') }}:<sup class="redstar">*</sup></label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter ..." value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('leave.index')}}" class="btn btn-primary">Back</a>
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
