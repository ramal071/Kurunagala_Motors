@extends('admin/layouts.master')
@section('title', 'View Attendance')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.attendance') }}</h3>
    
          <a href="{{route('attendance.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.attendance') }}</a> 
  
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{ __('adminstaticword.employee') }} {{ __('adminstaticword.id') }}</th>
                  <th>{{ __('adminstaticword.employee') }}</th>
                  <th>{{ __('adminstaticword.starttime') }}</th>
                  <th>{{__('adminstaticword.endtime') }}</th>
                  <th>{{ __('adminstaticword.view') }}</th>
                  <th>{{ __('adminstaticword.edit') }}</th>
                  <th>{{ __('adminstaticword.delete') }}</th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                @foreach($attendance as $b)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                        <td>{{ $b->employee->id}}</td>
                        <td>{{ $b->employee->name}}</td>
                        <td>{{ $b->time_start }}</td>
                        <td>{{ $b->time_end }}</td>

                        <td> <a href="{{route('attendance.show', $b->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-eye"></i></a> </td>
                        <td>
                        
                          <a href="{{route('attendance.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                      
                        </td>
                       
                        <td>  
                                       
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>                              
                        <form action="{{route('attendance.destroy', $b->id)}}" method="post">
                          @method('DELETE')  
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
  
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
