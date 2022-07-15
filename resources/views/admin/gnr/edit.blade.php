@extends('admin/layouts.master')
@section('title', 'Edit GNR')
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
            <form id="demo-form2" method="post" action="{{route('gnr.update', $gnr->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                {{ csrf_field() }}
                @method('PUT')

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.product') }}</label>
                  <select name="product_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    @foreach($product as $pr)
                    <option value="{{ $pr->id }}" {{$pr->id  ? 'selected' : ''}}>{{ $pr->brand->name }} {{ $pr->bike->name }} {{$pr->name}}</option>
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
                <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="{{ $gnr->supplier_name }}">
                </div>          
           
            <div class="col-md-6">
                <label for="contact">{{ __('adminstaticword.contact') }}:<sup class="redstar">*</sup></label>
                <input type="tel" class="form-control" name="contact" id="contact" value="{{ $gnr->contact }}">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="email">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
                    <input type="email" class="form-control" name="email" id="discount" value="{{ $gnr->email }}">
                </div>          
           
                <div class="col-md-6">
                    <label for="address">{{ __('adminstaticword.address') }}:</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $gnr->address }}">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="date">{{ __('adminstaticword.date') }}:<sup class="redstar">*</sup></label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $gnr->date }}">
                </div>          
         
                <div class="col-md-6">
                <label for="description">{{ __('adminstaticword.description') }}:</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $gnr->description }}">
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