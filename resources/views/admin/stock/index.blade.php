@extends('admin/layouts.master')
@section('title', 'View Stock')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.stock') }}</h3>
                       
                        @if (Auth::User()->role_id =="1")
                        <a href="{{ route('stock.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.stock') }}</a>        
                              @endif      
                                  
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('adminstaticword.product') }}</th>
                                        <th>{{__('adminstaticword.qty') }}</th>
                                        <th>{{__('adminstaticword.dprice') }}</th>
                                        <th>{{__('adminstaticword.sprice') }}</th>
                                        <th>{{__('adminstaticword.color') }}</th>
                                        <th>{{__('adminstaticword.lowestlimit') }}</th>
                                        <th>{{__('adminstaticword.description') }}</th>
                                        @if (Auth::User()->roles->slug == "manager")
                                        <th>{{__('adminstaticword.tool') }}</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($stocks as $stock)
                                    <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>{{ $stock->product->brand->name }} {{ $stock->product->bike->name }} {{ $stock->product->name }} </td>
                                
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->dealerprice }}</td>
                                        <td>{{ $stock->sellingprice }}</td>
                                        <td style="background-color:{{ $stock->color }}"> </td>

                                        @if ($stock->quantity> $stock->lowestlimit)
                                        <td>{{ $stock->lowestlimit }}</td>  
                                        @else
                                        <td  class="btn-danger">{{ $stock->lowestlimit }}-Low!! </td>  
                                        @endif
                                        
                                        <td>{{ $stock->description }}</td>

                                        @if (Auth::User()->roles->slug == "manager")
                                        <td>
                                            <a href="{{route('stock.edit', $stock->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                        
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                            <form action="{{ route('stock.destroy', $stock->id) }}" method="post">
                                                @method('DELETE')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                        @endif
                                        
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