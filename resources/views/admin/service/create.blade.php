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
                  <input type="text" class="form-control" name="code" id="code" placeholder="Enter service code" value="{{ old('code') }}">
                </div>          
              </div>
              <br>

              <div class="row">
                  <div class="col-md-6">
                    <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Service name" value="{{ old('name') }}">
                  </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="price">{{ __('adminstaticword.price') }}:</label>
                  <input type="number" class="form-control" name="price" id="price" placeholder="Enter service price" value="{{ old('price') }}">
                </div> 
            </div>
            <br>    

              <div class="row">
                  <div class="col-md-6">
                    <label for="description">{{ __('adminstaticword.description') }}:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter service Description" value="{{ old('description') }}">
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