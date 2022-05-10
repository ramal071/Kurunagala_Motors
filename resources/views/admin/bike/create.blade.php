@extends('admin/layouts.master')
@section('title', 'Add Bike - Admin')
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.bike') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('bike.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
  
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                  <select name="brand_id"class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                    @foreach($brand as $br)
                      <option value="{{$br->id}}">{{$br->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="code" id="exampleInputbikecode" placeholder="Enter your bike code" value="" >
            </div>          
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.bikename') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="exampleInputbikename" placeholder="Enter your bike name" value="">
            </div>          
        </div>
        <br>
  
        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.description') }}:</label>
              <input type="text" class="form-control" name="description" id="exampleInputDescription" placeholder="Enter your Description" value="">
            </div> 
        </div>
        <br>         

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Save">
                <a href="{{route('bike.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  
  
  
  @endsection