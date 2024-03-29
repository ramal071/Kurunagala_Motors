@extends('admin/layouts.master')
@section('title', 'View Goods Recevied New')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.gnr') }}</h3>
                            <a href="{{ route('gnr.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.gnr') }}</a>             
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('adminstaticword.gnrcode') }}</th>
                                        <th>{{__('adminstaticword.code') }}</th>
                                        <th>{{__('adminstaticword.product') }}</th>
                                        <th>{{__('adminstaticword.suppliername') }}</th>
                                        <th>{{__('adminstaticword.contact') }}</th>
                                        <th>{{__('adminstaticword.address') }}</th>
                                        <th>{{__('adminstaticword.email') }}</th>
                                        <th>{{__('adminstaticword.date') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{__('adminstaticword.tool') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                      @foreach($gnrs as $g)
                                    <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>{{ $g->gnrcode }}</td>
                                        <td>{{ $g->product->code}}</td>  
                                        <td>{{ $g->product->brand->name }} {{ $g->product->bike->name }} {{ $g->product->name }} </td>                                                
                                        <td>{{ $g->supplier_name }}</td>
                                        <td>{{ $g->contact }}</td>
                                        <td>{{ $g->address }}</td>
                                        <td>{{ $g->email }}</td>
                                        <td>{{ $g->date }}</td>
                                        <td>{{ $g->description }}</td>
                                        <td>
                                            <a href="{{route('gnr.edit', $g->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                              
                                            <form id="delete-form-{{ $g->id }}" action="{{ route('gnr.destroy',$g->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $g->id }}').submit();
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