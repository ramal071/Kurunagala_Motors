@extends('admin/layouts.master')
@section('title', 'Edit Bike')
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
                    <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="code" id="code" value="{{ $bike->code }}">
                  </div>          
              </div>
              <br>

              <div class="row">
                  <div class="col-md-6">
                    <label for="name">{{ __('adminstaticword.bikename') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $bike->name }}">
                  </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="slug">{{ __('adminstaticword.slug') }}:</label>
                  <input type="text" class="form-control" name="slug" id="slug" value="{{ $bike->slug }}">
                </div>          
              </div>
              <br>
        
              <div class="row">
                  <div class="col-md-6">
                    <label for="description">{{ __('adminstaticword.description') }}:</label>
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
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });        
    </script>   
  @endsection
  {{-- /slug --}}
  
  @endsection