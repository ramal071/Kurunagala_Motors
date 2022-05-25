@extends('admin/layouts.master')
@section('title', 'View Recondition Spareparts')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.recondition') }}</h3>
                       
                        <a href="{{ route('recondition.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.recondition') }}</a>        
                        
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('adminstaticword.stock') }}</th>
                                        <th>{{__('adminstaticword.name') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{__('adminstaticword.edit') }}</th>
                                        <th>{{__('adminstaticword.delete') }}</th>
                                    </tr>
                                </thead>

                                <tbody>                                    
                                    <?php $i=0;?>
                                    @foreach ($reconditions as $recondition)
                                        <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>{{ $recondition->stock_id }}</td>
                                        <td>{{ $recondition->name }}</td>
                                        <td>{{ $recondition->description }}</td>
                                      
                                        <td>
                                            <a href="{{route('recondition.edit', $recondition->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                         
                                        </td>
                                       
                                        <td>
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                            <form action="{{ route('recondition.destroy', $recondition->id) }}" method="post">
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
                </div>
            </div>
        </div>
    </section>    
@endsection