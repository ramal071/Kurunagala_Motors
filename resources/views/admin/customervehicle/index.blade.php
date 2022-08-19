@extends('admin/layouts.master')
@section('title', 'View Customer Bike')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">  {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.bikeregister') }}</h3>
                  
                    <a href="{{ route('customervehicle.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.bikeregister') }}</a>        

                </div>
                  

                <div class="box-body">
                    <div class="table responsive">

                        
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.email') }}</th>
                                    <th>{{__('adminstaticword.contact') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>
                                    <th>{{__('adminstaticword.edit') }}</th>
                                    <th>{{__('adminstaticword.delete') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($customervehicle as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->fname}} {{ $b->users->lname}}</td>
                                    <td>{{ $b->users->email}}</td>
                                    <td>{{ $b->users->contact}}</td>
                                    <td>{{ $b->register_number }}</td>
                                    <td>{{ $b->brand->name}}</td>
                                    <td>{{ $b->bike->name}}</td>                                    
                                    <td>
                                    <a href="{{route('customervehicle.edit', $b->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                        
                                    <form action="{{route('customervehicle.destroy', $b->id)}}" method="post">
                                    @method('DELETE')  
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                    </td>        
                
                                </tr>                        
                                @endforeach
                               
                              </tbody>

                              <tfoot>
                                <tr>
                                    <th>idno</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>contact</th>
                                    <th>registernumber</th>                                  
                                    <th>brand</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>                                  
                                </tr>                              
                            </tfoot>                       
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

@endsection
