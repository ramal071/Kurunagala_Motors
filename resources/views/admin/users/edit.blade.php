@extends('admin/layouts.master')
@section('title', 'Edit Users - Admin')
@section('body')
@include('admin.message')


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.user') }}</h3>
        </div>

        <div class="box-body">
        <div class="form-group">
          <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf()
          
          <div class="row">
            <div class="col-md-6">
              <label for="name">First name</label>
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name..." value="{{ $user->fname }}">
          </div>
        
            <div class="col-md-6">
            <label for="name">Last name</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name..." value="{{ $user->lname }}">
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <label for="name">ID Number</label>
            <input type="text" name="idno" class="form-control" id="idno" placeholder="ID..." value="{{ $user->idno }}">
          </div>
          
            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <label for="name">Contact</label>
            <input type="integer" name="contact" pattern="[0-9]{10}" class="form-control" id="contact" placeholder="Contact..." value="{{ $user->contact }}">
          </div>
          
            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password..."value="{{ bcrypt('$user->password') }}">
          </div>
          </div>

          @if(Auth::User()->roles->slug == "manager")
          <div class="row">
            <div class="col-md-6">
                <label for="role">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
                <select name="role_id" id="role_id" class="form-control" >
                    <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                    @foreach($role as $r)
                  <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
                </select>
            </div> 
            @endif
        
            @if(Auth::User()->roles->slug == "cashier")
          <div class="col-md-6">
              <label for="role">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
              <select name="role_id"  class="form-control" id="role_id">
                <option value="3">Customer</option>
            </select>
           </div>  
          </div>
          <br>
          @endif
        <br>    

        <div class="row">
          <div class="col-md-6">
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status"  {{ $user->status == '1' ? 'checked' : '' }} >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>
      
       
          <div class="col-md-6">
              <input class="btn btn-primary" type="submit" value="Submit">
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


@section('js_user_page')
<script>
$(document).ready(function() {
    $('.permission').select2();
  });
</script>

@endsection
