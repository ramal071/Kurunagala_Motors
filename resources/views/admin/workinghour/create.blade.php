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

              {{-- <div class="row">
                <div class="col-md-6">
                  <label for="day">{{ __('adminstaticword.day') }}:<sup class="redstar">*</sup></label>
                  <select class="form-control day" name="day">
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>
                 </select>
                </div>          
              </div>
              <br>

              <div class="row">
                  <div class="col-md-3">
                    <label for="from">{{ __('adminstaticword.from') }}:<sup class="redstar">*</sup></label>
                    <select class="form-control from" name="from">
                      <option value="0">12:00 AM</option>
												<option value="1">1:00 AM</option>
												<option value="2">2:00 AM</option>
												<option value="3">3:00 AM</option>
												<option value="4">4:00 AM</option>
												<option value="5">5:00 AM</option>
												<option value="6">6:00 AM</option>
												<option value="7">7:00 AM</option>
												<option value="8">8:00 AM</option>
												<option value="9">9:00 AM</option>
												<option value="10">10:00 AM</option>
												<option value="11">11:00 AM</option>
												<option value="12">12:00 PM</option>
												<option value="13">1:00 PM</option>
												<option value="14">2:00 PM</option>
												<option value="15">3:00 PM</option>
												<option value="16">4:00 PM</option>
												<option value="17">5:00 PM</option>
												<option value="18">6:00 PM</option>
												<option value="19">7:00 PM</option>
												<option value="20">8:00 PM</option>
												<option value="21">9:00 PM</option>
												<option value="22">10:00 PM</option>
												<option value="23">11:00 PM</option>
                   </select>
                  </div>          
            
                <div class="col-md-3">
                  <label for="to">{{ __('adminstaticword.to') }}:<sup class="redstar">*</sup></label>
                  <select class="form-control to" name="to">
                    <option value="0">12:00 AM</option>
                    <option value="1">1:00 AM</option>
                    <option value="2">2:00 AM</option>
                    <option value="3">3:00 AM</option>
                    <option value="4">4:00 AM</option>
                    <option value="5">5:00 AM</option>
                    <option value="6">6:00 AM</option>
                    <option value="7">7:00 AM</option>
                    <option value="8">8:00 AM</option>
                    <option value="9">9:00 AM</option>
                    <option value="10">10:00 AM</option>
                    <option value="11">11:00 AM</option>
                    <option value="12">12:00 PM</option>
                    <option value="13">1:00 PM</option>
                    <option value="14">2:00 PM</option>
                    <option value="15">3:00 PM</option>
                    <option value="16">4:00 PM</option>
                    <option value="17">5:00 PM</option>
                    <option value="18">6:00 PM</option>
                    <option value="19">7:00 PM</option>
                    <option value="20">8:00 PM</option>
                    <option value="21">9:00 PM</option>
                    <option value="22">10:00 PM</option>
                    <option value="23">11:00 PM</option>
                    
                  </select>
                </div> 
            </div>
            <br>     --}}

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