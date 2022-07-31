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
                </div>

                <div class="box-body">
                    <div class="table responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('adminstaticword.code') }}</th>
                                    <th>{{__('adminstaticword.idno') }}</th>
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.email') }}</th>
                                    <th>{{__('adminstaticword.contact') }}</th>
                                    <th>{{__('adminstaticword.servicetype') }}</th>
                                    <th>{{__('adminstaticword.amount') }}</th> 
                                    <th>{{__('adminstaticword.paidamount') }}</th>          
                                    <th>{{__('adminstaticword.balance') }}</th>     
                                    <th>{{__('adminstaticword.repaircomplete') }}</th>
                                    <th>{{ __('adminstaticword.remind') }}</th>            
                                    <th>{{__('adminstaticword.payment') }} {{__('adminstaticword.complete') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($arr as $b)
                                <?php $i++;?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                  <td>{{ $b->code}}</td>
                                    <td>{{ $b->idno}}</td>
                                    <td>{{ $b->fname}} {{ $b->lname}}</td>
                                    <td>{{ $b->register_number }}</td>
                                    <td>{{ $b->email}}</td>
                                    <td>{{ $b->contact}}</td>                                    
                                    <td>{{ $b->name}}</td>
                                    <td>{{ $b->amount }}</td>
                                    <td>{{ $b->paid_amount }}</td>
                                    <td>{{ $b->amount - $b->paid_amount }}</td>
                                 
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
                                
                                        <button type="Submit"
                                            class="btn btn-xs {{  $b->is_remind ==1? 'btn-success' : 'btn-danger' }} ">
                                            @if ( $b->is_remind ==1)
                                                {{ __('adminstaticword.remind') }}
                                            @else
                                                {{ __('adminstaticword.notremind') }}
                                            @endif
                                        </button>
                                    </form>
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