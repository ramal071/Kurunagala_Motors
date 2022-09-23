@extends('admin/layouts.master')
@section('title', 'Create allowance')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.allowance') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="POST" action="{{ route('allowance.store')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="employee">{{ __('adminstaticword.employee') }}</label>
                                    <select name="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                                        <option value="0">--{{ __('adminstaticword.pleaseselect') }}-- </option>
                                    @foreach($employee as $br)
                                        <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                           
                                <div class="col-md-6">
                                    <label for="allowance_type">{{ __('adminstaticword.allowance_type') }}:</label>
                                    <select name="allowance_type"  class="form-control" id="allowance_type">
                                        <option value="0">--{{ __('adminstaticword.pleaseselect') }}-- </option>
                                        <option value="Medical">Medical allowance</option>
                                        <option value="Transport">Transport allowance</option>
                                        <option value="Other">Other allowance</option>
                                    </select>
                            
                                </div>  
                            </div>
                            <br>  

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="allowance">{{ __('adminstaticword.allowance') }}:</label>
                                    <input type="number" class="form-control" name="allowance" id="allowance" placeholder="allowance..." value="{{ old('allowance') }}">
                                </div>  

                                <div class="col-md-6">
                                    <label for="description">{{ __('adminstaticword.description') }}:</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="description..." value="{{ old('description') }}">
                                </div>  
                            </div>
                        <br>  

                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-info" value="Save">
                                <a href="{{route('allowance.index')}}" class="btn btn-primary">Back</a>
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
