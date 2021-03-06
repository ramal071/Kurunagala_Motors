@extends('admin/layouts.master')
@section('title', 'Create service type')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.service') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('service.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}     

              <div class="row">
                <div class="col-md-6">
                  <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="code" id="code" placeholder="Enter service code" value="">
                </div>          
              </div>
              <br>

              <div class="row">
                  <div class="col-md-6">
                    <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Service name" value="">
                  </div>          
              </div>
              <br>
{{-- 
              <div class="row">
                <div class="col-md-6">
                  <label for="servicetype">{{ __('adminstaticword.brand') }}</label>
                  <select name="servicetype_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                    @foreach($servicetype as $servicetype)
                      <option value="{{$servicetype->id}}">{{$servicetype->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <br> --}}

              <div class="row">
                <div class="col-md-6">
                  <label for="price">{{ __('adminstaticword.price') }}:</label>
                  <input type="text" class="form-control" name="price" id="price" placeholder="Enter service price" value="">
                </div> 
            </div>
            <br>    

              <div class="row">
                  <div class="col-md-6">
                    <label for="description">{{ __('adminstaticword.description') }}:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter service Description" value="">
                  </div> 
              </div>
              <br>         

              <div class="row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Save">
                  <a href="{{route('service.index')}}" class="btn btn-primary">Back</a>
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