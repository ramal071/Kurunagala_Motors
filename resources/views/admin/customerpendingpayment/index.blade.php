@extends('admin/layouts.master')
@section('title', 'View Customer Pending Payments')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ Auth::User()->fname }} {{__('adminstaticword.pendingpayment') }}</h3>
                    
                    <a href="{{ route('customerpendingpayment.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.pendingpayment') }}</a>        

                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.email') }}</th>
                                    <th>{{__('adminstaticword.contact') }}</th>
                                    <th>{{__('adminstaticword.servicetype') }}</th>
                                    <th>{{__('adminstaticword.price') }}</th>                  
                                    <th>{{__('adminstaticword.edit') }}</th>
                                    <th>{{__('adminstaticword.delete') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($customerpendingpayment as $b)
                                <?php $i++;?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->fname}} {{ $b->users->lname}}</td>
                                    <td>{{ $b->customervehicle->register_number }}</td>
                                    <td>{{ $b->users->email}}</td>
                                    <td>{{ $b->users->contact}}</td>                                    
                                    <td>{{ $b->service->name}}</td>
                                    <td>{{ $b->price }}</td>
                                    <td>
                                    <a href="{{route('customerpendingpayment.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                        
                                    <form action="{{route('customerpendingpayment.destroy', $b->id)}}" method="post">
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