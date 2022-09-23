@extends('theme.master')
@section('title', 'Bike Payment Details')
@section('content')

<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.payment')) }} {{ strtoupper(__('frontstaticword.details')) }}</h1>  
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-40 col-lg-35">
                <div class="profile-info-block">
                    <div class="row">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Job Code..." title="Type in a Job Code">                   
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('adminstaticword.code') }}</th>
                                    <th>{{__('adminstaticword.starttime') }}</th>        
                                    <th>{{__('adminstaticword.name') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.brand') }}</th>
                                    <th>{{__('adminstaticword.model') }}</th>   
                                    <th>{{__('adminstaticword.name') }}</th>                                 
                                    <th>{{__('adminstaticword.paidamount') }}</th>  
                                    <th>{{__('adminstaticword.amount') }}</th>  
                                    <th>{{__('adminstaticword.balance') }}</th>  
                                    <th>{{__('adminstaticword.status') }}</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customerpendingpayment as $b)
                                <tr>
                                <td>{{ $b->code }}</td>
                                <td>{{ $b->created_at }}</td>
                                <td>{{ $b->user->fname}} {{ $b->user->lname}}</td>
                                <td>{{ $b->customervehicle->register_number }}</td>
                                <td>{{ $b->customervehicle->brand->name}}</td>
                                <td>{{ $b->customervehicle->bike->name}}</td>
                                <td>{{ $b->service->name}}</td>
                                <td>{{ $b->paid_amount }}</td>
                                <td>{{ $b->amount }}</td>  
                                <td>{{ $b->amount - $b->paid_amount }}.00</td>
                                <td>
                                    <button type="Submit" class="btn btn-xs {{ $b->is_complete ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                        @if ($b->is_complete ==1)
                                        {{__('adminstaticword.fullpayment') }}         
                                        @else
                                        {{__('adminstaticword.halfpayment') }} 
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