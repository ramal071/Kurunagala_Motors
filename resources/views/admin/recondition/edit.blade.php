@extends('admin/layouts.master')
@section('title', 'Edit recondition')
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
            <form id="demo-form2" method="post" action="{{route('recondition.update', $recondition->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="stock">{{ __('adminstaticword.stock') }}</label>
                    <select name="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                      @foreach($stock as $stock)
                        <option value="{{$stock->id}}"
                            @if ($stock->id == $stock->stock_id)
                            selected
                        @endif
                            >{{$stock->id}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              <br>
  
       
  
          <div class="row">
              <div class="col-md-6">
                <label for="name">{{ __('adminstaticword.qty') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name....." value="{{ $recondition->name }}">
              </div>          
          </div>
          <br>
  
          <div class="row">
             <div class="col-md-6">
               <label for="description">{{ __('adminstaticword.description') }}:</sup></label>
               <input type="text" class="form-control" name="description" placeholder="description......" id="description" value="{{ $recondition->description }}">
              </div>          
          </div>
          <br>
    
          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Update">
                <a href="{{route('recondition.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  

  @endsection