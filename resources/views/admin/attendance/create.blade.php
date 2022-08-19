@extends('admin/layouts.master')
@section('title', 'Add Attendance')
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
            <form id="demo-form2" method="post" action="{{route('attendance.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
  
              <div class="row">
                <div class="col-md-6">
                  <label for="employee">{{ __('adminstaticword.employee') }}</label>
                  <select name="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                    <option value="0">--{{ __('adminstaticword.pleaseselect') }}-- </option>
                    @foreach($employee as $br)
                      <option value="{{$br->id}}">{{$br->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                  <label for="time_start">{{ __('adminstaticword.timestart') }}:<sup class="redstar">*</sup></label>
                  <input type="datetime-local" class="form-control" name="time_start" id="time_start" placeholder="Enter time_start"  min="{{date('Y-m-d')}}"  value="{{ old('time_start') }}" >
                  <script>
                    const stoday=(new Date()).toLocaleString("EN-CA").slice(0,10);
                    document.querySelectorAll('input[type="datetime-local"]').forEach(el=>{
                    el.min=stoday+"T00:00"; el.max=stoday+"T23:59";
                    })
                    </script>
                </div>                   
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Save">
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