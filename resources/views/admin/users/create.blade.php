@extends('admin/layouts.master')
@section('title', 'Create User - Admin')
@section('body')
@include('admin.message')

<section id="signup" class="signup-block-main-block mt-0">
  <div class="container">
    <div class="col-lg-6 col-md-6 offset-md-3">
      <div class="signuo-block">

        <form method="POST" action="/users" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          <div class="form-group">
              <label for="name">First name</label>  
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name..." value="{{ old('fname') }}">
          </div>
        
          <div class="form-group">
            <label for="name">Last name</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name..." value="{{ old('lname') }}">
          </div>
        
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
          </div>
        
          <div class="form-group">
            <label for="name">Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact..." value="{{ old('contact') }}">
            {{-- <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="contact" placeholder="Contact..." value="{{ old('contact') }}"> --}}
          </div>
        
          <div class="form-group">
            <label for="role">Select Role</label>

            <select name="role_id" id="role_id" class="form-control js-example-basic-single col-md-7 col-xs-12" >
              <option value="0">{{ __('adminstaticword.pleaseselect') }}</option>
              @foreach($role as $r)
                <option value="{{$r->id}}">{{$r->name}}</option>
              @endforeach
            </select>
    
            {{-- <select class="role form-control" name="role" id="role">
                <option value="">Select Role...</option>
                @foreach ($role as $role)
                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                @endforeach             
            </select> --}}
        </div>

        <div id="permissions_box">
          <label for="role" name="permission">Select Permissions</label>
          <div id="permissions_ckeckbox_list">
          </div>
      </div> 
        
          <div class="form-group">
            <label for="name">ID Number</label>
            <input type="text" name="idno" class="form-control" id="idno" placeholder="ID..." value="{{ old('idno') }}">
          </div>
        
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password...">
          </div>
        
          <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
          </div>
        
          <div class="form-group">
            <li class="tg-list-item">     
                <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" >
                <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
          </div>
          
          <div class="form-group pt-2">
              <input class="btn btn-primary" type="submit" value="Submit">
          </div>
        </form>

      </div>
    </div>
  </div>

</section>



@section('js_user_page')

    <script>

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

    </script>

@endsection


@endsection