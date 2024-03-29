@extends('theme.master')
@section('title', 'Used Product For Service')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('adminstaticword.usedproductservice')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="profile-info-block">
                    <div class="row">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Job Code..." title="Type in a Job Code">                   
                        <table id="myTable" class="table table-bordered table-striped">
                           <thead>                
                                <tr>                 
                                  <th>{{__('adminstaticword.code') }}</th>
                                  <th>{{__('adminstaticword.registernumber') }}</th>
                                  <th>{{__('adminstaticword.starttime') }}</th>
                                  <th>{{ __('adminstaticword.product') }}</th>
                                  <th>{{ __('adminstaticword.product') }} {{ __('adminstaticword.price') }}</th>
                                  <th>{{ __('adminstaticword.total') }} {{ __('adminstaticword.price') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=0;?>
                                @foreach($servicerepair as $b)            
                                    <tr>
                                        <td>{{ $b->code}}</td>
                                        <td>{{ $b->customervehicle->register_number}}</td>
                                        <td>{{ $b->created_at}}</td>
                                        <td>
                                            @foreach ($b->stock as $s)
                                            <li>
                                                {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                                            </li>
                                            @endforeach
                                        </td>  
                
                                        <td>
                                          @foreach ($b->stock as $s)
                                          <li>
                                              {{$s->sellingprice}}
                                          </li>
                                          @endforeach
                                      </td>   

                                      <td>
                                        @php
                                        $selling_price = 0;
                                        @endphp
                                        @foreach ($b->stock as $stock)
                                        @php
                                            $product = App\Product::select('id','name','bike_id','brand_id')->where('id',$stock->product_id)
                                                        ->with('brand:id,name')
                                                        ->with('bike:id,name')
                                                        ->first();
                                            $selling_price += $stock['sellingprice']*$stock['pivot']['qty'];
                                        @endphp
                                        @endforeach
                                  {{ $selling_price  }}</td>
                                    </tr>      
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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