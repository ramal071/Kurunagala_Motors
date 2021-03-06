@extends('admin/layouts.master')
@section('title', 'Service View')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.service') }}</h3>
          <a href="{{route('service.create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.service') }}</a> 
        </div>
     
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{__('adminstaticword.code') }}</th>
                  <th>{{__('adminstaticword.name') }}</th>
                  <th>{{ __('adminstaticword.price') }}</th>
                  <th>{{ __('adminstaticword.description') }}</th>                
                  <th>{{ __('adminstaticword.edit') }}</th>
                  <th>{{ __('adminstaticword.delete') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($services as $service)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>

                        <td>{{ $service->code }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->description }}</td>
                                          
                      <td>
                        <a href="{{route('service.edit', $service->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                      </td>

                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                              
                        <form action="{{route('service.destroy', $service->id)}}" method="post">
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
      </div>
    </div>
  </div>
</section>
@endsection
