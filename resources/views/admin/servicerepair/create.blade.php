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
                                        <option value="{{$user->id}}">{{$user->idno}}: {{$user->fname}} {{$user->lname}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                          
                              <div class="col-md-6">
                                <label for="customervehicle_id">{{ __('adminstaticword.registernumber') }}</label>
                                <select name="customervehicle_id" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                </select>
                              </div>
                            </div>
                          <br>

                          <div class="row">
                            <div class="col-md-6">
                                <label for="employee">{{ __('adminstaticword.employee') }}:<sup class="redstar">*</sup></label>
                                <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                    <option value="0">--{{ __('adminstaticword.pleaseselect') }}--</option>
                                    @foreach($employee as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                              </div>  
                            
                         
                            <div class="col-md-6">
                              <label for="email">{{ __('adminstaticword.email') }}:</sup></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder=" email" value="">
                              {{--    fix login user email
                                  @if (auth()->user())
                                      <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                  @else
                                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                  @endif
                                --}}
                            </div>          
                          </div>
                          <br>

                          <div class="row">
                            <div class="col-md-6">
                                <label for="service">{{ __('adminstaticword.service') }}:<sup class="redstar">*</sup></label>
                                <select name="service_id" id="service_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                    <option value="0">--{{ __('adminstaticword.pleaseselect') }}--</option>
                                    @foreach($service as $service)
                                    <option value="{{$service->id}}">{{$service->name}} - price: Rs.{{$service->price}}</option>
                                    @endforeach
                                </select>
                             </div>  

                             <div class="col-md-6">
                              <label for="charge">{{ __('adminstaticword.charge') }}:</label>
                              <input type="number" class="form-control" name="charge" id="charge" placeholder="Enter charge" value="">
                             </div>
                            </div>
                            <br>

                            <div class="box box-primary">

                              <table class="table table_bordered">
                                <thead>
                                  <tr>
                                    <th>product</th>
                                    <th>quantity</th>
                                    <th>action</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <td>
                                    <select name="stock[]" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12 select_dropdown" >
                                      <option value="empty">--{{ __('adminstaticword.pleaseselect') }}--</option>
                                      @foreach($stock as $s)
                                      <option value="{{$s->id}}">{{$s->product->code}}: {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}} price: Rs.{{$s->sellingprice}} qty: {{$s->quantity}} </option>
                                      @endforeach
                                    </select>
                                </td>

                                  <td>
                                    <input type="number" class="form-control" name="qty[]" placeholder="Enter qty">
                                  </td>

                                  <td>
                                    <button type="button" class="btn btn-primary" id="add_btn"> <i class="glyphicon glyphicon-plus"></i></button>
                                  </td>
                                </tbody>

                              </table>
  

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="paid_amount">{{ __('adminstaticword.paidamount') }}:</label>
                                  <input type="number" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter paid_amount" value="">
                                </div>          
                                <div class="col-md-6">
                                  <label for="description">{{ __('adminstaticword.description') }}</label>
                                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="">
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

@section('add-btn')
<script type="text/javascript">
  $(document).ready(function() {
    $('#add_btn').on('click',function(){
   //   alert();
      let length = $('.select_dropdown').length+1;
   var html='';
   html+="<tr>";
   html+='<td><select name="stock[]" id="stock_id" class="form-control js-example-basic-single col-md-7 col-xs-12 select_dropdown" ><option value="0">--{{ __('adminstaticword.pleaseselect') }}--</option>@foreach($stock as $s)<option value="{{$s->id}}">{{$s->product->code}}: {{ $s->product->brand->name }} {{ $s->product->bike->name }} {{$s->product->name}} price: Rs.{{$s->sellingprice}} qty: {{$s->quantity}} </option> @endforeach</select></td>';
   html+='<td><input type="number" class="form-control" name="qty[]" placeholder="Enter qty"></td>';
   html+='<td><button type="button" class="btn btn-primary" id="remove"> <i class="glyphicon glyphicon-remove"></i></button></td>';
   html+="</tr>";
   $('tbody').append(html);
    });
  });

  $(document).on('click','#remove', function(){
   // alert();
   $(this).closest('tr').remove();
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
