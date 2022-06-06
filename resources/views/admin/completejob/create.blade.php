@extends('admin/layouts.master')
@section('title', 'Create Complete Job')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.completejob') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('completejob.index')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{ __('adminstaticword.jobid') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Job" value="">
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="service">{{ __('adminstaticword.service') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="service" id="service" placeholder="Enter service" value="">
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
                                    <label for="product">{{ __('adminstaticword.product') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="product" id="product" placeholder="Enter product" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price">{{ __('adminstaticword.price') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="discount">{{ __('adminstaticword.discount') }}:<sup class="redstar">*</sup></label>
                                    <input type="date" class="form-control" name="discount" id="discount" placeholder="Enter discount" value="">
                                </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('completejob.index')}}" class="btn btn-primary">Back</a>
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
