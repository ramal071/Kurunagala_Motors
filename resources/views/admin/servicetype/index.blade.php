@extends('admin/layouts.master')
@section('title', 'Service Type')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.servicetype') }}</h3>
          <a href="{{route('servicetype.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.servicetype') }}</a> 
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{__('adminstaticword.code') }}</th>
                  <th>{{ __('adminstaticword.type') }}</th>
                  <th>{{ __('adminstaticword.description') }}</th>                
                  <th>{{ __('adminstaticword.edit') }}</th>
                  <th>{{ __('adminstaticword.delete') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($servicetypes as $servicetype)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>

                        <td>{{ $servicetype->code }}</td>
                        <td>{{ $servicetype->type }}</td>
                        <td>{{ $servicetype->description }}</td>
                                          
                      <td>
                        <a href="{{route('servicetype.edit', $servicetype->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                      </td>

                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                              
                        <form action="{{route('servicetype.destroy', $servicetype->id)}}" method="post">
                          @method('DELETE')  
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                      </td>

                  </td>
                </tr>               
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
