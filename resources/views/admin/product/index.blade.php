@extends('admin/layouts.master')
@section('title', 'View Product')
@section('body')
@include('admin.message')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.product') }}</h3>
                    
                        <a href="{{ route('product.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.product') }}</a>    
                
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>                                        
                                        <th>{{__('adminstaticword.brand') }}</th>
                                        <th>{{__('adminstaticword.bike') }}</th>
                                        <th>{{__('adminstaticword.code') }}</th>
                                        <th>{{__('adminstaticword.name') }}</th>
                                        <th>{{__('adminstaticword.slug') }}</th>                                       
                                        <th>{{__('adminstaticword.productimage') }}</th>                                       
                                        <th>{{__('adminstaticword.description') }}</th>
                                        <th>{{__('adminstaticword.status') }}</th>                                     
                                        <th>{{__('adminstaticword.edit') }}</th>
                                        <th>{{__('adminstaticword.delete') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($product as $pr)
                                     
                                    <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>{{ $pr->brand->name}}</td>
                                        <td>{{ $pr->bike->name}}</td>
                                        <td>{{ $pr->code }}</td>
                                        <td>{{ $pr->name }}</td>
                                        <td>{{ $pr->slug }}</td>
                                        <td> <img src="{{ asset('storage/product/' .  $pr->product_image) }}" width="100px;" height="100px;" alt="Image"></td>
                                        <td>{{ $pr->description }}</td>
                      
                                        <td>
                                       
                                            <button type="Submit" class="btn btn-xs {{ $pr->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                                @if ($pr->status ==1)
                                              {{__('adminstaticword.active') }}         
                                              @else
                                              {{__('adminstaticword.deactive') }} 
                                              @endif
                                            </button>
                                    
                                        </td>   
                               
                                        <td>
                                        
                                            <a href="{{route('product.edit', $pr->id)}}" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-pencil"></i></a>
                                
                                        </td>

                                        <td>
                          
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                                            <form action="{{ route('product.destroy', $pr->id) }}" method="post">
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