@extends('admin/layouts.master')
@section('title', 'Create Customer Job Detail')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.jobdetails') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('customerjobdetail.index')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="">
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="">
                                    {{-- <input type="text" id="searchhere_id" placeholder="Search" /> --}}
                                 </div>  
                            </div>
                            <br>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="register_number" id="register_number" placeholder="Enter name" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="brand">{{ __('adminstaticword.brand') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter brand" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="bike">{{ __('adminstaticword.bike') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="bike" id="bike" placeholder="Enter bike name" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="totalwork">{{ __('adminstaticword.totalwork') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="totalwork" id="totalwork" placeholder="Enter total work" value="">
                                </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="totalcost">{{ __('adminstaticword.totalcost') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="totalcost" id="totalcost" placeholder="Enter total cost" value="">
                                </div>  
                            </div>
                            <br>                
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="starttime">{{ __('adminstaticword.starttime') }}:<sup class="redstar">*</sup></label>
                                    <input type="datetime-local" class="form-control" name="starttime" id="starttime" placeholder="Enter start time" value="">
                                </div>  
                            </div>
                            <br> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="endtime">{{ __('adminstaticword.endtime') }}:<sup class="redstar">*</sup></label>
                                    <input type="datetime-local" class="form-control" name="endtime" id="endtime" placeholder="Enter endtime" value="">
                                </div>  
                            </div>
                            <br> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="emp_id">{{ __('adminstaticword.employee') }} {{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="Enter employee" value="">
                                </div>  
                            </div>
                            <br> 

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="servicetype">{{ __('adminstaticword.servicetype') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="servicetype" id="servicetype" placeholder="Enter total cost" value="">
                                </div>  
                            </div>
                            <br> 


                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('customerjobdetail.index')}}" class="btn btn-primary">Back</a>
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
