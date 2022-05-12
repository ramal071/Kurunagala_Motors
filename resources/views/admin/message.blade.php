
@if (Session::has('success'))
    <div class="offset-md-3 col-md-offset-3 col-md-6 animated fadeInDown alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif


@if (Session::has('delete'))
    <div class="offset-md-3 col-md-offset-3 col-md-6 animated fadeInDown alert alert-danger" role="alert">
    {{ Session::get('delete') }}
</div>
@endif

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <div class="offset-md-3 col-md-offset-3 col-md-6 animated fadeInDown alert alert-warning" role="alert">
       <li> {{ $error }} </li>
    </div>
    @endforeach    
</ul>
@endif
