@extends('admin/layouts.master')
@section('title', 'Create Damage Part')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.damage') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('damage.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}   
  
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.stock') }}</label>
                  <select name="stock_id" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                    @foreach($stock as $stock)
                      <option value="{{$stock->id}}"> {{$stock->product->brand->name}} {{$stock->product->bike->name}} {{$stock->product->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>     

              <div class="row">
                  <div class="col-md-6">
                    <label for="quantity">{{ __('adminstaticword.qty') }}:<sup class="redstar">*</sup></label>
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity....." value="">
                  </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="reason">{{ __('adminstaticword.reason') }}:</sup></label>
                  <input type="text" class="form-control" name="reason" placeholder="reason......" id="reason" value="">
                  </div>          
              </div>
              <br>
        
              <div class="col-md-6">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.isreturn') }}:</label>
                  <li class="tg-list-item">              
                    <input class="tgl tgl-skewed" id="is_return" type="checkbox" name="is_return" >
                    <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="is_return"></label>
                  </li>
                </div>
              </div>          
              <br>         

              <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Save">
                    <a href="{{route('damage.index')}}" class="btn btn-primary">Back</a>
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