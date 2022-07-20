@extends('admin/layouts.master')
@section('title', 'Edit Product')
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
            <form id="demo-form2" method="post" action="{{route('product.update', $product->id)}}"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
              @method('PUT')

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.brand') }}</label>
                  <select name="brand_id" id="brand_id" class="form-control js-example-basic-single">
                    @php
                      $brand = App\brand::all();
                    @endphp  
                    @foreach($brand as $caat)
                      <option {{ $product->brand_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                    @endforeach 
                  </select>
                </div>
         
                <div class="col-md-6">
                  <label for="exampleInputTit1e1">{{ __('adminstaticword.bike') }}</label>
                  <select name="bike_id" id="upload_id" class="form-control js-example-basic-single">
                    @php
                      $bike = App\Bike::all();
                    @endphp  
                    @foreach($bike as $caat)
                      <option {{ $product->bike_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>
            <br>      

            <div class="row">
                <div class="col-md-6">
                  <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="code" id="code" value=" {{ $product->code }}">
                </div>          
        
                <div class="col-md-6">
                  <label for="name">{{ __('adminstaticword.productname') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="name" id="name" value=" {{ $product->name }}">
                </div>          
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label for="slug">{{ __('adminstaticword.slug') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="slug" id="slug" value=" {{ $product->slug }}">
              </div>          

              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.productimage') }}:<sup class="redstar">*</sup></label>
                <input type="file" class="form-control" name="product_image" id="product_image">
                @if ($product->product_image)
                <div class="col-md-3"></div>
                <div class="col-md-9">
                  <img src="{{ asset('storage/product/'.$product->product_image) }}" style="width: 150px;">
                </div>
            @endif
              </div>          
          </div>
          <br>
      
            <div class="row">
                <div class="col-md-6">
                  <label for="description">{{ __('adminstaticword.description') }}:</label>
                  <input type="text" class="form-control" name="description" id="description" value=" {{ $product->description }}">
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


  {{-- Dynamic Dropdown --}}
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
  {{-- Dynamic Dropdown --}}
  
  @endsection
