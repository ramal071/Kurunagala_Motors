@extends('admin/layouts.master')
@section('title', 'Create Cashier - Admin')
@section('body')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.cashier') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('cashier.store')}}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
  
        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="name" id="exampleInputname" placeholder="Enter name" value="">
            </div>          
        </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputTit1e">{{ __('adminstaticword.idno') }}:<sup class="redstar">*</sup></label>
            <input type="text" class="form-control" name="idno" id="exampleInputname" placeholder="Enter ID" value="">
          </div>          
      </div>
      <br>

      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputTit1e">{{ __('adminstaticword.password') }}:<sup class="redstar">*</sup></label>
          <input type="text" class="form-control" name="password" id="exampleInputname" placeholder="Enter password" value="">
        </div>          
    </div>
    <br>

        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="email" id="exampleInputname" placeholder="Enter email" value="">
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
                <a href="{{route('cashier.index')}}" class="btn btn-primary">Back</a>
            </div> 


      </form>
    </div>
  </section>  
  
  
  @endsection