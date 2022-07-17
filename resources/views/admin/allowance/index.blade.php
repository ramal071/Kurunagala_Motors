@extends('admin/layouts.master')
@section('title', 'View allowance')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">  
                    <h3 class="box-title">{{__('adminstaticword.allowance') }}</h3>                  
                    <a href="{{ route('allowance.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.allowance') }}</a>       
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.employee') }}</th>
                                    <th>{{__('adminstaticword.allowance_type') }}</th>   
                                    <th>{{__('adminstaticword.allowance') }}</th>   
                                    <th>{{__('adminstaticword.description') }}</th>
                                    <th>{{__('adminstaticword.tool') }}</th>
                                </tr>
                            </thead>

                            <?php $i=0;?>
                            @foreach($allowance as $all)            
                                <tr>      
                                    <th>{{ $all->id}}</th>     
                                    <th>{{ $all->employee->name}}</th>   
                                    <th>{{ $all->allowance_type}}</th>     
                                    <th>{{ $all->allowance}}</th>
                                    <th>{{ $all->description}}</th>                                              
                                                               
                                    <td>
                                        <a href="{{route('allowance.edit', $all->id)}}" ><i class="glyphicon glyphicon-pencil"></i></a>
                            
                                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                        <form action="{{ route('allowance.destroy', $all->id) }}" method="post">
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