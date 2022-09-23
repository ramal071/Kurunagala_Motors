@extends('admin/layouts.master')
@section('title', 'Edit Stock')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.stock') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('stock.update', $stock->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.product') }}</label>
                    <select name="product_id" class="form-control js-example-basic-single col-md-7 col-xs-12" disabled>
                      @foreach($product as $pr)
                      <option value="{{ $pr->id }}" {{$stock->product_id == $pr->id  ? 'selected' : ''}}>{{ $pr->brand->name }} {{ $pr->bike->name }} {{$pr->name}}</option>
                     @endforeach
                    </select>
                  </div>
         
                  <div class="col-md-6">
                    <label for="quantity">{{ __('adminstaticword.qty') }}:<sup class="redstar">*</sup></label>
                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $stock->quantity }}">
                  </div>          
               </div>
              <br>
      
              <div class="row">
                  <div class="col-md-6">
                    <label for="dealerprice">{{ __('adminstaticword.dprice') }}:<sup class="redstar">*</sup></label>
                    <input type="double" class="form-control" name="dealerprice" id="dealerprice" value="{{ $stock->dealerprice }}">
                  </div>          
       
                 <div class="col-md-6">
                   <label for="sellingprice">{{ __('adminstaticword.sprice') }}:<sup class="redstar">*</sup></label>
                   <input type="double" class="form-control" name="sellingprice" id="sellingprice" value="{{ $stock->sellingprice }}">
                  </div>          
              </div>
              <br>
      
              <div class="row">
                <div class="col-md-6">
                  <label for="lowestlimit">{{ __('adminstaticword.lowestlimit') }}:<sup class="redstar">*</sup></label>
                  <input type="number" class="form-control" name="lowestlimit" id="lowestlimit" value="{{ $stock->lowestlimit }}">
                 </div>          
        
              <div class="col-md-6">
                <label for="color">{{ __('adminstaticword.color') }}:</label>
                <input type="color" class="form-control" name="color" id="color" value="{{ $stock->color }}">
               </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                  <label for="description">{{ __('adminstaticword.description') }}:</label>
                  <input type="textarea" class="form-control" name="description" id="description" value="{{ $stock->description }}">
                </div> 
            </div>
            <br>       

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Update">
                <a href="{{route('stock.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  

  @endsection