@extends('admin/layouts.master')
@section('title', 'Show User - Admin')
@section('body')

  
        <div class="container">       
            <div class="card">
                <div class="card-header">

                    <div class="box-body">
                        <div class="table responsive">
                            <h3> {{__('adminstaticword.fname') }}: {{$user->fname}}</h3>
                            <h4> {{__('adminstaticword.lname') }}: {{$user->lname}}</h4>
                            <h4> {{__('adminstaticword.contact') }}: {{$user->contact}}</h4>
                            <h4> {{__('adminstaticword.email') }}: {{$user->email}}</h4>

                            <h4> {{__('adminstaticword.role') }}: @if ($user->role->isNotEmpty())
                                @foreach ($user->role as $role)
                                    <span class="badge badge-primary">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            @endif</h4>
                        </div>  
                        
                        <h4> {{__('adminstaticword.permission') }}: 
                            @if ($user->permissions->isNotEmpty())                                        
                            @foreach ($user->permissions as $permission)
                                <span class="badge badge-success">
                                    {{ $permission->name }}                                    
                                </span>
                            @endforeach            
                            @endif    
                        </h4>
                        
                    </div>
                    
                </div>
            </div>       

        <div class="row">
            <div class="col-md-6">                              
                <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
            </div> 
        </div>  
        
    </div>
@endsection