@extends('admin/layouts.master')
@section('title', 'Create Recondition Part')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.recondition') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('recondition.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}   
  
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.stock') }}</label>
                  <select name="stock_id" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    @foreach($stock as $stock)
                      <option value="{{$stock->id}}">{{$stock->id}} {{$stock->product->brand->name}} {{$stock->product->bike->name}} {{$stock->product->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              {{-- <div class="row">
                <div class="col-md-6">
                  <label for="stock">{{ __('adminstaticword.product') }}</label>
                  <select name="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    @foreach($stock as $s)
                      <option value="{{$s->id}}">{{$s->id}}: {{$s->brand->name}} {{$s->bike->name}} {{$s->name}}</option>
                    @endforeach
                  </select>
                </div> --}}
              </div>    
    
              <div class="row">
                <div class="col-md-6">
                  <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name....." value="">
                </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="description">{{ __('adminstaticword.description') }}:</sup></label>
                  <input type="text" class="form-control" name="description" placeholder="description......" id="description" value="">
                </div>          
              </div>
              <br>         

              <div class="row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Save">
                  <a href="{{route('recondition.index')}}" class="btn btn-primary">Back</a>
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