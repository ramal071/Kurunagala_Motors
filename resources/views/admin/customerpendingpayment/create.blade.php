@extends('admin/layouts.master')
@section('title', 'Create Pending Payment')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.pendingpayment') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('customerpendingpayment.index')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
                                    <select name="user_id" id="user_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($user as $user)
                                        <option value="{{$user->id}}">{{$user->idno}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputTit1e1">{{ __('adminstaticword.registernumber') }}</label>
                                    <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                    </select>
                                </div> 
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                                    <select name="customervehicle_id" id="customervehicle_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($customervehicle as $customervehicle)
                                        <option value="{{$customervehicle->id}}">{{$customervehicle->register_number}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>                               
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="service">{{ __('adminstaticword.whatareservices') }}:<sup class="redstar">*</sup></label>
                                    <select name="service_id" id="service_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach($service as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price">{{ __('adminstaticword.price') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="">
                                </div>  
                            </div>
                            <br> 
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('customerpendingpayment.index')}}" class="btn btn-primary">Back</a>
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
    var urlLike = '{{ route('admin-dropdown1') }}';
    $('#user_id').change(function() {
      var up = $('#upload_id').empty();
      var pr_id1 = $(this).val();    
      if(pr_id1){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {prId1: pr_id1},
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
