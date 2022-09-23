@extends('theme.master')
@section('title', 'Service')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('adminstaticword.service')) }}</h1>
    </div>
</section>

<section class="profile-item-block">
    <div class="container"> 
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Service Name..." title="Type in service name">                   
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('adminstaticword.code') }}</th>
                    <th>{{__('adminstaticword.name') }}</th>
                    <th>{{ __('adminstaticword.price') }}</th>
                    <th>{{ __('adminstaticword.description') }}</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;?>
                    @foreach($service as $service)
                    <?php $i++;?>
                    <tr>
                    <td><?php echo $i;?></td>

                        <td>{{ $service->code }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->description }}</td>
                    </tr>                        
                
                    @endforeach
                </tbody>
            </table>
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
            td = tr[i].getElementsByTagName("td")[2];
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