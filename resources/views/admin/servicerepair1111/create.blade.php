@extends('admin/layouts.master')
@section('title', 'Create service repair')
@section('body')
@include('admin.message')

@section('stylesheets')
@endsection

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.servicerepair') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('servicerepair.index')}}">
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

                            <div class="row">
                              <div class="col-md-6">
                                <label for="customervehicle_id">{{ __('adminstaticword.registernumber') }}</label>
                                <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                </select>
                              </div>
                            </div>
                          <br>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputTit1e">{{ __('adminstaticword.service') }}</label>
                                  <select name="service[]" class="form-control service" multiple="multiple">
                                    <option value="0"></option>
                                    @foreach($service as $s)
                                      <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            <br>

                            <div class="row">
                              <div class="col-md-6">
                                <label for="stock">{{ __('adminstaticword.stock') }}</label>
                                <select name="stock[]" class="form-control stock" multiple="multiple">
                                  <option value="0"></option>
                                  @foreach($stock as $s)
                                    <option value="{{$s->id}}">{{$s->id}}: {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputTit1e">{{ __('adminstaticword.employee') }}</label>
                                  <select name="employee[]" class="form-control employee" multiple="multiple">
                                    <option value="0"></option>
                                    @foreach($employee as $employee)
                                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="paid_amount">{{ __('adminstaticword.paidamount') }}:<sup class="redstar">*</sup></label>
                                  <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter paid_amount" value="">
                                </div>          
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="amount">{{ __('adminstaticword.amount') }}:<sup class="redstar">*</sup></label>
                                  <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="">
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

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.repaircomplete') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_repaircomplete" type="checkbox" name="is_repaircomplete" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_repaircomplete"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.borrow') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_borrow" type="checkbox" name="is_borrow" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_borrow"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>

                            
                            <div class="col-md-6">
                                <div class="col-md-6">
                                  <label for="exampleInputDetails">{{ __('adminstaticword.complete') }}:</label>
                                  <li class="tg-list-item">              
                                    <input class="tgl tgl-skewed" id="is_complete" type="checkbox" name="is_complete" >
                                    <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="is_complete"></label>
                                  </li>
                                </div>
                            </div>          
                            <br>


                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-info" value="Save">
                                    <a href="{{route('servicerepair.index')}}" class="btn btn-primary">Back</a>
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
$(document).ready(function() {
    $('.employee').select2();
  });
  </script>
@endsection

@section('service_scripts')
<script>
$(document).ready(function() {
    $('.service').select2();
  });
  </script>
@endsection

@section('stock')
<script>
$(document).ready(function() {
    $('.stock').select2();
  });
  </script>
@endsection



@section('regnum_scripts')
<script>
  (function($) {
      "use strict";

      $(function() {
          var urlLike = '{{ route('admin-dropdown2') }}';
          $('#user_id').change(function() {
              var up = $('#upload_id').empty();
              var pr_id1 = $(this).val();
              if (pr_id1) {
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type: "GET",
                      url: urlLike,
                      data: {
                          prId1: pr_id1
                      },
                      success: function(data) {
                          up.append('<option value="0">Please Choose</option>');
                          $.each(data, function(id, title) {
                              //   console.log(data.id);
                              up.append($('<option>', {
                                  value: title.id,
                                  text: title.register_number,
                              }));
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
