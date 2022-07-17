@extends('admin/layouts.master')
@section('title', 'View loan')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">  
                    <h3 class="box-title">{{__('adminstaticword.loan') }}</h3>                  
                    <a href="{{ route('loan.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.loan') }}</a>       
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.employee') }} {{__('adminstaticword.id') }}</th>
                                    <th>{{__('adminstaticword.loan_amount') }}</th> 
                                    <th>{{__('adminstaticword.description') }}</th>                                   
                                    <th>{{__('adminstaticword.tool') }}</th>
                                </tr>
                            </thead>

                            <?php $i=0;?>
                            @foreach($loan as $l)            
                                <tr>      
                                    <th>{{ $l->id}}</th>     
                                    <td>{{ $l->employee->name}}</td>         
                                    <th>{{ $l->loan_amount}}</th>
                                    <th>{{ $l->description}}</th>                                          
                                                               
                                    <td>
                                        <a href="{{route('loan.edit', $l->id)}}" ><i class="glyphicon glyphicon-pencil"></i></a>
                            
                                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                        <form action="{{ route('loan.destroy', $l->id) }}" method="post">
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