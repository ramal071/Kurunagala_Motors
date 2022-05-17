@extends('admin/layouts.master')
@section('title', 'Edit Users - Admin')
@section('body')
@include('admin.message')

<form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
  @method('PATCH')
  @csrf()
  
  <div class="form-group">
      <label for="name">First name</label>
      <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name..." value="{{ $user->fname }}">
  </div>

  <div class="form-group">
    <label for="name">Last name</label>
    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name..." value="{{ $user->lname }}">
  </div>

  <div class="form-group">
    <label for="name">ID Number</label>
    <input type="text" name="idno" class="form-control" id="idno" placeholder="ID..." value="{{ $user->idno }}">
  </div>

  <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
  </div>

  <div class="form-group">
    <label for="name">Contact</label>
    <input type="integer" name="contact" class="form-control" id="contact" placeholder="Contact..." value="{{ $user->contact }}">
  </div>

  <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password...">
  </div>

  <div class="form-group">
    <label for="role">Select Role</label>
    <select class="role form-control" name="role" id="role">
        <option value="">Select Role...</option>
        @foreach ($role as $role)
            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->role->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>                
        @endforeach
    </select>          
</div>

<div id="permissions_box" >
    <label for="role">Select Permissions</label>        
    <div id="permissions_ckeckbox_list">                    
    </div>
</div>   

@if($user->permissions->isNotEmpty())
    @if($rolePermissions != null)
        <div id="user_permissions_box" >
            <label for="role">User Permissions</label>
            <div id="user_permissions_ckeckbox_list">                    
                @foreach ($rolePermissions as $permission)
                <div class="custom-control custom-checkbox">                         
                    <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>
                    <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
    @endif
@endif

  <div class="form-group">
    <li class="tg-list-item">              
      <input class="tgl tgl-skewed" id="status" type="checkbox" name="status"  {{ $user->status == '1' ? 'checked' : '' }} >
      <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
    </li>
  </div>
  
  <div class="form-group pt-2">
      <input class="btn btn-primary" type="submit" value="Submit">
  </div>
</form>


@section('js_user_page')

    <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            var user_permissions_box = $('#user_permissions_box');
            var user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_ckeckbox_list.empty();
                user_permissions_box.empty();

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
