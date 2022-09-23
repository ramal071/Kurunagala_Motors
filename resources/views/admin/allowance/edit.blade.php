@extends('admin/layouts.master')
@section('title', 'Edit allowance')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.allowance') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('allowance.update', $allowance->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

                <div class="row">
                  <div class="col-md-6">
                    <label for="employee">{{ __('adminstaticword.employee') }}</label>
                    <input type="text" class="form-control" name="allowance_type" id="allowance_type" value="{{ $allowance->employee->name }}" disabled>
                    {{-- <select name="employee_id" id="employee_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
                      <option value="0">--{{ __('adminstaticword.pleaseselect') }}-- </option>
                      @foreach($employee as $br)
                        <option value="{{$br->id}} "
                            @if ($br->id == $allowance->employee_id)
                            selected
                        @endif
                            >{{$br->name}}</option>
                      @endforeach
                    </select> --}}
                  </div>
                
                    <div class="col-md-6">
                        <label for="allowance_type">{{ __('adminstaticword.allowance_type') }}:</label>
                        <input type="text" class="form-control" name="allowance_type" id="allowance_type" value="{{ $allowance->allowance_type }}" readonly>
                        {{-- <select name="allowance_type"  class="form-control" id="allowance_type"  value="{{ $allowance->allowance_type }}">
                          <option value="medical">Medical allowance</option>
                          <option value="transport">Transport allowance</option>
                          <option value="other">Other allowance</option>
                        </select> --}}
                    </div>           
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                      <label for="allowance">{{ __('adminstaticword.allowance') }}:</label>
                      <input type="number" class="form-control" name="allowance" id="allowance" value="{{ $allowance->allowance }}">
                  </div>  

                  <div class="col-md-6">
                      <label for="description">{{ __('adminstaticword.description') }}:</label>
                      <input type="text" class="form-control" name="description" id="description" value="{{ $allowance->description }}">
                  </div>  
              </div>
                <br>
                 
            </div>
            <br>  

                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Update">
                    <a href="{{route('allowance.index')}}" class="btn btn-primary">Back</a>
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
