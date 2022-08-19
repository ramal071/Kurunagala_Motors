@extends('admin/layouts.master')
@section('title', 'View Employee Proformace')
@section('body')
@include('admin.message')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">{{__('adminstaticword.employeeservice') }}</h3>                   
                </div>

                <div class="box-body">
                    <div class="table responsive">
                    <table class="table table-bordered table-striped" id="example1"> 
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.jobid') }}</th>
                                    <th>{{__('adminstaticword.startjob') }}</th>
                                    <th>{{__('adminstaticword.lastupdate') }}</th>
                                    <th>{{__('adminstaticword.nickname') }}</th>                                    
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>
                                    <th>{{__('adminstaticword.product') }}</th>
                                    <th>{{__('adminstaticword.status') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $b->code}}</td>
                                    <td>{{ $b->created_at}}</td>
                                    <td>{{ $b->updated_at}}</td>
                                    <td>{{ $b->employee->name}}</td>
                                    <td>{{ $b->customervehicle->register_number}}</td>
                                    <td>{{ $b->service->name}}</td>
                                   
                                    <td>
                                        @foreach ($b->stock as $s)
                                        <li>
                                            {{$s->product->code}}:  {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                        </li>
                                        @endforeach
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

{{-- 

@section('emp_pro')

<script>
    $(document).ready(function(){
     $('.input-daterange').ready({
      todayBtn:'linked',
      format:'yyyy-mm-dd',
      autoclose:true
     });
    
     load_data();
    
     function load_data(from_date = '', to_date = '')
     {
      $('#order_table').DataTable({
       processing: true,
       serverSide: true,
       ajax: {
        url:'{{ route("employee_serviceRepair.index") }}',
        data:{from_date:from_date, to_date:to_date}
       },
       columns: [
        {
         data:'id',
         name:'id'
        },
        {
         data:'code',
         name:'code'
        },
        // {
        //  data:'order_item',
        //  name:'order_item'
        // },
        // {
        //  data:'order_value',
        //  name:'order_value'
        // },
        // {
        //  data:'order_date',
        //  name:'order_date'
        // }
       ]
      });
     }
    
     $('#filter').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      if(from_date != '' &&  to_date != '')
      {
       $('#order_table').DataTable().destroy();
       load_data(from_date, to_date);
      }
      else
      {
       alert('Both Date is required');
      }
     });
    
     $('#refresh').click(function(){
      $('#from_date').val('');
      $('#to_date').val('');
      $('#order_table').DataTable().destroy();
      load_data();
     });
    
    });
    </script>
@endsection --}}
@endsection
