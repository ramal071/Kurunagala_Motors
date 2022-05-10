@extends('admin/layouts.master')
@section('title', 'Edit Product - Admin')
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
          <h3 class="box-title">{{ __('adminstaticword.product') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('product.update', $product->id)}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }} 
              @method('PUT')
           
              {{-- <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e1">{{ __('adminstaticword.bike') }}</label>
                  <select name="bike_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    @foreach($bike as $b)
                      <option value="{{$b->id}}"
                        @if ($b->id == $product->bike_id)
                            selected
                        @endif
                        >{{$b->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                <select name="brand_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  @foreach($brand as $br)
                    <option value="{{$br->id}}"
                        @if ($br->id == $product->brand_id)
                        selected
                    @endif
                        >{{$br->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          <br> --}}

          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e1">{{ __('adminstaticword.bike') }}</label>
              <select name="bike_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                @foreach($bike as $b)
                  <option value="{{$b->id}}"
                    @if ($b->id == $product->bike_id)
                        selected
                    @endif
                    >{{$b->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
            <select name="brand_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
              @foreach($brand as $br)
                <option value="{{$br->id}}"
                    @if ($br->id == $product->brand_id)
                    selected
                @endif
                    >{{$br->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="code" id="exampleInputproductcode" value=" {{ $product->code }}">
            </div>          
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.productname') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="exampleInputbrandname" value=" {{ $product->name }}">
            </div>          
        </div>
        <br>
  
        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.limit') }}:</label>
              <input type="number" class="form-control" name="limit" id="exampleInputDescription" value=" {{ $product->limit }}">
            </div> 
        </div>
        <br>        
        
        <div class="col-md-6">
          <div class="col-md-6">
            <label for="exampleInputDetails">{{ __('adminstaticword.status') }}:</label>
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status"  {{ $product->status == '1' ? 'checked' : '' }}>
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>
        </div>          
          <br>  

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Update">
                <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  
  
  
  @endsection