@extends('admin/layouts.master')
@section('title', 'View job detail')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.servicerepair') }}</h3>
                  
                    <a href="{{ route('servicerepair.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.servicerepair') }}</a>        

                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.job') }}</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    {{-- <th>{{__('adminstaticword.brand') }}</th> --}}
                                    <th>{{__('adminstaticword.model') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.employee') }}</th>   
                                    <th>{{__('adminstaticword.amount') }}</th>   
                                    <th>{{__('adminstaticword.paidamount') }}</th>   
                                    <th>{{__('adminstaticword.status') }}</th>       
                                    <th>{{__('adminstaticword.borrow') }}</th>      
                                    <th>{{__('adminstaticword.complete') }}</th>    
                                    <th>{{__('adminstaticword.repaircomplete') }}</th>                    
                                    <th>{{__('adminstaticword.edit') }}</th>
                                    <th>{{__('adminstaticword.delete') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->id}}</td>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->lname}}</td>
                                    {{-- <td>{{ $b->customervehicle->users->lname }}</td> --}}
                                    <td>{{ $b->customervehicle->register_number }}</td>
                                    {{-- <td>{{ $b->customervehicle->brand->name}}</td> --}}
                                    <td>{{ $b->customervehicle->bike->name}}</td>
                                    <td>{{ $b->service->name}}</td>
                                    <td>
                                        @foreach ($b->employee as $e)
                                        <li>
                                            {{$e->name}}
                                        </li>
                                        @endforeach
                                    </td>
                                    <td>{{ $b->amount }}</td>
                                    <td>{{ $b->paid_amount }}</td>
                                   
                                    <td>
                                        <form action="{{ route('servicerepair.quick', $b->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="Submit" class="btn btn-xs {{ $b->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->status ==1)
                                            {{__('adminstaticword.active') }}         
                                            @else
                                            {{__('adminstaticword.deactive') }} 
                                            @endif
                                          </button>
                                        </form>
                                      </td>  

                                     <td>
                                        <form action="{{ route('isborrow.quick', $b->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="Submit" class="btn btn-xs {{ $b->is_borrow ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->is_borrow ==1)
                                            {{__('adminstaticword.borrow') }}         
                                            @else
                                            {{__('adminstaticword.notborrow') }} 
                                            @endif
                                          </button>
                                        </form>
                                      </td>  

                                      <td>
                                        <form action="{{ route('iscomplete.quick', $b->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="Submit" class="btn btn-xs {{ $b->is_complete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->is_complete ==1)
                                            {{__('adminstaticword.fullpayment') }}         
                                            @else
                                            {{__('adminstaticword.halfpayment') }} 
                                            @endif
                                          </button>
                                        </form>
                                      </td>  

                                      <td>
                                        <form action="{{ route('isrepaircomplete.quick', $b->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          <button type="Submit" class="btn btn-xs {{ $b->is_repaircomplete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->is_repaircomplete ==1)
                                            {{__('adminstaticword.complete') }}         
                                            @else
                                            {{__('adminstaticword.notcomplete') }} 
                                            @endif
                                          </button>
                                        </form>
                                      </td>                                      

                                    <td>
                                    <a href="{{route('servicerepair.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>

                                    <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                        
                                    <form action="{{route('servicerepair.destroy', $b->id)}}" method="post">
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