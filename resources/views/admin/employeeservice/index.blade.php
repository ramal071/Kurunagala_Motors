@extends('admin/layouts.master')
@section('title', 'View Employee Proformace')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.employeeservice') }}</h3>
                    {{-- <a href="{{ route('servicerepair.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.servicerepair') }}</a>    
                    <a href="{{ route('employee.index') }}" class="btn btn-info btn-sm"> {{__('adminstaticword.employee') }}</a>   --}}
                </div>

                <div class="box-body">
                    <div class="table responsive">
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.jobid') }}</th>
                                    <th>{{__('adminstaticword.startjob') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.nickname') }}</th>                                    
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.product') }}</th>
                                    <th>{{__('adminstaticword.status') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->code}}</td>
                                    <td>{{ $b->created_at}}</td>

                                    <td>
                                        @foreach ($b->employee as $e)
                                        <li>
                                            {{$e->name}}
                                        </li>
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($b->employee as $e)
                                        <li>
                                            {{$e->nick_name}}
                                        </li>
                                        @endforeach
                                    </td>
                                    <td>{{ $b->customervehicle->register_number}}</td>
                                    <td>
                                        @foreach ($b->service as $s)
                                        <li>
                                            {{$s->name}}
                                        </li>
                                        @endforeach
                                    </td>
                                   
                                    <td>
                                        @foreach ($b->stock as $s)
                                        <li>
                                            {{$s->id}}:  {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                        </li>
                                        @endforeach
                                    </td>

                                    <td>                                       
                                        <button type="Submit" class="btn btn-xs {{ $b->is_repaircomplete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                        @if ($b->is_repaircomplete ==1)
                                        {{__('adminstaticword.complete') }}         
                                        @else
                                        {{__('adminstaticword.notcomplete') }} 
                                        @endif
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