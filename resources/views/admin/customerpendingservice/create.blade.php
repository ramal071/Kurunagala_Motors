@extends('admin/layouts.master')
@section('title', 'Create Pending Service')
@section('body')
    @include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('adminstaticword.pendingservice') }}</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <form id="demo-form2" method="POST" action="{{ route('customerpendingservice.index') }}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="user">{{ __('adminstaticword.idno') }}:<sup
                                                class="redstar">*</sup></label>
                                        <select name="user_id" id="user_id"
                                            class="form-control js-example-basic-single col-md-7 col-xs-12">
                                            <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user->id }}">{{ $user->idno }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputTit1e1">{{ __('adminstaticword.registernumber') }}</label>
                                        <select name="customervehicle_id" id="upload_id"
                                            class="form-control js-example-basic-single col-md-7 col-xs-12">
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                <div class="col-md-6">
                                    <label for="register_number">{{ __('adminstaticword.registernumber') }}:<sup class="redstar">*</sup></label>
                                    <select name="customervehicle_id" id="customervehicle_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                        @foreach ($customervehicle as $customervehicle)
                                        <option value="{{$customervehicle->id}}">{{$customervehicle->register_number}}</option>
                                        @endforeach
                                    </select>
                                 </div>  
                            </div>
                            <br> --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="service">{{ __('adminstaticword.whatareservices') }}:<sup
                                                class="redstar">*</sup></label>
                                        <select name="service_id" id="service_id"
                                            class="form-control js-example-basic-single col-md-7 col-xs-12">
                                            <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                                            @foreach ($service as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="next_date">{{ __('adminstaticword.nextdate') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="date" class="form-control" name="next_date" id="next_date"
                                            placeholder="Enter next date" value="">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="reminder_date">{{ __('adminstaticword.reminderdate') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="date" class="form-control" name="reminder_date" id="reminder_date"
                                            placeholder="Enter reminder date" value="">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-info" value="Save">
                                        <a href="{{ route('customerpendingservice.index') }}"
                                            class="btn btn-primary">Back</a>
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
