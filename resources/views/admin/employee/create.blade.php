@extends('admin/layouts.master')
@section('title', 'Create Employee')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.employee') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('employee.store')}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
  
            <div class="row">
                <div class="col-md-6">
                  <label for="name">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ old('name') }}">
                </div>          
           
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.role') }}</label>
                <select name="roles[]" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                  @foreach($roles as $r)
                    <option value="{{$r->id}}">{{$r->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          <br>

            <div class="row">
              <div class="col-md-6">
                <label for="nick_name">{{ __('adminstaticword.nickname') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="nick_name" id="exampleInputname" placeholder="Enter nick name" value="{{ old('nick_name') }}">
              </div>          
         
                <div class="col-md-6">
                  <label for="phone">{{ __('adminstaticword.phone') }}:<sup class="redstar">*</sup></label>
                  <input type="tel" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" class="form-control" name="phone" id="phone" placeholder="123-45-678" value="{{ old('phone') }}">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                  <label for="address">{{ __('adminstaticword.address') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="{{ old('address') }}">
                </div>          
           
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.image') }}:<sup class="redstar">*</sup></label>
                  <input type="file" class="form-control" name="emp_image" id="emp_image" placeholder="Employee image" value="{{ old('emp_image') }}">
                </div>          
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.idfront') }}:<sup class="redstar">*</sup></label>
                  <input type="file" class="form-control" name="id_front" id="id_front" placeholder="Enter id front " value="{{ old('id_front') }}">
                </div>          
         
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.idback') }}:<sup class="redstar">*</sup></label>
                  <input type="file" class="form-control" name="id_back" id="id_back" placeholder="Enter id back " value="{{ old('id_back') }}">
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
                <input type="submit" class="btn btn-info" value="Save">
                <a href="{{route('employee.index')}}" class="btn btn-primary">Back</a>
            </div> 


      </form>
    </div>
  </section>  
  
  
  @endsection