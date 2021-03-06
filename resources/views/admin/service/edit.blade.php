@extends('admin/layouts.master')
@section('title', 'Edit service type')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.service ') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('service.update', $service->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                  <div class="row">
                      <div class="col-md-6">
                        <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="code" id="code" value="{{ $service->code }}">
                      </div>          
                  </div>
                  <br>

                  <div class="row">
                      <div class="col-md-6">
                        <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}">
                      </div>          
                  </div>
                  <br>     
                 
                    {{-- <div class="row">
                      <div class="col-md-6">
                        <label for="exampleInputTit1e">{{ __('adminstaticword.servicetype') }}</label>
                        <select name="servicetype_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                          @foreach($servicetype as $servicetype)
                            <option value="{{$servicetype->id}}"
                                @if ($servicetype->id == $service->servicetype_id)
                                selected
                            @endif
                                >{{$servicetype->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <br> --}}

                    <div class="row">
                      <div class="col-md-6">
                        <label for="price">{{ __('adminstaticword.price') }}:</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $service->price }}">
                      </div> 
                  </div>         
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="description">{{ __('adminstaticword.description') }}:</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $service->description }}">
                      </div> 
                  </div>         
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                          <input type="submit" class="btn btn-info" value="Update">
                          <a href="{{route('service.index')}}" class="btn btn-primary">Back</a>
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