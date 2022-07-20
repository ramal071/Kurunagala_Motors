@extends('admin/layouts.master')
@section('title', 'Edit damage')
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
            <form id="demo-form2" method="post" action="{{route('damage.update', $damage->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                    <select name="stock_id" id="stock_id" class="form-control js-example-basic-single">
                      @php
                        $stock = App\Stock::all();
                      @endphp  
                      @foreach($stock as $s)
                        <option {{ $damage->stock_id == $s->id ? 'selected' : "" }} value="{{ $s->id }}">{{$s->product->bike->name}} {{$s->product->name}}</option>
                      @endforeach 
                    </select>
                  </div>
                </div>
              <br>
              
          <div class="row">
              <div class="col-md-6">
                <label for="quantity">{{ __('adminstaticword.qty') }}:<sup class="redstar">*</sup></label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity....." value="{{ $damage->quantity }}">
              </div>          
          </div>
          <br>
  
          <div class="row">
             <div class="col-md-6">
               <label for="reason">{{ __('adminstaticword.reason') }}:</sup></label>
               <input type="text" class="form-control" name="reason" placeholder="reason......" id="reason" value="{{ $damage->reason }}">
              </div>          
          </div>
          <br>
    
          <div class="col-md-6">
            <div class="col-md-6">
              <label for="is_return">{{ __('adminstaticword.isreturn') }}:</label>
              <li class="tg-list-item">              
                <input class="tgl tgl-skewed" id="is_return" type="checkbox" name="is_return"  {{ $damage->is_return == '1' ? 'checked' : '' }}>
                <label class="tgl-btn" data-tg-off="No" data-tg-on="Yes" for="is_return"></label>
              </li>
            </div>
          </div>          
            <br>     
  
          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Update">
                <a href="{{route('damage.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  

  @endsection