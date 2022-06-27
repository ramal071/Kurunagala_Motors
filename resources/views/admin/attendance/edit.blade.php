@extends('admin/layouts.master')
@section('title', 'Edit Attendance')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.attendance') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('attendance.update', $attendance->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.employee') }}</label>
                    <select name="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                      @foreach($employee as $br)
                        <option value="{{$br->id}}"
                            @if ($br->id == $attendance->employee_id)
                            selected
                        @endif
                            >{{$br->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br>

           

              <div class="row">
                  <div class="col-md-6">
                    <label for="time_start">{{ __('adminstaticword.timestart') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="time_start" id="time_start" value="{{ $attendance->time_start }}">
                  </div>          
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="time_end">{{ __('adminstaticword.timeend') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="time_end" id="time_end" value="{{ $attendance->time_end }}">
                </div>          
            </div>
            <br>           
        

              <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Update">
                    <a href="{{route('attendance.index')}}" class="btn btn-primary">Back</a>
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