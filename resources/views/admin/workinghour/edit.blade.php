@extends('admin/layouts.master')
@section('title', 'Edit Working Hours')
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
            <form id="demo-form2" method="post" action="{{route('workinghour.update', $workinghour->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                      <label for="day">{{ __('adminstaticword.day') }}:<sup class="redstar">*</sup></label>
                      <input type="text" class="form-control" name="day" id="day" value="{{ $workinghour->day }}">
                    </div>          
                  </div>
                  <br>
    
                  <div class="row">
                    <div class="col-md-3">
                      <label for="from">{{ __('adminstaticword.from') }}:<sup class="redstar">*</sup></label>
                      <input type="time" class="form-control" name="from" id="from" value="{{ $workinghour->from }}">
                    </div>          
              
                    <div class="col-md-3">
                      <label for="to">{{ __('adminstaticword.to') }}:<sup class="redstar">*</sup></label>
                      <input type="time" class="form-control" name="to" id="to" value="{{ $workinghour->to }}">
                    </div>          
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-info" value="Update">
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