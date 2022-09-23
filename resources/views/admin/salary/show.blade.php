@extends('admin/layouts.master')
@section('title', 'Pay sheet')
@section('body')
@include('admin.message')


<section class="content">
    @include('admin.message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
  
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.salary') }}</h3>
          </div>
       
          <div class="box-body">
            <div class="table responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{__('adminstaticword.slip_id') }}</th>
                            <th>{{__('adminstaticword.employee') }}</th>
                            <th>{{__('adminstaticword.worked_days') }}</th>
                            <th>{{__('adminstaticword.basic_salary') }}</th>
                            <th>{{__('adminstaticword.half_salary') }}</th>                                  
                            <th>{{__('adminstaticword.loan_amount') }}</th>
                            <th>{{__('adminstaticword.full_leave') }}</th>
                            <th>{{__('adminstaticword.half_days') }}</th>  
                            <th>{{__('adminstaticword.job_amount') }}</th>
                            <th>{{__('adminstaticword.allowance') }}</th>                                      
                            <th>{{__('adminstaticword.total_salary') }}</th>   
                        </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>{{ $salary->slip_id}}</td>
                        <td>{{ $salary->employee->name}}</td>
                      <td>{{ $salary->worked_days}}</td>
                      <td>{{ $salary->employee->basic_salary}}</td>
                      <td>{{ $salary->employee->half_salary}}</td>
                      <td>{{ $salary->loan_amount}}</td>
                      <td>{{ $salary->full_leave}}</td>
                      <td>{{ $salary->half_days}}</td>
                      <td>{{ $salary->job_amount}}</td>
                      <td>{{ $salary->allowance}}</td>
                      <td>{{ $salary->total_salary}}</td>
                      </tr>  
                  </tbody>

                </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
              