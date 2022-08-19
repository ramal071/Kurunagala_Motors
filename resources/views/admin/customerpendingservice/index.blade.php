@extends('admin/layouts.master')
@section('title', 'View Customer Pending Service')
@section('body')
@include('admin.message')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.pendingservice') }}</h3>
                  
                    <a href="{{ route('customerpendingservice.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.pendingservice') }}</a>        

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
                                    <th>{{__('adminstaticword.whatareservices') }}</th>  
                                    <th>{{__('adminstaticword.email') }}</th> 
                                    <th>{{__('adminstaticword.nextdate') }}</th> 
                                    <th>{{__('adminstaticword.reminderdate') }}</th> 
                                    <th>{{ __('adminstaticword.description') }}</th>      
                                    <th>{{ __('adminstaticword.remind') }}</th>                       
                                    <th>{{__('adminstaticword.edit') }}</th>
                                    <th>{{__('adminstaticword.delete') }}</th> 
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($customerpendingservice as $b)
                                <?php $i++;?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->fname}} {{ $b->users->lname}}</td>
                                    <td>{{ $b->customervehicle->register_number }}</td>
                                    <td>{{ $b->customervehicle->brand->name}}</td>
                                    <td>{{ $b->customervehicle->bike->name}}</td>
                                    <td>{{ $b->service->name}}</td>
                                    <td>{{ $b->email }}</td>
                                    <td>{{ $b->next_date }}</td>
                                    <td>{{ $b->reminder_date }}</td>
                                    <td>{{ $b->description }}</td>
                                    <td>
                                        <form action="{{ route('nextservice.quick',$b->id ) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs {{ $b->is_remind ==1 ? 'btn-success' : 'btn-danger' }} ">
                                                @if ( $b->is_remind == 1)
                                                    {{ __('adminstaticword.remind') }}
                                                @else
                                                    {{ __('adminstaticword.notremind') }}
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    
                                    <td>
                                    <a href="{{route('customerpendingservice.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                        
                                    <form action="{{route('customerpendingservice.destroy', $b->id)}}" method="post">
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