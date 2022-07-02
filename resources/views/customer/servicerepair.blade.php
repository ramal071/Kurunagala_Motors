@extends('theme.master')
@section('title', 'Bike Service')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.servicerepair')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-40 col-lg-35">
                <div class="profile-info-block">
                    <div class="row">
    
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.job') }}</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>                                  
                                    <th>{{__('adminstaticword.stock') }}</th>                                    
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.employee') }}</th>   
                                    <th>{{__('adminstaticword.amount') }}</th>   
                                    <th>{{__('adminstaticword.paidamount') }}</th>   
                                    <th>{{__('adminstaticword.status') }}</th>       
                                    <th>{{__('adminstaticword.borrow') }}</th>      
                                    <th>{{__('adminstaticword.complete') }}</th>    
                                    <th>{{__('adminstaticword.repaircomplete') }}</th>        
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->code}}</td>
                                    <td>{{ $b->users->idno}}</td>
                                    <td>{{ $b->users->lname}}</td>
                                    <td>{{ $b->customervehicle->register_number }}</td>
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
                                    </td>
                                    <td>
                                        @foreach ($b->employee as $e)
                                        <li>
                                            {{$e->name}}
                                        </li>
                                        @endforeach
                                    </td>

                                    <td>
                                      @foreach ($b->service as $s)
                                      <li>
                                          {{$s->price}}
                                      </li>
                                      @endforeach
                                    </td>
                                    <td>{{ $b->paid_amount }}</td>
                                   
                                    <td>                                       
                                          <button type="Submit" class="btn btn-xs {{ $b->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->status ==1)
                                            {{__('adminstaticword.active') }}         
                                            @else
                                            {{__('adminstaticword.deactive') }} 
                                            @endif
                                        </button>    
                                    </td>  

                                     <td>                                      
                                          <button type="Submit" class="btn btn-xs {{ $b->is_borrow ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->is_borrow ==1)
                                            {{__('adminstaticword.borrow') }}         
                                            @else
                                            {{__('adminstaticword.notborrow') }} 
                                            @endif
                                        </button>    
                                      </td>  
                                      <td>
                                          <button type="Submit" class="btn btn-xs {{ $b->is_complete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                            @if ($b->is_complete ==1)
                                            {{__('adminstaticword.fullpayment') }}         
                                            @else
                                            {{__('adminstaticword.halfpayment') }} 
                                            @endif
                                        </button>    
                                      </td>  

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