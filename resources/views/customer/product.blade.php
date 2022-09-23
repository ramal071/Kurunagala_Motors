@extends('theme.master')
@section('title', 'Product')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.product')) }}</h1>
    </div>
</section>

<section class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-40 col-lg-35">
              <div class="row">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Brand..." title="Type in a Brand name">                   
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>                                       
                                <th>{{__('adminstaticword.brand') }}</th>
                                <th>{{__('adminstaticword.bike') }}</th>
                                <th>{{__('adminstaticword.code') }}</th>
                                <th>{{__('adminstaticword.name') }}</th>
                                <th>{{__('adminstaticword.slug') }}</th>  
                                <th>{{__('adminstaticword.price') }}</th>                                       
                                <th>{{__('adminstaticword.productimage') }}</th>                                       
                                <th>{{__('adminstaticword.description') }}</th>
                                <th>{{__('adminstaticword.qty') }}</th>    
                            </tr>
                        </thead>
                        <tbody>                                
                            @foreach($stock as $pr)
                            <tr>                                    
                                <td>{{ $pr->product->brand->name}}</td>
                                <td>{{ $pr->product->bike->name}}</td>
                                <td>{{ $pr->product->code }}</td>
                                <td>{{ $pr->product->name }}</td>
                                <td>{{ $pr->product->slug }}</td>
                                  <td>{{ $pr->sellingprice}}</td>
                                <td> <img src="{{ asset('storage/product/' .  $pr->product->product_image) }}" width="100px;" height="100px;" alt="Image"></td>
                                <td>{{ $pr->description }}</td>                                    
                                <td>{{ $pr->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
