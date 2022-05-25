@extends('admin/layouts.master')
@section('title', 'Edit Role')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
      <div class="col-xs-12">
  
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.editrole') }}</h3>
          </div>
         
          <div class="panel-body">
  
            <form id="demo-form2" method="post" action="{{route('role.update', $role->id) }}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                @method('PUT')

  
              <div class="row">
                <div class="col-md-6">
                  <label for="role_name">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="role_name" id="role_name" value="{{ $role->name }}">
                </div>              
              </div>  
            </br>

            <div class="row">
              <div class="col-md-6">
                <label for="role_slug">{{ __('adminstaticword.role') }}:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="role_slug" id="role_slug" value="{{ $role->slug }}">
              </div>              
            </div>  
          </br>

            <div class="row">
              <div class="col-md-6">
                <label for="roles_permissions">{{ __('adminstaticword.permission') }}:<sup class="redstar">*</sup></label>
                <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
                {{$permission->name. ","}}
               @endforeach">   
              </div>              
            </div>  
          </br>

          <div class="row">
          <div class="col-md-6">
            <label for="exampleInputTit1e">{{ __('adminstaticword.status') }}:</label>           
            <li class="tg-list-item">              
              <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" {{ $role->status == '1' ? 'checked' : '' }} >
              <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="status" id="status">
          </div>
        </div>
        </br>
         
              <div class="row box-footer">
                <button type="submit" class="btn btn-md col-lg-2 btn-primary">{{ __('adminstaticword.save') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @section('css_role_page')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js_slug_page')
    <script src="/js/admin/bootstrap-tagsinput.js">
    </script>

    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
        
    </script>

@endsection

  @endsection
  