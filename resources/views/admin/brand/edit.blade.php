@extends('admin/layouts.master')
@section('title', 'Edit Brand')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.brand') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('brand.update', $brand->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                  <div class="row">
                      <div class="col-md-6">
                        <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="code" id="exampleInputbrandcode" value="{{ $brand->code }}">
                      </div>          
                  </div>
                  <br>

                  <div class="row">
                      <div class="col-md-6">
                        <label for="name">{{ __('adminstaticword.brandname') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $brand->name }}">
                      </div>          
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="slug">{{ __('adminstaticword.slug') }}:</label>
                      <input type="text" class="form-control" name="slug" id="slug" value="{{ $brand->slug }}">
                    </div>          
                  </div>
                  <br>
            
                  <div class="row">
                      <div class="col-md-6">
                        <label for="description">{{ __('adminstaticword.description') }}:</label>
                        <input type="text" class="form-control" name="description" id="exampleInputDescription" value="{{ $brand->description }}">
                      </div> 
                  </div>         
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                          <input type="submit" class="btn btn-info" value="Update">
                          <a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
                      </div> 
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  {{-- slug --}}

@section('js_slug_page')
<script>
        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });
        
    </script>   
  @endsection
  {{-- /slug --}}

  @endsection