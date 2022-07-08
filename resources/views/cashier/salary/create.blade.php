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
                                    <label for="salary">{{ __('adminstaticword.salary') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Enter name" value="">
                                    {{-- <input type="text" id="searchhere_id" placeholder="Search" /> --}}
                                 </div>  
                            </div>
                            <br>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="basic">{{ __('adminstaticword.basic') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="basic" id="basic" placeholder="Enter ...." value="">
                                </div> 
                            
                                <div class="col-md-6">
                                    <label for="conveyance">{{ __('adminstaticword.conveyance') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="conveyance" id="conveyance" placeholder="Enter ..." value="">
                                </div> 
                            </div>
                            <br>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label for="allowance">{{ __('adminstaticword.allowance') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="allowance" id="allowance" placeholder="Enter contact" value="">
                                </div> 
                                
                                <div class="col-md-6">
                                    <label for="labour_welfare">{{ __('adminstaticword.labour_welfare') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="labour_welfare" id="labour_welfare" placeholder="Enter total cost" value="">
                                </div>  
                            </div> --}}                            

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="leave">{{ __('adminstaticword.leave') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="leave" id="leave" placeholder="Enter price" value="">
                                </div>  

                                <div class="col-md-6">
                                    <label for="medical_allowance">{{ __('adminstaticword.medical_allowance') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="medical_allowance" id="medical_allowance" placeholder="Enter total cost" value="">
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
