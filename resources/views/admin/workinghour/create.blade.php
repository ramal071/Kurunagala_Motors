@extends('admin/layouts.master')
@section('title', 'Create working hour ')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.workinghour') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('workinghour.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}    
              
              <div class="row">
                <div class="col-md-6">
                  <label for="day">{{ __('adminstaticword.day') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="day" id="day" placeholder="Enter day" value="">
                </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-3">
                  <label for="from">{{ __('adminstaticword.from') }}:<sup class="redstar">*</sup></label>
                  <input type="time" class="form-control" name="from" id="from" placeholder="Enter from" value="">
                </div>          
      
                <div class="col-md-3">
                  <label for="to">{{ __('adminstaticword.to') }}:<sup class="redstar">*</sup></label>
                  <input type="time" class="form-control" name="to" id="to" placeholder="Enter to" value="">
                </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Save">
                  <a href="{{route('workinghour.index')}}" class="btn btn-primary">Back</a>
                </div> 
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection