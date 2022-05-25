@extends('admin/layouts.master')
@section('title', 'View Bike Model')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.bike') }}</h3>
          <a href="{{route('bike.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.bike') }}</a> 
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{ __('adminstaticword.brand') }}</th>
                  <th>{{ __('adminstaticword.code') }}</th>
                  <th>{{ __('adminstaticword.name') }}</th>
                  <th>{{__('adminstaticword.slug') }}</th>
                  <th>{{ __('adminstaticword.description') }}</th>
                  <th>{{ __('adminstaticword.edit') }}</th>
                  <th>{{ __('adminstaticword.delete') }}</th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                @foreach($bike as $b)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                        <td>{{ $b->brand->name}}</td>
                        <td>{{ $b->code }}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->slug }}</td>
                        <td>{{ $b->description }}</td>
                        <td>
                          <a href="{{route('bike.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                        </td>
                        <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                              
                        <form action="{{route('bike.destroy', $b->id)}}" method="post">
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
