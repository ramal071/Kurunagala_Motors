@extends('admin/layouts.master')
@section('title', 'View Users') 
@section('body')
@include('admin.message')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">  {{-- red line --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminstaticword.users') }}</h3>
                        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm">+{{__('adminstaticword.user') }}</a>                            
                    </div>

                    <div class="box-body">
                        <div class="table responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('adminstaticword.fname') }}</th>
                                        <th>{{__('adminstaticword.lname') }}</th>
                                        <th>{{__('adminstaticword.idno') }}</th>
                                        <th>{{__('adminstaticword.email') }}</th>
                                        <th>{{__('adminstaticword.contact') }}</th>
                                        <th>{{__('adminstaticword.role') }}</th>
                                        <th>{{__('adminstaticword.permission') }}</th>
                                        <th>{{__('adminstaticword.status') }}</th>
                                        <th>{{__('adminstaticword.tool') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0;?>
                                    @foreach ($users as $user)
                                    @if(!\Auth::user()->hasRole('manager') && $user->hasRole('manager')) @continue; @endif                 
                                    <?php $i++;?>
                                        <tr>
                                            <td> <?php echo $i;?> </td>
                                            <td> {{ $user->fname }} </td>
                                            <td> {{ $user->lname }} </td>
                                            <td> {{ $user->idno }} </td>
                                            <td> {{ $user->email }} </td>
                                            <td> {{ $user->contact }} </td>
                                            <td>{{ $user->role_id}}</td>
                                       
                                             <td>
                                                @if ($user->permissions->isNotEmpty())
                                                                
                                                    @foreach ($user->permissions as $permission)
                                                        <span class="badge badge-secondary">
                                                            {{ $permission->name }}                                    
                                                        </span>
                                                    @endforeach
                                                
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <form action="{{ route('user.quick', $user->id) }}" method="POST">
                                                  {{ csrf_field() }}
                                                  <button type="Submit" class="btn btn-xs {{ $user->status ==1 ? 'btn-success' : 'btn-danger' }} "> 
                                                    @if ($user->status ==1)
                                                    {{__('adminstaticword.active') }}         
                                                    @else
                                                    {{__('adminstaticword.deactive') }} 
                                                    @endif
                                                  </button>
                                                </form>
                                            </td>                                         

                                            <td>
                                                <a href="/users/{{ $user['id'] }}" ><i class="fa fa-eye"></i></a>
                                                <a href="/users/{{ $user['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                                
                                                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fa fa-fw fa-trash-o"></i></a>
                                                          
                                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                      @method('DELETE')  
                                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                
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