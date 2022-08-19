@extends('admin/layouts.master')
@section('title', 'Create GNR')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.gnr') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('gnr.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}   

              <div class="row">
                <div class="col-md-6">
                  <label for="product">{{ __('adminstaticword.product') }}</label>
                  <select name="product_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">{{ __('adminstaticword.pleaseselect')}} {{__('adminstaticword.product')}}</option>
                    @foreach($product as $pr)
                      <option value="{{$pr->id}}">{{ $pr->brand->name }} {{ $pr->bike->name }} {{$pr->name}}</option>
                    @endforeach
                  </select>
                </div>
             
                <div class="col-md-6">
               
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                <label for="supplier_name">{{ __('adminstaticword.suppliername') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name" placeholder="Enter supplier name...." value="">
                </div>          
           
            <div class="col-md-6">
                <label for="contact">{{ __('adminstaticword.contact') }}:<sup class="redstar">*</sup></label>
                <input type="tel" class="form-control" name="contact" placeholder="Enter contact...." id="contact" value="">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="email">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email...." id="discount" value="">
                </div>          
           
                <div class="col-md-6">
                    <label for="address">{{ __('adminstaticword.address') }}:</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter address...." id="color" value="">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="date">{{ __('adminstaticword.date') }}:<sup class="redstar">*</sup></label>
                    <input type="date" class="form-control" name="date" placeholder="Enter date...." max="{{date('Y-m-d')}}" id="date" value="">
                </div>          
         
                <div class="col-md-6">
                <label for="description">{{ __('adminstaticword.description') }}:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter description ..." value="">
                </div> 
            </div>
            <br>         

            <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Save">
                    <a href="{{route('gnr.index')}}" class="btn btn-primary">Back</a>
                </div> 
            </div>
      </form>
    </div>
  </section>  

  
  @endsection