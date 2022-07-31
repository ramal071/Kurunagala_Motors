@extends('admin/layouts.master')
@section('title', 'View Complete Jobs')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title"> {{__('adminstaticword.complete') }} {{__('adminstaticword.job') }}</h3>
                    <p>service repair complete and custmer full payment complete</p>
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">                       
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.jobid') }}</th>
                                    <th>{{__('adminstaticword.starttime') }}</th>
                                    <th>{{__('adminstaticword.lastupdate') }}</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.status') }}</th>                                                                   
                                    <th>{{__('adminstaticword.payment') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($arr as $b)
                                <?php $i++;?>
                                <tr>
                                  <td>{{ $b->code}}</td>
                                  <td>{{ $b->created_at}}</td>
                                  <td>{{ $b->updated_at}}</td>
                                  <td>{{ $b->idno}}</td>
                                  <td>{{ $b->fname}}</td> 
                                   <td>{{ $b->register_number }}</td>
                                   <td>{{ $b->name }}</td>
                            
                                  <td>                                       
                                    <button type="Submit" class="btn btn-xs {{ $b->is_repaircomplete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                    @if ($b->is_repaircomplete ==1)
                                    {{__('adminstaticword.complete') }}         
                                    @else
                                    {{__('adminstaticword.notcomplete') }} 
                                    @endif
                                    </button>                                     
                                </td>         
                                
                                <td>                                       
                                    <button type="Submit" class="btn btn-xs {{ $b->is_complete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                    @if ($b->is_complete ==1)
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