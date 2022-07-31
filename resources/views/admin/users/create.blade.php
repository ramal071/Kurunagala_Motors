@extends('admin/layouts.master')
@section('title', 'Create User - Admin')
@section('body')
@include('admin.message')

<section id="signup" class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.user') }}</h3>
        </div>

        <div class="box-body">
        <div class="form-group">
        <form method="POST" action="/users" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          <div class="row">
            <div class="col-md-6">
              <label for="name">First name</label>  
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name..." value="{{ old('fname') }}">
            </div>          
         
            <div class="col-md-6">
            <label for="name">Last name</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name..." value="{{ old('lname') }}">
          </div>          
        </div>
        <br>
        
          <div class="row">
            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
            </div>          
       
            <div class="col-md-6">
            <label for="name">ID Number</label>
            <input type="text" name="idno" class="form-control" id="idno" placeholder="ID..." value="{{ old('idno') }}">
          </div>          
        </div>
        <br>
        
          <div class="row">
            <div class="col-md-6">
            <label for="name">Contact</label>
            <input type="tel" name="contact" class="form-control" id="contact" pattern="[0-9]{10}"  placeholder="0712398456" value="{{ old('contact') }}">
          </div> 
          
          @if(Auth::User()->roles->slug == "manager")
          <div class="col-md-6">
              <label for="role">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
              <select name="role_id" id="role_id" class="form-control" >
                  <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                  @foreach($role as $r)
                <option value="{{$r->id}}">{{$r->name}}</option>
              @endforeach
              </select>
           </div>  
          </div>
          <br>
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
        
            {{-- <div class="col-md-6">
            <label for="role">Select Role</label>
              <select name="role_id" id="role_id" class="form-control" >
                <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
                @foreach($role as $r)
                  <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
              </select>
            </div>          
          </div>
          <br>

          <div id="permissions_box">
              <label for="role" name="permission">Select Permissions</label>
              <div id="permissions_ckeckbox_list">
              </div>
          </div>          --}}

         
             
             {{-- <div class="col-md-6">
              <label for="permission">{{ __('adminstaticword.permission') }}</label>
              <select name="permission[]" class="form-control permission" multiple="multiple">
                <option value="0"></option>
                @foreach($permission as $s)
                  <option value="{{$s->id}}">{{$s->name}}</option>
                @endforeach
              </select>
            </div>
          </div> --}}
        <br>
                
          <div class="row">
            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password...">
            </div>          
        
            <div class="col-md-6">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
          </div>          
        </div>
        <br>
        
          <div class="row">
            <div class="col-md-6">
            <li class="tg-list-item">     
                <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>          
        </div>
        <br>
          
          <div class="form-group pt-2">
              <input class="btn btn-primary" type="submit" value="Submit">
          </div>
        </form>

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

    {{-- <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_ckeckbox_list.empty();

                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    
                    console.log(data);
                    
                    permissions_box.show();                        
                    // permissions_ckeckbox_list.empty();

                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(       
                            '<div class="custom-control custom-checkbox">'+                         
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );

                    });
                });
            });
        });

    </script> --}}

@endsection
