@extends('admin/layouts.master')
@section('title', 'Create Product')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.product') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('product.store')}}"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }} 

              
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                <select name="brand_id" id="brand_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                  <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                  @foreach($brand as $br)
                    <option value="{{$br->id}}">{{$br->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          <br>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e1">{{ __('adminstaticword.bike') }}</label>
                <select name="bike_id" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                </select>
              </div>
            </div>
          <br>

        <div class="row">
            <div class="col-md-6">
              <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="code" id="code" placeholder="Enter bike product code" value="" >
            </div>          
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
              <label for="name">{{ __('adminstaticword.productname') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="name" >
            </div>          
        </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="product_image">{{ __('adminstaticword.image') }}:<sup class="redstar">*</sup></label>
            <input type="file" class="form-control" name="product_image" id="product_image" placeholder="product image" value="">
          </div>          
        </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="slug">{{ __('adminstaticword.slug') }}:</label>
            <input type="text" class="form-control" name="slug" id="slug" >
          </div>          
        </div>
        <br>
  
        <div class="row">
            <div class="col-md-6">
              <label for="description">{{ __('adminstaticword.description') }}:</label>
              <input type="text" class="form-control" name="description" id="description" >
            </div> 
        </div>
        <br>        
        
        <div class="col-md-6">
          <div class="col-md-6">
            <label for="exampleInputDetails">{{ __('adminstaticword.status') }}:</label>
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>
        </div>          
          <br>  

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Save">
                <a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  
  
  
  @endsection


  

@section('scripts')

<script>
(function($) {
  "use strict";

  $(function() {
    var urlLike = '{{ route('admin-dropdown') }}';
    $('#brand_id').change(function() {
      var up = $('#upload_id').empty();
      var pr_id = $(this).val();    
      if(pr_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {prId: pr_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

})(jQuery);
</script> 

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