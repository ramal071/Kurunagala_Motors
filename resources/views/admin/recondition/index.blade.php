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
                                        <th>{{__('adminstaticword.code') }}</th>
                                        <th>{{__('adminstaticword.product') }}</th>
                                        <th>{{__('adminstaticword.qty') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{ __('adminstaticword.datetime') }}</th>      
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
                                        <td> {{$recondition->stock->product->code}} </td>
                                        <td> {{$recondition->stock->product->brand->name}} {{$recondition->stock->product->bike->name}} {{$recondition->stock->product->name}}</td>
                                        <td>{{ $recondition->quantity }}</td>
                                        <td>{{ $recondition->description }}</td>
                                        <td>{{ $recondition->created_at }}</td>
                                        <td>
                                            <a href="{{route('recondition.edit', $recondition->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                         
                                        </td>

                                        <td>
                                            <form id="delete-form-{{ $recondition->id }}" action="{{ route('recondition.destroy',$recondition->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $recondition->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                  }"><i class="fa fa-fw fa-trash-o"></i>
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