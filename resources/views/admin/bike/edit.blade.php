@extends('admin/layouts.master')
@section('title', 'Edit Bike - Admin')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.bike') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('bike.update', $bike->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')


                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                    <select name="brand_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                      @foreach($brand as $br)
                        <option value="{{$br->id}}"
                            @if ($br->id == $bike->brand_id)
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
              <input type="text" class="form-control" name="code" id="exampleInputbikecode" value="{{ $bike->code }}">
            </div>          
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.bikename') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="exampleInputbikename" value="{{ $bike->name }}">
            </div>          
        </div>
        <br>
  
        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.description') }}:</label>
              <input type="text" class="form-control" name="description" id="exampleInputDescription" value="{{ $bike->description }}">
            </div> 
        </div>         
          <br>

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Update">
                <a href="{{route('bike.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  
  
  
  @endsection