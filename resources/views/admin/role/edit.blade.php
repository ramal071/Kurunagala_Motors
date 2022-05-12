@extends('admin/layouts.master')
@section('title', 'Edit Role - Admin')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
      <div class="col-xs-12">
  
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.editrole') }}</h3>
          </div>
         
          <div class="panel-body">
  
            <form id="demo-form2" method="post" action="{{route('role.update', $role->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

  
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="name" id="exampleInputname" value="{{ $role->name }}">
                </div>              
              </div>  
            </br>

          <div class="row">
          <div class="col-md-6">
            <label for="exampleInputTit1e">{{ __('adminstaticword.status') }}:</label>           
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" {{ $role->status == '1' ? 'checked' : '' }} >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="status" id="status">
          </div>
        </div>
        </br>
         
              <div class="row box-footer">
                <button type="submit" class="btn btn-md col-lg-2 btn-primary">{{ __('adminstaticword.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  