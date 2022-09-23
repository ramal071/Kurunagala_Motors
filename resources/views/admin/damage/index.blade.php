@extends('admin/layouts.master')
@section('title', 'View Damage Spareparts')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.damage') }}</h3>                       
                        <a href="{{ route('damage.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.damage') }}</a>                              
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
                                        <th>{{__('adminstaticword.reason') }}</th>
                                        <th>{{ __('adminstaticword.datetime') }}</th>      
                                        <th>{{__('adminstaticword.isreturn') }}</th>
                                        <th>{{__('adminstaticword.edit') }}</th>
                                        <th>{{__('adminstaticword.delete') }}</th>
                                    </tr>
                                </thead>

                                <tbody>                                    
                                    <?php $i=0;?>
                                    @foreach ($damages as $damage)
                                        <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td> {{$damage->stock->product->code}} </td>
                                        <td> {{$damage->stock->product->brand->name}} {{$damage->stock->product->bike->name}} {{$damage->stock->product->name}}</td>
                                        <td>{{ $damage->quantity }}</td>
                                        <td>{{ $damage->reason }}</td>
                                        <td>{{ $damage->created_at }}</td>
                                        <td>
                                            <form action="{{ route('damage.quick', $damage->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <button type="Submit" class="btn btn-xs {{ $damage->is_return ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                                @if ($damage->is_return ==1)
                                                {{__('adminstaticword.yes') }}         
                                                @else
                                                {{__('adminstaticword.no') }} 
                                                @endif
                                              </button>
                                            </form>
                                          </td>   

                                       
                                        <td>
                                            <a href="{{route('damage.edit', $damage->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                         
                                        </td>

                                        <td>
                                            <form id="delete-form-{{ $damage->id }}" action="{{ route('damage.destroy',$damage->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $damage->id }}').submit();
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