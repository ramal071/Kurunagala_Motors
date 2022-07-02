@extends('admin/layouts.master')
@section('title', 'View Complete Jobs')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.job') }} {{__('adminstaticword.status') }}</h3>
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">                       
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.jobid') }}</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.product') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>                                                                   
                                    <th>{{__('adminstaticword.complete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($arr as $b)
                                <?php $i++;?>
                                <tr>
                                  <td>{{ $b->code}}</td>
                                  {{-- <td>{{ $b->users->idno}}</td>
                                  <td>{{ $b->users->fname}}</td> --}}
                                  {{-- <td>{{ $b->customervehicle->register_number }}</td>
                                  <td>  
                                    @foreach ($b->stock as $s)
                                    <ul>  <li>
                                      {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                             
                                    </li> </ul>
                                    @endforeach
                                  </td>                               
                                  <td>
                                    @foreach ($b->service as $s)
                                    <li>
                                        {{$s->name}}
                                    </li>
                                    @endforeach
                                  </td> --}}
                            
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