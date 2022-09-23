@extends('admin/layouts.master')
@section('title', 'View Working Hour')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.workinghour') }}</h3>
                            <a href="{{ route('workinghour.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.workinghour') }}</a>                                                            
                     </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('adminstaticword.day') }}</th>
                                        <th>{{__('adminstaticword.from') }}</th>
                                        <th>{{__('adminstaticword.to') }}</th>
                                        <th>{{__('adminstaticword.edit') }}</th>
                                        <th>{{__('adminstaticword.delete') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($workinghour as $w)
                                    <?php $i++;?>
                                    <tr>
                                        <td>{{ $w->day }}</td>
                                        <td>{{ $w->from }}</td>
                                        <td>{{ $w->to }}</td>                                     
                                       
                                        <td>
                                            <a href="{{route('workinghour.edit', $w->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                        </td>                                  
                                                                              
                                        <td>
                                            <form id="delete-form-{{ $w->id }}" action="{{ route('workinghour.destroy',$w->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $w->id }}').submit();
                                            }else{
                                                event.preventDefault();
                                                }">
                                                <i class="fa fa-fw fa-trash-o"></i>
                                            </button>
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