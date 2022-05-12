@extends('admin/layouts.master')
@section('title', 'Create Cashier - Admin')
@section('body')
@include('admin.message')


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.cashier') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form class="signup-form" method="POST" action="{{ route('register') }}">
              {{-- @method('PATCH')   --}}
              @csrf
             
  
        <div class="row">
            <div class="col-md-6">
              <label for="exampleInputTit1e">{{ __('adminstaticword.first') }} {{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control {{ $errors->has('fname') ? 'is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="Enter first name">
              @if ($errors->has('fname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fname')}}
                  </span>
              @endif
            </div>          
        </div>
        <br>

        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputTit1e">{{ __('adminstaticword.last') }} {{ __('adminstaticword.name') }}:<sup class="redstar">*</sup></label>
            <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Enter last name">
            @if ($errors->has('lname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lname')}}
                </span>
            @endif
          </div>          
      </div>
      <br>

      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputTit1e">{{ __('adminstaticword.email') }}:<sup class="redstar">*</sup></label>
          <input type="email" class="form-control{{ $errors->first('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="Email" value="{{ old('email')}}">
          @if ($errors->has('email'))
              <span>
                <strong>{{ $error->first('email') }}</strong>
              </span>
          @endif
        </div>          
    </div>
    <br>
            
      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputTitle">{{__('adminstaticword.contact') }}:<sup class="redstar">*</sup></label>
          <input type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact') }}" id="contact" placeholder="contact">
          @if($errors->has('contact'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('contact') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputTitle">{{__('adminstaticword.password') }}:<sup class="redstar">*</sup></label>
          <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
          @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="exampleInputTitle">{{__('adminstaticword.passwordconfirmation') }}:<sup class="redstar">*</sup></label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        </div>
      </div>
  
      <div class="col-md-6">
        <button type="submit" title="Sign Up" class="btn btn-primary btm-20">{{ __('frontstaticword.save') }}</button> 

          <a href="" class="btn btn-primary">Back</a>
      </div> 

      </form>
    </div>
  </section>  
  
  
  @endsection



{{-- 
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
              <input type="text" class="form-control" name="fname" id="exampleInputname" placeholder="Enter first name" value="">
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
  
  
  @endsection --}}