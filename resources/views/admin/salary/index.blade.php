@extends('admin/layouts.master')
@section('title', 'View salary')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.salary') }}</h3>                  
                    <a href="{{ route('salary.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.salary') }}</a>       
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.slip_id') }}</th>
                                    <th>{{__('adminstaticword.employee') }} {{__('adminstaticword.id') }}</th>
                                    <th>{{__('adminstaticword.salary') }}</th>
                                    <th>{{__('adminstaticword.basic') }}</th>  
                                    <th>{{__('adminstaticword.conveyance') }}</th>
                                    <th>{{__('adminstaticword.allowance') }}</th>  
                                    <th>{{__('adminstaticword.medical_allowance') }}</th>
                                    <th>{{__('adminstaticword.leave') }}</th>  
                                    <th>{{__('adminstaticword.labour_welfare') }}</th>         
                                    <th>{{__('adminstaticword.tool') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $i=0;?>
                            @foreach($recordes as $sal)   
                            <?php $i++; ?>         
                                <tr>      
                                    <td>{{ $sal->slip_id}}</td>                          
                                    <td>{{ $sal->employee->name}}</td>                              
                                    <td>{{ $sal->salary }}</td>
                                    <td>{{ $sal->basic }}</td>
                                    <td>{{ $sal->conveyance }}</td>
                                    <td>{{ $sal->allowance }}</td>
                                    <td>{{ $sal->medical_allowance }}</td>
                                    <td>{{ $sal->leave }}</td>
                                    <td>{{ $sal->labour_welfare }}</td>                                 
                                    <td>
                                        <a href="{{route('salary.edit', $sal->id)}}" ><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{route('salary.show', $sal->id)}}" ><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                        <form action="{{ route('salary.destroy', $sal->id) }}" method="post">
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