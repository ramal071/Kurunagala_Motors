@extends('theme.master')
@section('title', 'Bike Service')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.servicerepair')) }}</h1>
    </div>
</section>

<section class="profile-item-block">
    <div class="container"> 
            <div class="row">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Job Number..." title="Type in a Job Number">                   
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>{{__('adminstaticword.job') }}</th>
                            <th>{{__('adminstaticword.registernumber') }}</th>                                  
                            <th>{{__('adminstaticword.email') }}</th>                                    
                            <th>{{__('adminstaticword.service') }}</th> 
                            <th>{{__('adminstaticword.employee') }}</th>  
                            <th>{{__('adminstaticword.paidamount') }}</th> 
                            <th>{{__('adminstaticword.amount') }}</th>       
                            <th>{{__('adminstaticword.timestart') }}</th>  
                            <th>{{__('adminstaticword.lastupdate') }}</th>       
                            <th>{{__('adminstaticword.repaircomplete') }}</th>        
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i=0;?>
                        @foreach($recordes as $b)
                        <?php $i++;?>
                        <tr>
                            
                            <td>{{ $b['code']}}</td>
                            <td>{{ $b['customervehicle']['register_number']}}</td>
                            <td>{{ $b['email']}}</td>
                            {{-- <td> 
                                @foreach ($b->stock as $s)
                                <li>
                                {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                </li>
                                @endforeach
                            </td>  --}}
                            <td>{{ $b->service->name}}</td> 
                            <td>{{ $b->employee->name}}</td> 
                            <td>{{ $b->paid_amount}}</td>                                  
                            <td>{{ $b->amount}}</td>
                            <td>{{ $b->created_at}}</td>   
                            <td>{{ $b->updated_at}}</td>   
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

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            } else {
            tr[i].style.display = "none";
            }
        }       
        }
    }
</script>

</section>

@endsection