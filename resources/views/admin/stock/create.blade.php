@extends('admin/layouts.master')
@section('title', 'Create Stock')
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
            <form id="demo-form2" method="post" action="{{route('stock.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}   

              <div class="row">
                <div class="col-md-6">
                  <label for="product">{{ __('adminstaticword.product') }}</label>
                  <select name="product_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">{{ __('adminstaticword.pleaseselect')}} {{__('adminstaticword.brand')}}</option>
                    @foreach($product as $pr)
                      <option value="{{$pr->id}}">{{$pr->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <br>
  

        <div class="row">
            <div class="col-md-6">
              <label for="quantity">{{ __('adminstaticword.qty') }}:<sup class="redstar">*</sup></label>
              <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity...." value="">
            </div>          
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
              <label for="dealerprice">{{ __('adminstaticword.dprice') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="dealerprice" id="dealerprice" placeholder="Enter dealerprice...." value="">
            </div>          
        </div>
        <br>

        <div class="row">
           <div class="col-md-6">
             <label for="sellingprice">{{ __('adminstaticword.sprice') }}:<sup class="redstar">*</sup></label>
             <input type="text" class="form-control" name="sellingprice" placeholder="Enter selling price...." id="sellingprice" value="">
            </div>          
        </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="discount">{{ __('adminstaticword.discount') }}:<sup class="redstar">*</sup></label>
            <input type="text" class="form-control" name="discount" placeholder="Enter discount...." id="discount" value="">
           </div>          
       </div>
       <br>

       <div class="row">
        <div class="col-md-6">
          <label for="color">{{ __('adminstaticword.color') }}:</label>
          <input type="text" class="form-control" name="color" placeholder="Enter color...." id="color" value="">
         </div>          
     </div>
     <br>

     <div class="row">
      <div class="col-md-6">
        <label for="lowestlimit">{{ __('adminstaticword.lowestlimit') }}:<sup class="redstar">*</sup></label>
        <input type="text" class="form-control" name="lowestlimit" placeholder="Enter lowest limit...." id="lowestlimit" value="">
       </div>          
   </div>
   <br>
  
        <div class="row">
            <div class="col-md-6">
              <label for="description">{{ __('adminstaticword.description') }}:</label>
              <input type="text" class="form-control" name="description" id="description" placeholder="Enter bike Description" value="">
            </div> 
        </div>
        <br>         

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Save">
                <a href="{{route('stock.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  

  
  @endsection