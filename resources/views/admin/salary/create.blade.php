@extends('admin/layouts.master')
@section('title', 'Create Pending Payment')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.pendingpayment') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('pendingpayment.index')}}">
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
                                    <label for="email">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="">
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contact">{{ __('adminstaticword.contact') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact" value="">
                                </div> 
                            </div>
                            <br>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price">{{ __('adminstaticword.price') }} :<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="">
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
                                    <a href="{{route('pendingpayment.index')}}" class="btn btn-primary">Back</a>
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
