@extends('admin/layouts.master')
@section('title', 'Create service repair')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.servicerepair') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('servicerepair.index')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                                    <select name="user_id" id="user_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($user as $user)
                                        <option value="{{$user->id}}">{{$user->idno}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                                    <select name="customervehicle_id" id="customervehicle_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($customervehicle as $customervehicle)
                                        <option value="{{$customervehicle->id}}">{{$customervehicle->register_number}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="service">{{ __('adminstaticword.whatareservices') }}:<sup class="redstar">*</sup></label>
                                    <select name="service_id" id="service_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($service as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="product">{{ __('adminstaticword.product') }}:<sup class="redstar">*</sup></label>
                                    <select name="product_id" id="product_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($product as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="stock">{{ __('adminstaticword.stock') }}:<sup class="redstar">*</sup></label>
                                    <select name="stock_id" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($stock as $stock)
                                        <option value="{{$stock->id}}">{{$stock->id}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputTit1e">{{ __('adminstaticword.employee') }}</label>
                                  <select name="employee[]" class="form-control js-example-basic-single col-md-7 col-xs-12">
                                    <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                    @foreach($employee as $employee)
                                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="paid_amount">{{ __('adminstaticword.paidamount') }}:<sup class="redstar">*</sup></label>
                                  <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter paid_amount" value="">
                                </div>          
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="amount">{{ __('adminstaticword.amount') }}:<sup class="redstar">*</sup></label>
                                  <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="">
                                </div>          
                            </div>
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.status') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.repaircomplete') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_repaircomplete" type="checkbox" name="is_repaircomplete" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_repaircomplete"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.borrow') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_borrow" type="checkbox" name="is_borrow" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_borrow"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.complete') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_complete" type="checkbox" name="is_complete" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_complete"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>


                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('servicerepair.index')}}" class="btn btn-primary">Back</a>
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
