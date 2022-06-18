@extends('admin/layouts.master')
@section('title', 'View Employee Proformace')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.my') }} {{__('adminstaticword.servicerepair') }}</h3>
                    {{-- <a href="{{ route('servicerepair.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.servicerepair') }}</a>    
                    <a href="{{ route('employee.index') }}" class="btn btn-info btn-sm"> {{__('adminstaticword.employee') }}</a>     --}}
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.email') }}</th>
                                    <th>{{__('adminstaticword.contact') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>
                                    <th>{{__('adminstaticword.edit') }}</th>
                                    <th>{{__('adminstaticword.delete') }}</th>
                                </tr>
                            </thead>

                            {{-- <tbody>
                             
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->fname}} {{ $b->users->lname}}</td>
                                    <td>{{ $b->users->email}}</td>
                                    <td>{{ $b->users->contact}}</td>
                                    <td>{{ $b->register_number }}</td>
                                    <td>{{ $b->brand->name}}</td>
                                    <td>{{ $b->bike->name}}</td>                                    
                                    <td>
                                    <a href="{{route('customervehicle.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                        
                                    <form action="{{route('customervehicle.destroy', $b->id)}}" method="post">
                                    @method('DELETE')  
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>        
                
                                </tr>                        
                               
                                @endforeach
                              </tbody> --}}
                        </table>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection