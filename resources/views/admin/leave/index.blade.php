@extends('admin/layouts.master')
@section('title', 'View Leave')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">  
                    <h3 class="box-title">{{__('adminstaticword.leave') }}</h3>                  
                    <a href="{{ route('leave.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.leave') }}</a>       
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.employee') }} {{__('adminstaticword.id') }}</th>
                                    <th>{{__('adminstaticword.leave_type') }}</th> 
                                    <th>{{__('adminstaticword.fromdate') }}</th>  
                                    <th>{{__('adminstaticword.todate') }}</th>
                                    <th>{{__('adminstaticword.day') }}</th>  
                                    <th>{{__('adminstaticword.leave_reason') }}</th>
                                  
                                    <th>{{__('adminstaticword.tool') }}</th>
                                </tr>
                            </thead>

                            <?php $i=0;?>
                            @foreach($leaves as $lev)            
                                <tr>      
                                    <th>{{ $lev->id}}</th>     
                                    <td>{{ $lev->employee->name}}</td>         
                                    <th>{{ $lev->leave_type}}</th>
                                    <th>{{ $lev->from_date}}</th>
                                    <th>{{ $lev->to_date}}</th>
                                    <th>{{ $lev->day}}</th>
                                    <th>{{ $lev->leave_reason}}</th>                                                
                                                               
                                    <td>
                                        <a href="{{route('leave.edit', $lev->id)}}" ><i class="glyphicon glyphicon-pencil"></i></a>
                            
                                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                        <form action="{{ route('leave.destroy', $lev->id) }}" method="post">
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
