@extends('admin/layouts.master')
@section('title', 'Edit Employee')
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
              <form id="demo-form2" method="post" action="{{route('employee.update', $employee->id)}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                {{ csrf_field() }}
                @method('PUT')

    
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="name" id="exampleInputname" value="{{ $employee->name }}">
              </div>          
          </div>
          <br>
  
          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.role') }}</label>
              <select name="roles[]" class="form-control js-example-basic-single col-md-7 col-xs-12">
               
                @foreach($roles as $r)
                  <option value="{{$r->id}}"
                    @if($r->id == $employee->role_id)
                    selected
                    @endif
                    >{{$r->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <br>
  
          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.nickname') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="nick_name" id="exampleInputname" value="{{ $employee->nick_name }}">
            </div>          
        </div>
        <br>
  
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.phone') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="phone" id="exampleInputname" value="{{ $employee->phone }}">
              </div>          
          </div>
          <br>
  
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.address') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="address" id="exampleInputname" value="{{ $employee->address }}">
              </div>          
          </div>
          <br>


          <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.empimage') }}:<sup class="redstar">*</sup></label>
              <input type="file" class="form-control" name="emp_image" id="emp_image">
              @if ($employee->emp_image)
              <div class="col-md-3"></div>
              <div class="col-md-9">
                <img src="{{ asset('storage/employee/'.$employee->emp_image) }}" style="width: 150px;">
              </div>
          @endif
            </div>          
        </div>
        <br>
 
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.idfront') }}:<sup class="redstar">*</sup></label>
                <input type="file" class="form-control" name="id_front" id="id_front">
                @if ($employee->id_front)
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                      <img src="{{ asset('storage/employee/'.$employee->id_front) }}" style="width: 150px;">
                    </div>
                @endif
              </div>          
          </div>
          <br>
  
          <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e">{{ __('adminstaticword.idback') }}:<sup class="redstar">*</sup></label>
                <input type="file" class="form-control" name="id_back" id="id_back">
              @if ($employee->id_back)
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                      <img src="{{ asset('storage/employee/'.$employee->id_back) }}" style="width: 150px;">
                    </div>
                @endif
              </div>          
          </div>
          <br>
  
          <div class="col-md-6">
            <label for="exampleInputDetails">{{ __('adminstaticword.status') }}:</label>
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status"  {{ $employee->status == '1' ? 'checked' : '' }} >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>
        </br>
    
              <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Update">
                  <a href="{{route('employee.index')}}" class="btn btn-primary">Back</a>
              </div> 
  
  
        </form>
      </div>
    </section>  
    
    
    @endsection