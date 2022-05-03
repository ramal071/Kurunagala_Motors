@extends('admin/layouts.master')
@section('title', 'View Employee - Admin')
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.employee') }}</h3>
            <a href="{{route('employee.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.addemployee') }}</a> 
          </div>
       
  
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  
                  <tr>
                    
                    <th>#</th>
                    <th>{{ __('adminstaticword.name') }}</th>
                    <th>{{ __('adminstaticword.nickname') }}</th>
                    <th>{{ __('adminstaticword.role') }}</th>
                    <th>{{ __('adminstaticword.phone') }}</th>
                    <th>{{ __('adminstaticword.address') }}</th>
                    <th>{{ __('adminstaticword.employeeimage') }}</th>
                    <th>{{ __('adminstaticword.idfront') }}</th>
                    <th>{{ __('adminstaticword.idback') }}</th>
                    <th>{{ __('adminstaticword.status') }}</th>
                    <th>{{ __('adminstaticword.edit') }}</th>
                    <th>{{ __('adminstaticword.delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($employee as $e)
                  <?php $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td>{{$e->name}}</td>
                    <td>{{ $e->nick_name }}</td>      
                    {{-- <td>@if(isset($e->role)){{$e->role->name}}@endif</td>  --}}

                    <td>
                      @foreach ($e->roles as $r)
                      <ui><li>
                          {{$r->name}}
                      </ui> </li>
                      @endforeach
                    </td>

                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->address}}</td>
                    <td> <img src="{{ asset('storage/employee/' .  $e->emp_image) }}" width="100px;" height="100px;" alt="Image"></td>
                    <td> <img src="{{ asset('storage/employee/' .  $e->id_front) }}" width="100px;" height="100px;" alt="Image"></td>
                    <td> <img src="{{ asset('storage/employee/' .  $e->id_back) }}" width="100px;" height="100px;" alt="Image"></td>
                   
                    <td>
                      <form action="{{ route('employee.quick', $e->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="Submit" class="btn btn-xs {{ $e->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                          @if ($e->status ==1)
                          {{__('adminstaticword.active') }}         
                          @else
                          {{__('adminstaticword.deactive') }} 
                          @endif
                        </button>
                      </form>
                    </td>  

                    <td>
                      <a class="btn btn-success btn-sm" href="{{route('employee.edit',$e->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    </td>

                    <td>
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                            
                      <form action="{{route('employee.destroy', $e->id)}}" method="post">
                        @method('DELETE')  
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
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
  