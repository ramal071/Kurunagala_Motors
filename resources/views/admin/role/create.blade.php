@extends('admin/layouts.master')
@section('title', 'Add Role - Admin')
@section('body')


@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/role">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="role_name">Role name</label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{ old('role_name') }}" required>
    </div>
    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{ old('role_slug') }}" required>
    </div>
    <div class="form-group" >
        <label for="roles_permissions">Add Permissions</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="{{ old('roles_permissions') }}">   
    </div>    
    
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
    
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

@section('css_role_page')
   
@endsection

@section('js_slug_page')
{{-- Slug  --}}
<script>
    $(document).ready(function(){
        $('#role_name').keyup(function(e){
            var str = $('#role_name').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#role_slug').val(str);
            $('#role_slug').attr('placeholder', str);
        });
    });
</script>
{{-- Slug --}}
@endsection

@endsection
