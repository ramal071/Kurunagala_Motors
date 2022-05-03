@extends('admin/layouts.master')
@section('title', 'View Role Model - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.role') }}</h3>
          <a href="{{route('role.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.role') }}</a> 
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{ __('adminstaticword.role') }}</th>
                  <th>{{ __('adminstaticword.status') }}</th>
                  <th>{{ __('adminstaticword.edit') }}</th>
                  <th>{{ __('adminstaticword.delete') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($roles as $r)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>

                        <td>{{ $r->name }}</td>
                        <td>
                          <form action="{{ route('role.quick', $r->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="Submit" class="btn btn-xs {{ $r->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                              @if ($r->status ==1)
                              {{__('adminstaticword.active') }}         
                              @else
                              {{__('adminstaticword.deactive') }} 
                              @endif
                            </button>
                          </form>
                        </td>   

                        
                      <td>
                        <a href="{{route('role.edit', $r->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                      </td>

                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                              
                        <form action="{{route('role.destroy', $r->id)}}" method="post">
                          @method('DELETE')  
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                      </td>

                  </td>
                </tr>
                {{-- delete modal --}}
               
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
