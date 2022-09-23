@extends('theme.master')
@section('title', 'Complete Job')
@section('content')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('adminstaticword.job')) }} {{ strtoupper(__('adminstaticword.status')) }}</h1>
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
                                    <th>{{__('adminstaticword.jobid') }}</th>
                                    <th>{{__('adminstaticword.starttime') }}</th>
                                    <th>{{__('adminstaticword.lastupdate') }}</th>                          
                                    <th>{{__('adminstaticword.fname') }}</th>
                                    <th>{{__('adminstaticword.registernumber') }}</th>
                                    <th>{{__('adminstaticword.product') }}</th>
                                    <th>{{__('adminstaticword.service') }}</th>                                                                   
                                    <th>{{__('adminstaticword.complete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($ServiceRepair as $b)
                                <?php $i++;?>
                                <tr>
                                  <td>{{ $b->code}}</td>
                                  <td>{{ $b->created_at}}</td>
                                  <td>{{ $b->updated_at}}</td>
                                  <td>{{ $b->user->fname}}</td>
                                  <td>{{ $b->customervehicle->register_number }}</td>
                                  <td>  
                                    @foreach ($b->stock as $s)
                                    <ul>  <li>
                                      {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                             
                                    </li> </ul>
                                    @endforeach
                                  </td>                               
                                  <td>
                                    {{ $b->service->name}}
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