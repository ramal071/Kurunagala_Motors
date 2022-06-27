@extends('admin/layouts.master')
@section('title', 'Show attendance')
@section('body')

  
        <div class="container">       
            <div class="card">
                <div class="card-header">

                    <div class="box-body">
                        <div class="table responsive">
                            <h3> {{__('adminstaticword.id') }}: {{$attendance->employee_id}}</h3>
                            <h4> {{__('adminstaticword.name') }}: {{$attendance->employee->name}}</h4>
                            <h4> {{__('adminstaticword.timestart') }}: {{$attendance->time_start}}</h4>
                            <h4> {{__('adminstaticword.timeend') }}: {{$attendance->time_end}}</h4>
                        </div>  
         
                    </div>
                    
                </div>
            </div>       

        <div class="row">
            <div class="col-md-6">                              
                <a href="{{route('attendance.index')}}" class="btn btn-primary">Back</a>
            </div> 
        </div>  
        
    </div>
@endsection