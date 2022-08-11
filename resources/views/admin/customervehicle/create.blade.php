@extends('admin/layouts.master')
@section('title', 'Register Customer Bike')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.bikeregister') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('customervehicle.index')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                                    <select name="user_id" id="user_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($user as $user)
                                        <option value="{{$user->id}}">{{$user->idno}} - {{$user->fname}} {{$user->lname}} </option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="register_number" id="register_number" placeholder="Enter name" value="{{ old('register_number') }}">
                                </div> 
                            </div>
                            <br>

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
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('customervehicle.index')}}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

@endsection
