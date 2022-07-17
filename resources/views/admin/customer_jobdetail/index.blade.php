@extends('admin/layouts.master')
@section('title', 'View Customer Job Details')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.jobdetails') }}</h3>
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.usedproduct') }}</th> 
                                    <th>{{__('adminstaticword.totalcost') }}</th>   
                                    <th>{{__('adminstaticword.starttime') }}</th>  
                                    <th>{{__('adminstaticword.lastupdate') }}</th>  
                                    <th>{{ __('adminstaticword.complete') }}/ {{ __('adminstaticword.notcomplete') }}</th>  
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->id}}</td>
                                    <td>{{ $b->user->idno}}</td>
                                    <td>{{ $b->user->fname}} {{ $b->user->lname}}</td>
                                    <td>{{ $b->customervehicle->register_number }}</td>
                                    <td>{{ $b->customervehicle->brand->name}}</td>
                                    <td>{{ $b->customervehicle->bike->name}}</td>
                                    <td>{{ $b->service->name}}</td>
                                    <td>
                                        @foreach ($b->stock as $s)
                                        <li>
                                             {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                        </li>
                                        @endforeach
                                    </td>
                                    <td>{{ $b->amount }}</td>
                                    <td>{{ $b->created_at }}</td>
                                    <td>{{ $b->updated_at }}</td>
                    

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