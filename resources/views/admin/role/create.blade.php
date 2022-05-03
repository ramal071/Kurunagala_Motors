@extends('admin/layouts.master')
@section('title', 'Add Role - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.role') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('role.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
  
        
  

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="exampleInputname" placeholder="Enter your name" value="">
            </div>          
        </div>
        <br>


        <div class="col-md-6">
            <label for="exampleInputDetails">{{ __('adminstaticword.status') }}:</label>
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>          
          <br>

          <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Save">
                <a href="{{route('role.index')}}" class="btn btn-primary">Back</a>
            </div> 
          </div>

      </form>
    </div>
  </section>  
  
  
  @endsection