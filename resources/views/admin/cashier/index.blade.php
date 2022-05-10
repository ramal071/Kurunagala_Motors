@extends('admin/layouts.master')
@section('title', 'View Cashier - Admin')
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.cashier') }}</h3>
            <a href="{{route('cashier.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.cashier') }}</a> 
          </div>
       
  
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  
                  <tr>
                    
                    <th>#</th>
                    <th>{{ __('adminstaticword.name') }}</th>
                    <th>{{ __('adminstaticword.idno') }}</th>                    
                    <th>{{ __('adminstaticword.password') }}</th>   
                    <th>{{ __('adminstaticword.email') }}</th>                
                    <th>{{ __('adminstaticword.status') }}</th>
                    <th>{{ __('adminstaticword.edit') }}</th>
                    <th>{{ __('adminstaticword.delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  @foreach($cashier as $ch)
                  <?php $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td>{{$ch->name}}</td>    
                    <td>{{ $ch->idno }}</td>
                    <td>{{ $ch->password}}</td>
                    <td>{{ $ch->email}}</td>
                    <td>
                      <form action="{{ route('cashier.quick', $ch->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="Submit" class="btn btn-xs {{ $ch->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                          @if ($ch->status ==1)
                          {{__('adminstaticword.active') }}         
                          @else
                          {{__('adminstaticword.deactive') }} 
                          @endif
                        </button>
                      </form>
                    </td>  

                    <td>
                      <a class="btn btn-success btn-sm" href="{{route('cashier.edit',$ch->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    </td>

                    <td>
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                            
                      <form action="{{route('cashier.destroy', $ch->id)}}" method="post">
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
  