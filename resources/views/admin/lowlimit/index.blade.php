@extends('admin/layouts.master')
@section('title', 'View Low limit')
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.pendinglimit') }}</h3>     
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
                                        <th>{{__('adminstaticword.discount') }}</th>
                                        <th>{{__('adminstaticword.color') }}</th>
                                        <th>{{__('adminstaticword.lowestlimit') }}</th>
                                        {{-- <th>{{__('adminstaticword.status') }}</th> --}}
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{__('adminstaticword.tool') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($arr as $stock)
                                    <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        {{-- <td>{{ $stock->product->brand->name }} {{ $stock->product->bike->name }} {{ $stock->product->name }} </td> --}}
                                
                                        <td>{{ $stock->quantity }}</td>
                                        <td>{{ $stock->dealerprice }}</td>
                                        <td>{{ $stock->sellingprice }}</td>
                                        <td>{{ $stock->discount }}</td>
                                        <td style="background-color:{{ $stock->color }}"> </td>

                                        @if ($stock->quantity> $stock->lowestlimit)
                                        <td>{{ $stock->lowestlimit }}</td>  
                                        @else
                                        <td  class="btn-danger">{{ $stock->lowestlimit }}-Low!! </td>  
                                        @endif
                                        
                                        <td>{{ $stock->description }}</td>
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